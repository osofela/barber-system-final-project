<!DOCTYPE html>
<html lang="en-US" ng-app="appointmentRecords">
<head>
    <title>Admin Page</title>
    <h1>Admin Page</h1>
    <a href="/auth/logout">Logout</a>
    <a href="users">Users</a>

    <!-- Load Bootstrap CSS -->
    <link href="<?= asset('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/bootstrap.css') ?>" rel="stylesheet">

</head>
<body>

<h2>Appointments</h2>
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
            <th>Haircut Type</th>
            <th>Music Choice</th>
            <th>Music Artist</th>
            <th>Drink Choice</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Appointment</button></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="appointment in appointments | filter:searchText">
            <td>{{ appointment.appointment_id }}</td>
            <td>{{ appointment.user_id }}</td>
            <td>{{ appointment.barber_id }}</td>
            <td>{{ appointment.haircut_type }}</td>
            <td>{{ appointment.music_choice  }}</td>
            <td>{{ appointment.music_artist  }}</td>
            <td>{{ appointment.drink_choice }}</td>
            <td>{{ appointment.date }}</td>
            <td>{{ appointment.start_time }}</td>
            <td>{{ appointment.end_time }}</td>
            <td>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit',appointment.appointment_id)">Edit</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(appointment.appointment_id)">Delete</button>
            </td>
        </tr>

        </tbody>
    </table>

    <!-- End of Table-to-load-the-data Part -->
    <!-- Modal (Pop up when detail button clicked) -->
    <?php include 'forms/appointmentform.php';?>

</div>


<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="<?= asset('assets/app/lib/angular/angular.min.js') ?>"></script>
<script src="<?= asset('assets/js/ui-bootstrap-tpls-1.2.5.min.js') ?>"></script>
<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>


<!-- AngularJS Application Scripts -->
<script src="<?= asset('assets/app/appointmentApp.js') ?>"></script>
<script src="<?= asset('assets/app/controllers/appointments.js') ?>"></script>
</body>
</html>