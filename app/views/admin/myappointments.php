<?php include_once 'layouts/my_appointments_master.php';?>


<!--<div class="col-md-3">-->
<!--    <input ng-model="searchText" class="form-control" type="search" placeholder="Search">-->
<!--    <span class="glyphicon glyphicon-search"></span>-->
<!--</div>-->

    <div class="page-container">
        <div class="page-sidebar-wrapper">
            <?php include_once 'layouts/my_appointments_sidebar.php';?>
        </div>
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-head">
                    <h1>My Appointments</h1>
                </div>

                <div class="row">
                    <div class="col-md-11">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption caption-md">
                                    <i class="icon-bar-chart theme-font-color hide"></i>
                                    <span class="caption-subject theme-font-color bold uppercase">Your Appointments</span>
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="well" style="width:820px;">
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
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
</div>

<?php include_once 'layouts/footer.php';?>
</div>

</body>
</html>