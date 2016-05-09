app.controller('usersController', function($scope, $http, API_URL,$alert) {

    $scope.getBarbers = function()
    {
        //retrieve barbers listing from API
        $http.get(API_URL + "users")
            .success(function(response) {
                $scope.users = response;
            });
    };

    $scope.getBarbers();

    //get logged in user
    $http.get(API_URL + "user")
        .success(function(response) {
            $scope.loggedInUser = response;
        });

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Barber";
                $scope.user = null;
                console.log(id);
                $('#myAddModal').modal('show');

                break;
            case 'edit':
                $scope.form_title = "Barber Details";
                $scope.id = id;
                $http.get(API_URL + 'users/' + id)
                    .success(function(response) {
                        console.log(response);
                        $scope.user = response;
                        console.log(id);
                        $('#myEditModal').modal('show');

                    });
                break;
            default:
                break;
        }
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "users";

        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.user),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            $scope.getBarbers();
            //location.reload();

        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');

        });

        $('#myAddModal').modal('hide');
        $('#myEditModal').modal('hide');

        var createAlert = $alert({title: 'Barber Saved! ', content: 'Your barber has been saved.', placement: 'top',
            type: 'info',duration: 3,
            container: 'body',animation: 'am-fade-and-slide-top', show: true});


    };

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this barber?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'users/' + id,
            }).
            success(function(data) {
                console.log(data);
                var deleteAlert = $alert({title: 'Barber Deleted! ', content: 'Your barber has been deleted.', placement: 'top',
                    type: 'danger',duration: 3,
                    container: 'body',animation: 'am-fade-and-slide-top', show: true});
                $scope.getBarbers();
                //location.reload();
            }).
            error(function(data) {
                console.log(data);
                alert('Unable to delete');
            });
        } else {
            return false;
        }
    }
});