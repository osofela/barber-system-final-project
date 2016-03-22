<!DOCTYPE html>
<html lang="en-US" ng-app="appointmentRecords">
<head>
    <title>Client Page</title>
    <h1>ClientPage</h1>
    <a href="/auth/logout">Logout</a>

    <!-- Load Bootstrap CSS -->
    <link href="<?= asset('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/bootstrap.css') ?>" rel="stylesheet">
</head>
<body>

<h2>Users Database</h2>
<div  ng-controller="appointmentsController">

    <div class="col-md-3">
        <input ng-model="searchText" class="form-control" type="search" placeholder="Search">
        <span class="glyphicon glyphicon-search"></span>
    </div>

    <!-- Table-to-load-the-data Part -->
    <table class="table">
        <thead>
        <tr>
            <th>Appointment Id</th>
            <th>User Id</th>
            <th>Barber Id</th>
            <th>Address</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Role</th>
            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Barber</button></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="appointment in appointments | filter:searchText"">
        <td>{{ appointment.appointment_id }}</td>
        <td>{{ appointment.user_id }}</td>
        <td>{{ appointment.barber_id }}</td>
        <td>{{ appointment.haircut_type }}</td>
        <td>{{ appointment.music_choice  }}</td>
        <td>{{ appointment.drink_choice }}</td>
        <td>{{ appointment.date }}</td>
        <td>{{ appointment.start_time }}</td>
        <td>{{ appointment.end_time }}</td>
        <td>
            <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', appointment.appointment_id)">Edit</button>
            <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(appointment.appointment_id)">Delete</button>
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
</body>
</html>