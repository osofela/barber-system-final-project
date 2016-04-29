<?php include_once 'layouts/chart_master.php';?>

<!--<div class="col-md-3">-->
<!--    <input ng-model="searchText" class="form-control" type="search" placeholder="Search">-->
<!--    <span class="glyphicon glyphicon-search"></span>-->
<!--</div>-->
<div class="container">
    <div class="page-container">
        <div class="page-sidebar-wrapper">
            <?php include_once 'layouts/chart_sidebar.php';?>
        </div>
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-11">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption caption-md">
                                    <i class="icon-bar-chart theme-font-color hide"></i>
                                    <span class="caption-subject theme-font-color bold uppercase">Admin Charts</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="caption">
                                    <i class="icon-bar-chart font-green-haze"></i>
                                    <span class="caption-subject bold uppercase font-green-haze">Bar Charts</span>
                                    <span class="caption-helper">column and line mix</span>
                                </div>
<!--                              <div id="chart_1" class="chart" style="height: 500px;"></div>-->
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