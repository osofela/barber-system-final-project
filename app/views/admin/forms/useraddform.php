<div class="modal fade" id="myAddModal" tabindex="-1" role="dialog" aria-labelledby="myAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myAddModalLabel">{{form_title}}</h4>
            </div>
            <div class="modal-body">
                <form name="frmAddUsers" class="form-horizontal" novalidate="">

                    <div class="form-group error">
                        <label for="inputEmail3" class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="first_name" name="first_name" placeholder="Firstname" value="{{first_name}}"
                                   ng-model="user.first_name" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmAddUsers.first_name.$invalid && frmAddUsers.first_name.$touched">First Name field is required</span>
                        </div>
                    </div>

                    <div class="form-group error">
                        <label for="inputEmail3" class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="last_name" name="last_name" placeholder="Lastname" value="{{last_name}}"
                                   ng-model="user.last_name" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmAddUsers.last_name.$invalid && frmAddUsers.last_name.$touched">Last Name field is required</span>
                        </div>
                    </div>

                    <div class="form-group error">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="address" name="address" placeholder="Address" value="{{address}}"
                                   ng-model="user.address" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmAddUsers.address.$invalid && frmAddUsers.address.$touched">Address field is required</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{email}}"
                                   ng-model="user.email" ng-required="true">
                            <span class="help-inline" ng-show="frmAddUsers.email.$invalid && frmAddUsers.email.$touched">
                                Valid Email field is required
                            </span>
                            <span class="errorMessage" ng-show="frmAddUsers.email.$dirty && frmAddUsers.email.$error.unique">
                                Email is taken
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Telephone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="{{telephone}}"
                                   ng-model="user.telephone" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmAddUsers.telephone.$invalid && frmAddUsers.telephone.$touched">Telephone field is required</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Role</label>
                        <div class="col-sm-9">
                            <select ng-model="user.role" class="form-control" id="role" name="role" placeholder="Role" value="{{role}}"
                                 ng-required="true">
                            <option value="Admin">Admin</option>
                            <option value="Barber">Barber</option>
                            <option value="Intern">Intern</option>
                            </select>
                                    <span class="help-inline"
                                          ng-show="frmAddUsers.role.$invalid && frmAddUsers.role.$touched">Role field is required</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{password}}"
                                   ng-model="user.password" ng-minlength="4" ng-maxlength="20" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmAddUsers.password.$invalid && frmAddUsers.password.$touched">Password field is required and must be longer than 3 characters</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Check Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="check_password" name="check_password" placeholder="Check Password" value="{{check_password}}"
                                   ng-model="user.check_password" data-password-verify="user.password" ng-required="true">
                            <span class="help-inline"
                                  ng-show="frmAddUsers.check_password.$error.required && frmAddUsers.check_password.$touched">
                                Check Password field is required
                            </span>
                            <span class="help-inline"
                                  ng-show="frmAddUsers.check_password.$error.passwordVerify">
                                Passwords do not match
                            </span>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" data-toggle="tooltip" title="Save" ng-click="save(modalstate, 0)" ng-disabled="frmAddUsers.$invalid">Save</button>
            </div>
        </div>
    </div>
</div>