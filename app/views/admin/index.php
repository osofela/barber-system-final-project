<?php

$api_url = Config::get('app.api_url');

?>
<!DOCTYPE html>
<html lang="en-US" ng-app="userRecords">
<head>
    <title>Admin Page</title>
    <h1>Admin Page</h1>
    <a href="/auth/logout">Logout</a>
    <a href="appointments">Appointments</a>

    <!-- Load Bootstrap CSS -->
    <link href="<?= asset('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/bootstrap.css') ?>" rel="stylesheet">
</head>
<body>

<h2>Users Database</h2>
<div  ng-controller="usersController">

    <div class="col-md-3">
        <input ng-model="searchText" class="form-control" type="search" placeholder="Search">
        <span class="glyphicon glyphicon-search"></span>
    </div>

    <!-- Table-to-load-the-data Part -->
    <table class="table">
        <thead>
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Role</th>
            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Barber</button></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="user in users | filter:searchText"">
            <td>{{ user.user_id }}</td>
            <td>{{ user.first_name }}</td>
            <td>{{ user.last_name }}</td>
            <td>{{ user.address }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.telephone }}</td>
            <td>{{ user.role }}</td>
            <td>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', user.user_id)">Edit</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(user.user_id)">Delete</button>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- End of Table-to-load-the-data Part -->
    <!-- Modal (Pop up when detail button clicked) -->
    <?php include 'forms/useraddform.php';?>
    <?php include 'forms/usereditform.php';?>

</div>


<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="<?= asset('assets/app/lib/angular/angular.min.js') ?>"></script>
<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>

<!-- AngularJS Application Scripts -->
<script src="<?= asset('assets/app/app.js') ?>"></script>
<script src="<?= asset('assets/app/controllers/users.js') ?>"></script>

<script type="text/javascript">

    app.constant('API_URL', '<?php echo $api_url;?>');

</script>
</body>
</html>