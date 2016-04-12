<!DOCTYPE html>
<html lang="en-US" ng-app="appointmentRecords" ng-controller="appointmentsController">
<head>
    <title>Admin Page</title>
    <h1>Admin Page</h1>
    <h3>Hello {{loggedInUser.first_name}} {{loggedInUser.last_name}}</h3>
    <a href="/auth/logout">Logout</a>
    <a href="/api/v1/admin/users">Users</a>
    <a href="/api/v1/admin/dashboard">Dashboard</a>

    <!-- Load Bootstrap CSS -->
    <link href="<?= asset('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/bootstrap-additions.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/angular-motion.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/calendarDemo.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/fullcalendar-min.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/fullcalendar-print.css') ?>" media="print" rel="stylesheet">
    <link href="<?= asset('assets/css/jquery-ui.min.css') ?>" rel="stylesheet">

</head>
<body>

<h2>Appointments</h2>

<div class="col-md-3">
    <input ng-model="searchText" class="form-control" type="search" placeholder="Search">
    <span class="glyphicon glyphicon-search"></span>
</div>

<!-- Table-to-load-the-data Part -->
<table class="table">
    <thead>
    <tr>
        <th>Appointment Id</th>
        <th>Client</th>
        <th>Barber</th>
        <th>Haircut Type</th>
        <th>Music Choice</th>
        <th>Music Artist</th>
        <th>Drink Choice</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>
            <button id="btn-add" class="btn btn-primary btn-sm col-lg-11" ng-click="toggle('add', 0)" data-toggle="tooltip" title="Add">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr ng-repeat="appointment in appointments | filter:searchText">
        <td>{{ appointment.appointment_id }}</td>
        <td>{{ appointment.client.first_name}} {{ appointment.client.last_name }}</td>
        <td>{{ appointment.barber.first_name}} {{ appointment.barber.last_name }}</td>
        <td>{{ appointment.haircut_type }}</td>
        <td>{{ appointment.music_choice  }}</td>
        <td>{{ appointment.music_artist  }}</td>
        <td>{{ appointment.drink_choice }}</td>
        <td>{{ appointment.appointment_date }}</td>
        <td>{{ appointment.start_time }}</td>
        <td>{{ appointment.end_time }}</td>
        <td>
            <button class="btn btn-default btn-sm btn-detail" ng-click="toggle('edit',appointment.appointment_id)" data-toggle="tooltip" title="Edit">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </button>

            <button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(appointment.appointment_id)" data-toggle="tooltip" title="Delete">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </td>
    </tr>

    </tbody>
</table>

<!-- End of Table-to-load-the-data Part -->
<!-- Modal (Pop up when detail button clicked) -->
<?php include 'forms/appointmentform.php';?>

<div class="container">
    <div class="page-header">
        <h1>UI-Calendar</h1>
    </div>

    <div class="well">
        <aside class="row-fluid">
            <div class="span4">
                <div class="btn-group calTools">
                    <button type="button" class="btn btn-primary" ng-click="addEvent()">
                        Add Event
                    </button>
                </div>
            </div>

                <div id="calendar" class="calendar" ng-model="eventSources" calendar="myCalendar" ui-calendar="uiConfig.calendar"></div>

        </div>
    </div>



    <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->



    <script src="<?= asset('assets/app/lib/angular/angular.min.js') ?>"></script>
    <script src="<?= asset('assets/app/lib/angular/angular-animate.min.js') ?>"></script>
    <script src="<?= asset('assets/app/lib/angular/angular-sanitize.min.js') ?>"></script>
    <script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= asset('assets/js/moment.js') ?>"></script>
    <script src="<?= asset('assets/app/lib/angular/angular-ui-calendar.js') ?>"></script>
    <script src="<?= asset('assets/js/ui-bootstrap-tpls-1.2.5.min.js') ?>"></script>
    <script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('assets/js/fullcalendar.js') ?>"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.3.8/angular-strap.min.js"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.3.8/angular-strap.tpl.min.js"></script>





    <!-- AngularJS Application Scripts -->
    <script src="<?= asset('assets/app/appointmentApp.js') ?>"></script>
    <script src="<?= asset('assets/app/controllers/appointments.js') ?>"></script>
</body>
</html>