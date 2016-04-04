app.controller('adminController', function($scope, $http, API_URL) {

    //get logged in user


    $http.get(API_URL + "user")
        .success(function (response) {
            $scope.loggedInUser = response;
            $scope.barber = response;
            $scope.user_id = $scope.loggedInUser.user_id;
            $scope.passUserId($scope.user_id);
        });

    //retrieve barbers listing from API
    $http.get(API_URL + "barbers")
        .success(function(response) {
            $scope.barbers = response;
        });


    //retrieve clients listing from API
    $http.get(API_URL + "clients")
        .success(function(response) {
            $scope.clients = response;
        });

    $scope.passUserId = function(user_id)
    {
        $scope.user_id = user_id;
        $http.get(API_URL + "users/" + user_id +"/appointments")
            .success(function (response) {
                console.log(response);
                $scope.appointments = response;
                console.log(user_id);
            });
    };

    $scope.getTimes = function(haircut_type)
    {
        var timeslot = 40;

        if(haircut_type == "Hot Towel Shave")
        {
            timeslot = 20;
        }
        else if(haircut_type == "Dry Cut & Hot Towel Shave" || haircut_type == "Wet Cut & Hot Towel Shave" || haircut_type == "Style Cut & Hot Towel Shave")
        {
            timeslot = 60;
        }

        $scope.timeslot = timeslot;
        $http.get(API_URL + "times/" + timeslot)
            .success(function (response) {
                console.log(response);
                $scope.times = response;
                console.log(timeslot);
            });

    };

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
                $http.get(API_URL + 'appointments/' + id)
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
        var url = API_URL + "appointments";


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
    };
});