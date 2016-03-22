app.controller('appointmentsController', function($scope, $http, API_URL) {
    //retrieve appointments listing from API
    $http.get(API_URL + "appointments")
        .success(function(response) {
            $scope.appointments = response;
        });


    $scope.find = function(user_id){
        $scope.user_id = user_id;
        $http.get(API_URL + 'users/' + user_id)
            .success(function(response) {
                console.log(response);
                $scope.user = response;
                console.log(user_id);
            });

    }


    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Appointment";
                $scope.user = null;
                console.log(id);
                $('#myAddModal').modal('show');

                break;
            case 'edit':
                $scope.form_title = "Appointment Details";
                $scope.id = id;
                $http.get(API_URL + 'appointment/' + id)
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


    $scope.save = function(modalstate, id) {
        var url = API_URL + "appointments";


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
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'appointments/' + id,
            }).
            success(function(data) {
                console.log(data);
                location.reload();
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