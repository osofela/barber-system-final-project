<?php include_once 'layouts/users_master.php';?>

    <div class="page-container">
        <div class="page-sidebar-wrapper">
            <?php include_once 'layouts/users_sidebar.php';?>
        </div>
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-head">
                    <h1>Barbers</h1>
                </div>

                <div class="row">
                    <div class="col-md-11">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption caption-md">
                                    <i class="icon-bar-chart theme-font-color hide"></i>
                                    <span class="caption-subject theme-font-color bold uppercase">Barbers</span>
                                </div>

                                <div class="col-md-3">
                                    <input ng-model="searchText" class="form-control" type="search" placeholder="Filter">
                                    <span class="glyphicon glyphicon-search"></span>
                                </div>
                            </div>

                            <div class="portlet-body">

                                <!-- Table-to-load-the-data Part -->
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Role</th>
                                        <th>
                                            <button id="btn-add" class="btn btn-primary btn-sm col-lg-6" ng-click="toggle('add', 0)" data-toggle="tooltip" title="Add">
                                                Add
                                            </button>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="user in users | filter:searchText">
                                        <td>{{ user.user_id }}</td>
                                        <td>{{ user.first_name }}</td>
                                        <td>{{ user.last_name }}</td>
                                        <td>{{ user.address }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ user.telephone }}</td>
                                        <td>{{ user.role }}</td>
                                        <td>
                                            <button class="btn btn-default btn-sm btn-detail" ng-click="toggle('edit', user.user_id)" data-toggle="tooltip" title="Edit">
                                                Edit
                                            </button>

                                            <button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(user.user_id)" data-toggle="tooltip" title="Delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- End of Table-to-load-the-data Part -->
                                <!-- Modal (Pop up when detail button clicked) -->
                                <?php include 'forms/useraddform.php';?>
                                <?php include 'forms/usereditform.php';?>
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