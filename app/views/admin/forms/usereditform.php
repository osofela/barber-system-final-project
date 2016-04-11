<div class="modal fade" id="myEditModal" tabindex="-1" role="dialog" aria-labelledby="myEditModalLabel" aria-hidden="true">
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
                            <select ng-model="user.role" class="form-control" id="role" name="role" placeholder="Role" value="{{role}}"
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
                <button type="button" class="btn btn-primary" id="btn-save" data-toggle="tooltip" title="Save" ng-click="save(modalstate, user.user_id)" ng-disabled="frmUsers.$invalid">Save</button>
            </div>
        </div>
    </div>
</div>