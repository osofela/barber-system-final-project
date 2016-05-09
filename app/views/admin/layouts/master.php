<?php

$api_url = Config::get('app.api_url');

?>
<!DOCTYPE html>
<html lang="en-US" ng-app="appointmentRecords" ng-controller="appointmentsController">
<head>

    <title>Admin Appointments</title>
    <!-- Load Bootstrap CSS -->
    <link href="<?= asset('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/bootstrap-additions.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/angular-motion.css') ?>" rel="stylesheet">

    <link href="<?= asset('assets/css/calendarDemo.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/fullcalendar-min.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/fullcalendar-print.css') ?>" media="print" rel="stylesheet">
    <link href="<?= asset('assets/css/jquery-ui.min.css') ?>" rel="stylesheet">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="../../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="../../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
    <link href="../../../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
    <link href="../../../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGIN STYLES -->

    <!-- BEGIN THEME STYLES -->
    <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
    <link href="../../../assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>


    <link href="../../../assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="../../../assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>


</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-logo">
        <a href="/api/v1/admin/dashboard">
            <img src="../../../assets/admin/layout4/img/app-nav-logo.svg" align="middle" alt="logo" height="60" width="160" class="logo-default"/>
        </a>
        <div class="menu-toggler sidebar-toggler">
            <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
        </div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->

    <ul class="nav navbar-nav pull-right">
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
        <li class="dropdown dropdown-user dropdown-dark">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                {{loggedInUser.first_name}} {{loggedInUser.last_name}} <img alt="" class="img-circle" src="../../../assets/admin/layout4/img/avatar.png"/>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
                <li>
                    <a href="/auth/logout">
                        <i class="icon-key"></i> Log Out </a>
                </li>
            </ul>
        </li>
    </ul>
</div>



<script src="<?= asset('assets/app/lib/angular/angular.min.js') ?>"></script>
<script src="<?= asset('assets/app/lib/angular/angular-animate.min.js') ?>"></script>
<script src="<?= asset('assets/app/lib/angular/angular-sanitize.min.js') ?>"></script>
<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/global/plugins/jquery-migrate.min.js') ?>"></script>
<script src="<?= asset('assets/js/moment.js') ?>"></script>
<script src="<?= asset('assets/app/lib/angular/angular-ui-calendar.js') ?>"></script>
<script src="<?= asset('assets/js/ui-bootstrap-tpls-1.2.5.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('assets/js/fullcalendar.js') ?>"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.3.8/angular-strap.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.3.8/angular-strap.tpl.min.js"></script>
<script src="<?= asset('assets/global/scripts/metronic.js') ?>"></script>
<script src="<?= asset('assets/admin/layout4/scripts/layout.js') ?>"></script>


<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
    });
</script>



<!-- AngularJS Application Scripts -->
<script src="<?= asset('assets/app/appointmentApp.js') ?>"></script>
<script src="<?= asset('assets/app/controllers/appointments.js') ?>"></script>
<script type="text/javascript">

    app.constant('API_URL', '<?php echo $api_url;?>');

</script>

<!--<title>Client Page</title>-->
<!--<h1>Client Page</h1>-->
<!--<h3>Hello {{loggedInUser.first_name}} {{loggedInUser.last_name}}</h3>-->
<!--<a href="/auth/logout">Logout</a>-->
