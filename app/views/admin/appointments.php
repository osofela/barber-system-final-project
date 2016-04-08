<!DOCTYPE html>
<html lang="en-US" ng-app="appointmentRecords" ng-controller="appointmentsController">
<head>
    <title>Admin Page</title>
    <h1>Admin Page</h1>
    <h3>Hello {{loggedInUser.first_name}} {{loggedInUser.last_name}}</h3>
    <a href="/auth/logout">Logout</a>
    <a href="users">Users</a>
    <a href="dashboard">Dashboard</a>

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
        <td>{{ appointment.date }}</td>
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

<button type="button" class="btn btn-lg btn-primary" bs-aside="aside">Click to toggle aside
    <br>
    <small>(using an object)</small>
</button>

<div class="container">
    <div class="page-header">
        <h1>UI-Calendar</h1>
    </div>

    <div class="well">
        <div class="row-fluid">
            <div class="span4">
                <div class="btn-group calTools">
                    <button type="button" class="btn btn-primary" ng-click="addEvent()">
                        Add Event
                    </button>
                </div>
            </div>

            <div class="span8">
                <div class="alert-success calAlert" ng-show="alertMessage != undefined && alertMessage != ''">
                    <h4>{{alertMessage}}</h4>
                </div>
            </div>
            <div class="calendar" ng-model="eventSources"  calendar="myCalendar1" ng-click="showSides()" ui-calendar="uiConfig.calendar"></div>

            <ul class="list-unstyled">
                <li ng-repeat="e in events" class="ng-scope">
                    <div class="alert alert-info">
                        <a class="close" ng-click="remove($index)"><i class="glyphicon glyphicon-remove"></i></a>
                        <b> <input ng-model="e.title" readonly="readonly"></b>
                        {{e.start | date:"MMM-dd-yy"}} - {{e.haircut}} - {{e.music}} - {{e.drink}}  - {{e.start_time}} - {{e.end_time}}
                    </div>
                </li>
            </ul>

        </div>
    </div>



    <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->



    <script src="<?= asset('assets/app/lib/angular/angular.min.js') ?>"></script>
    <script src="<?= asset('assets/app/lib/angular/angular-animate.min.js') ?>"></script>
    <script src="<?= asset('assets/app/lib/angular/angular-ui-calendar.js') ?>"></script>
    <script src="<?= asset('assets/js/ui-bootstrap-tpls-1.2.5.min.js') ?>"></script>
    <script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>

    <script src="<?= asset('assets/js/moment.js') ?>"></script>
    <script src="<?= asset('assets/js/fullcalendar.js') ?>"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.3.8/angular-strap.min.js"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.3.8/angular-strap.tpl.min.js"></script>





    <!-- AngularJS Application Scripts -->
    <script src="<?= asset('assets/app/appointmentApp.js') ?>"></script>
    <script src="<?= asset('assets/app/controllers/appointments.js') ?>"></script>
</body>
</html>