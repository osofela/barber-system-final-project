<?php include_once 'layouts/dashboard_master.php';?>


<!--<div class="col-md-3">-->
<!--    <input ng-model="searchText" class="form-control" type="search" placeholder="Search">-->
<!--    <span class="glyphicon glyphicon-search"></span>-->
<!--</div>-->

    <div class="page-container">
        <div class="page-sidebar-wrapper">
            <?php include_once 'layouts/dashboard_sidebar.php';?>
        </div>
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-head">
                    <h1>Dashboard</h1>
                </div>


                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                            <div class="visual">
                                <i class="fa fa-comments"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="16,678">16,678</span>
                                </div>
                                <div class="desc"> Total Appointments </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                            <div class="visual">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="200,136">200,136</span>€ </div>
                                <div class="desc"> Total Sales </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                            <div class="visual">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="49">49</span>
                                </div>
                                <div class="desc"> New Appointments this week </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                            <div class="visual">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="details">
                                <div class="number"> +
                                    <span data-counter="counterup" data-value="49">49</span>% </div>
                                <div class="desc"> Performance from last Quarter</div>
                            </div>
                        </a>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Appointments</span>
                                        <span class="caption-helper">monthly stats...</span>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div id="site_statistics_loading" style="display: none;">
                                        <img src="../../../assets/global/img/loading.gif" alt="loading"> </div>
                                    <div id="site_statistics_content" class="display-none" style="display: block;">
                                        <div id="site_statistics" class="chart" style="padding: 0px; position: relative;"> <canvas class="flot-base" width="747" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 747px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 83px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 10px; text-align: center;">02/2013</div><div style="position: absolute; max-width: 83px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 97px; text-align: center;">03/2013</div><div style="position: absolute; max-width: 83px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 184px; text-align: center;">04/2013</div><div style="position: absolute; max-width: 83px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 271px; text-align: center;">05/2013</div><div style="position: absolute; max-width: 83px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 358px; text-align: center;">06/2013</div><div style="position: absolute; max-width: 83px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 444px; text-align: center;">07/2013</div><div style="position: absolute; max-width: 83px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 531px; text-align: center;">08/2013</div><div style="position: absolute; max-width: 83px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 618px; text-align: center;">09/2013</div><div style="position: absolute; max-width: 83px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 705px; text-align: center;">10/2013</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 273px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 20px; text-align: right;">0</div><div style="position: absolute; top: 220px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1000</div><div style="position: absolute; top: 166px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">2000</div><div style="position: absolute; top: 113px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">3000</div><div style="position: absolute; top: 59px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">4000</div><div style="position: absolute; top: 6px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">5000</div></div></div><canvas class="flot-overlay" width="747" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 747px; height: 300px;"></canvas></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Sales</span>
                                        <span class="caption-helper">monthly stats...</span>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div id="site_activities_loading" style="display: none;">
                                        <img src="../../../assets/global/img/loading.gif" alt="loading"> </div>
                                    <div id="site_activities_content" class="display-none" style="display: block;">
                                        <div id="site_activities" style="height: 300px; padding: 0px; position: relative;"> <canvas class="flot-base" width="747" height="228" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 747px; height: 228px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 74px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 21px; text-align: center;">DEC</div><div style="position: absolute; max-width: 74px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 100px; text-align: center;">JAN</div><div style="position: absolute; max-width: 74px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 178px; text-align: center;">FEB</div><div style="position: absolute; max-width: 74px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 254px; text-align: center;">MAR</div><div style="position: absolute; max-width: 74px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 334px; text-align: center;">APR</div><div style="position: absolute; max-width: 74px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 411px; text-align: center;">MAY</div><div style="position: absolute; max-width: 74px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 491px; text-align: center;">JUN</div><div style="position: absolute; max-width: 74px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 570px; text-align: center;">JUL</div><div style="position: absolute; max-width: 74px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 645px; text-align: center;">AUG</div><div style="position: absolute; max-width: 74px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 726px; text-align: center;">SEP</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 197px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 20px; text-align: right;">0</div><div style="position: absolute; top: 149px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 7px; text-align: right;">500</div><div style="position: absolute; top: 100px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1000</div><div style="position: absolute; top: 52px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1500</div><div style="position: absolute; top: 3px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">2000</div></div></div><canvas class="flot-overlay" width="747" height="228" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 747px; height: 228px;"></canvas></div>
                                    </div> 
                                </div>
                            </div>
                            <!-- END PORTLET-->
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