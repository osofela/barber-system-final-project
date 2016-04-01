app.controller('clientController', function($scope, $http, API_URL) {

    //get logged in user

    $http.get(API_URL + "user")
        .success(function (response) {
            $scope.loggedInUser = response;
        });

    $http.get(API_URL + "client/appointments")
        .success(function (response) {
            console.log(response);
            $scope.appointments = response;
        });

    //retrieve barbers listing from API
    $http.get(API_URL + "users")
        .success(function(response) {
            $scope.users = response;
        });

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Appointment";
                $scope.appointment = null;
                console.log(id);
                break;
            case 'edit':
                $scope.form_title = "Appointment Details";
                $scope.id = id;
                $http.get(API_URL + 'client/appointments/' + id)
                    .success(function(response) {
                        console.log(response);
                        $scope.appointment = response;
                        $scope.appointment.date = new Date($scope.appointment.date);
                        console.log(id);

                    });


                break;
            default:
                break;

        }
        $('#myModal').modal('show');
    };


    $scope.save = function(modalstate, id) {
        var url = API_URL + "client/appointments";


        if (modalstate === 'edit'){
            url += "/" + id;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.appointment),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    };

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'client/appointments/' + id,
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