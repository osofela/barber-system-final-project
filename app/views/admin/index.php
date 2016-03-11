<!DOCTYPE html>
<html lang="en-US" ng-app="userRecords">
<head>
    <title>Admin Page</title>
    <h1>Admin Page</h1>
    <a href="/auth/logout">Logout</a>

    <!-- Load Bootstrap CSS -->
    <link href="<?= asset('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>

<h2>Users Database</h2>
<div  ng-controller="usersController">

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
        <tr ng-repeat="user in users">
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                </div>
                <div class="modal-body">
                    <form name="frmUsers" class="form-horizontal" novalidate="">

                        <div class="form-group error">
                            <label for="inputEmail3" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="first_name" name="first_name" placeholder="Firstname" value="{{first_name}}"
                                       ng-model="user.first_name" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmUsers.first_name.$invalid && frmUsers.first_name.$touched">First Name field is required</span>
                            </div>
                        </div>

                        <div class="form-group error">
                            <label for="inputEmail3" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="last_name" name="last_name" placeholder="Lastname" value="{{last_name}}"
                                       ng-model="user.last_name" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmUsers.last_name.$invalid && frmUsers.last_name.$touched">Last Name field is required</span>
                            </div>
                        </div>



                        <div class="form-group error">
                            <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="address" name="address" placeholder="Address" value="{{address}}"
                                       ng-model="user.address" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmUsers.address.$invalid && frmUsers.address.$touched">Address field is required</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{email}}"
                                       ng-model="user.email" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmUsers.email.$invalid && frmUsers.email.$touched">Valid Email field is required</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Telephone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="{{telephone}}"
                                       ng-model="user.telephone" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmUsers.telephone.$invalid && frmUsers.telephone.$touched">Telephone field is required</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Role</label>
                            <div class="col-sm-9">
                                <select ng-model="user.role" class="form-control" id="role" name="role" placeholder="Role" value="{{role}}
                                 ng-required="true">
                                    <option value="Admin">Admin</option>
                                    <option value="Barber">Barber</option>
                                    <option value="Intern">Intern</option>
                                </select>
                                    <span class="help-inline"
                                          ng-show="frmUsers.role.$invalid && frmUsers.role.$touched">Role field is required</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmUsers.$invalid">Save changes</button>
                </div>
            </div>
        </div>
    </div>
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