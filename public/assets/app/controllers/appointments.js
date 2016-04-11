app.controller('appointmentsController', function($scope,$aside, $http, API_URL,$compile, $timeout, uiCalendarConfig,$aside)
{
    $scope.showTimes = true;



    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    /* event source that pulls from google.com */
    $scope.eventSource = {
    };

    $scope.new_event = {
    };

    /* event source that contains custom events on the scope */
    $scope.events = [
    ];


    /* alert on eventClick */
    $scope.alertOnEventClick = function( date, jsEvent, view){
        $scope.selected_event = date;
        $scope.selected_event.date = new Date($scope.selected_event.start);

        // Pre-fetch an external template populated with a custom scope
        var myOtherAside = $aside({scope: $scope, templateUrl: 'forms/eventform.php', 'container':"body" , title: "Edit Event"});
        // Show when some event occurs (use $promise property to ensure the template has been loaded)
        myOtherAside.$promise.then(function() {
            myOtherAside.show();
        });
    };
    /* alert on Drop */
    $scope.alertOnDrop = function(event, delta, revertFunc, jsEvent, ui, view){
        $scope.alertMessage = ('Event Dropped to make dayDelta ' + delta);
    };
    /* alert on Resize */
    $scope.alertOnResize = function(event, delta, revertFunc, jsEvent, ui, view ){
        $scope.alertMessage = ('Event Resized to make dayDelta ' + delta);
    };
    /* add and removes an event source of choice */
    $scope.addRemoveEventSource = function(sources,source) {
        var canAdd = 0;
        angular.forEach(sources,function(value, key){
            if(sources[key] === source){
                sources.splice(key,1);
                canAdd = 1;
            }
        });
        if(canAdd === 0){
            sources.push(source);
        }
    };

    /* add custom event*/
    $scope.addEvent = function() {

        $scope.selected_event = null;
        // Pre-fetch an external template populated with a custom scope
        var newEvent = $aside({scope: $scope, templateUrl: 'forms/neweventform.php', 'container':"body" , title: "New Event"});
        // Show when some event occurs (use $promise property to ensure the template has been loaded)
        newEvent.$promise.then(function() {
            newEvent.show();
        });
    };

    /* remove event */
    $scope.remove = function(index) {
        $scope.events.splice(index,1);
    };

    /* Change View */
    $scope.renderCalender = function(calendar) {
        $timeout(function() {
            if(uiCalendarConfig.calendars[calendar]){
                uiCalendarConfig.calendars[calendar].fullCalendar('render');
            }
        });
    };
    /* Render Tooltip */
    $scope.eventRender = function( event, element, view ) {
        element.attr("haircut",event.haircut);
        element.attr({'tooltip': event.title,
            'tooltip-append-to-body': true});

        $compile(element)($scope);
    };
    /* config object */
    $scope.uiConfig = {
        calendar:{
            height: 450,
            editable: true,
            header:{
                left: 'prev',
                center: 'title,today',
                right: 'next',
            },
            eventClick: $scope.alertOnEventClick,
            eventDrop: $scope.alertOnDrop,
            eventResize: $scope.alertOnResize,
            eventRender: $scope.eventRender
        }
    };

    $http.get(API_URL + "appointments")
        .success(function(response) {
            $scope.appointments = response;
            angular.forEach($scope.appointments,function(value,index){
                $scope.events.push({
                    title: value.start_time  + " "+value.barber.first_name + " " + value.client.first_name,
                    appointment_id: value.appointment_id,
                    client_id: value.user_id,
                    barber_id: value.barber_id,
                    haircut_type: value.haircut_type,
                    music_choice: value.music_choice,
                    music_artist: value.music_artist,
                    drink: value.drink_choice,
                    start: value.date,
                    end: value.date,
                    start_time: value.start_time,
                    end_time: value.end_time,
                });
            })
        });


    /* event sources array*/
    $scope.eventSources = [$scope.events, $scope.eventSource];

    //get logged in user
    $http.get(API_URL + "user")
        .success(function(response) {
            $scope.loggedInUser = response;
        });



    //retrieve barbers listing from API
    $http.get(API_URL + "barbers")
        .success(function(response) {
            $scope.barbers = response;
        });


    //retrieve clients listing from API
    $http.get(API_URL + "clients")
        .success(function(response) {
            $scope.clients = response;
        });


    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Appointment";
                $scope.appointment = null;
                console.log(id);
                break;
            case 'edit':
                $scope.form_title = "Appointment Details";
                $scope.id = id;
                $http.get(API_URL + 'appointments/' + id)
                    .success(function(response) {
                        console.log(response);
                        $scope.appointment = response;
                        $scope.appointment.date = new Date($scope.appointment.date);
                        console.log(id);

                    });


                break;
            default:
                break;
        }
        $('#myModal').modal('show');
    };


    $scope.save = function(modalstate, id) {
        var url = API_URL + "appointments";


        if (modalstate === 'edit'){
            url += "/" + id;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.appointment),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    };

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'appointments/' + id,
            }).
            success(function(data) {
                console.log(data);
                location.reload();
            }).
            error(function(data) {
                console.log(data);
                alert('Unable to delete');
            });
        } else {
            return false;
        }
    };

    $scope.getTimes = function(haircut_type)
    {
        var timeslot = 40;

        if(haircut_type == "Hot Towel Shave")
        {
            timeslot = 20;
        }
        else if(haircut_type == "Dry Cut & Hot Towel Shave" || haircut_type == "Wet Cut & Hot Towel Shave" || haircut_type == "Style Cut & Hot Towel Shave")
        {
            timeslot = 60;
        }

        $scope.timeslot = timeslot;
        $http.get(API_URL + "times/" + timeslot)
            .success(function (response) {
                console.log(response);
                $scope.times = response;
                console.log(timeslot);
            });
    };


});