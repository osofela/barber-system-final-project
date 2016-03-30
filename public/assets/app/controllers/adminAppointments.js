app.controller('adminController', function($scope, $http, API_URL) {

    //get logged in user


    $http.get(API_URL + "user")
        .success(function (response) {
            $scope.loggedInUser = response;
            $scope.user_id = $scope.loggedInUser.user_id;
            $scope.passUserId($scope.user_id);
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
});