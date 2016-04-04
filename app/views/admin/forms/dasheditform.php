<div class="modal fade" id="myEditModal" tabindex="-1" role="dialog" aria-labelledby="myAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myAddModalLabel">{{form_title}}</h4>
            </div>
            <div class="modal-body">
                <form name="frmAppointments" class="form-horizontal" novalidate="">

                    <div class="form-group error">
                        <label for="inputEmail3" class="col-sm-3 control-label">Client</label>
                        <div class="col-sm-4">
                            <select name="user_id" id="user_id" ng-model="appointment.user_id" class="form-control" ng-required="true">
                                <option ng-repeat="client in clients" value="{{client.user_id}}"
                                        ng-selected="client.user_id == appointment.user_id" >{{client.first_name}} {{client.last_name}}</option>
                            </select>
                                    <span class="help-inline"
                                          ng-show="frmAppointments.client.$invalid && frmAppointments.client.$touched">Client field is required</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Haircut Type</label>
                        <div class="col-sm-4">
                            <select ng-model="appointment.haircut_type" class="form-control" id="haircut_type" name="haircut_type" ng-change="getTimes(appointment.haircut_type)" placeholder="Haircut Type" value="{{haircut_type}}"
                                    ng-required="true">
                                <option value="Dry Cut">Dry Cut</option>
                                <option value="Wet Cut">Wet Cut</option>
                                <option value="Style Cut">Style Cut</option>
                                <option value="Hot Towel Shave">Hot Towel Shave</option>
                                <option value="Dry Cut & Hot Towel Shave">Dry Cut & Hot Towel Shave</option>
                                <option value="Wet Cut & Hot Towel Shave">Wet Cut & Hot Towel Shave</option>
                                <option value="Style Cut & Hot Towel Shave">Style Cut & Hot Towel Shave</option>
                            </select>
                                    <span class="help-inline"
                                          ng-show="frmAppointments.haircut_type.$invalid && frmAppointments.haircut_type.$touched">Haircut Type field is required</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Music Choice</label>
                        <div class="col-sm-4">
                            <select ng-model="appointment.music_choice" class="form-control" id="music_choice" name="music_choice" placeholder="Music Choice"
                                    value="{{music_choice}}" ng-required="true">
                                <option value="None">None</option>
                                <option value="Pop">Pop</option>
                                <option value="Hip Hop/Rap">Hip Hop/Rap</option>
                                <option value="Reggae">Reggae</option>
                                <option value="RnB/Soul">RnB/Soul</option>
                                <option value="Rock">Rock</option>
                            </select>

                            <span class="help-inline"
                                  ng-show="frmAppointments.music_choice.$invalid && frmAppointments.music_choice.$touched">Music Choice field is required</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Music Artist</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="music_artist" name="music_artist" placeholder="Music Artist" value="{{music_artist}}"
                                   ng-model="appointment.music_artist">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Drink Choice</label>
                        <div class="col-sm-4">
                            <select ng-model="appointment.drink_choice" class="form-control" id="drink_choice" name="drink_choice" placeholder="Drink Choice"
                                    value="{{drink_choice}}" ng-required="true">
                                <option value="None">None</option>
                                <option value="Water">Water</option>
                                <option value="Coke Cola">Coke Cola</option>
                                <option value="Sprite">Sprite</option>
                                <option value="Tea">Tea</option>
                                <option value="Ice Tea">Ice Tea</option>
                                <option value="Coffee">Coffee</option>
                            </select>
                            <span class="help-inline"
                                  ng-show="frmAppointments.drink_choice.$invalid && frmAppointments.drink_choice.$touched">Drink Choice field is required</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="{{date}}"
                                   ng-model="appointment.date" ng-required="true">
                            <span class="help-inline"
                                  ng-show="frmAppointments.date.$invalid && frmAppointments.date.$touched">Date field is required</span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" ng-disabled="frmAppointments.date.$invalid" ng-click="showTimes = !showTimes">Get Available Times</button>
                    <hr>
                    <div uib-collapse="showTimes">
                        <div class="form-group error">
                            <div class="col-sm-4">
                                <select name="time" id="time" ng-model="appointment.time" class="form-control">
                                    <option ng-repeat="time in times" value="{{time}}">
                                        {{time.start_time}} {{time.end_time}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <tt>client = {{appointment.user_id}}</tt><br/>
            <tt>times = {{appointment.time}}</tt><br/>


            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, appointment.appointment_id)" ng-disabled="frmAppointments.$invalid">Save</button>
            </div>
        </div>
    </div>
</div>