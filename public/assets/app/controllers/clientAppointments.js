app.controller('clientController', function($rootScope,$scope,$http, API_URL,$compile, $timeout, uiCalendarConfig,$aside,$alert)
{
    $scope.showTimes = true;

    var addEventAside = $aside({scope: $scope, templateUrl: 'forms/clientform.php', 'container':"body" , title: "Create Event" , show: false});
    // Pre-fetch an external template populated with a custom scope
    var editEventAside = $aside({scope: $scope, templateUrl: 'forms/clienteditform.php', 'container':"body" , title: "Edit Event" , show: false});

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
        //$scope.selected_event.date = new Date($scope.selected_event.date);
        $scope.selected_event.date = new Date($scope.selected_event.date);
        $scope.getTimes($scope.selected_event.haircut_type,$scope.selected_event.date);
        console.log($scope.selected_event.date);

        // Show when some event occurs (use $promise property to ensure the template has been loaded)
        editEventAside.$promise.then(function() {
            editEventAside.show();
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

    $scope.createEvent = function()
    {
        var url = API_URL + "client/appointments";

        console.log($scope.new_event.date);


        var appointment = {
            user_id: $scope.loggedInUser.user_id,
            barber_id: $scope.new_event.barber_id,
            haircut_type: $scope.new_event.haircut_type,
            music_choice: $scope.new_event.music_choice,
            music_artist: $scope.new_event.music_artist,
            drink_choice: $scope.new_event.drink_choice,
            date: $scope.new_event.date,
            time: $scope.new_event.time
        };

        $http({
            method: 'POST',
            url: url,
            data: appointment,
        }).success(function(response) {
            console.log(response);
            addEventAside.hide();
            $scope.reloadCalendar();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });

        var createAlert = $alert({title: 'Event Created!', content: 'Your event has been created.', placement: 'top',
            type: 'info',duration: 3,
            container: 'body',animation: 'am-fade-and-slide-top', show: true});






    };

    $scope.updateEvent = function(appointment_id)
    {
        console.log($scope.selected_event);
        console.log(appointment_id);

        var url = API_URL + "client/appointments" + "/" + appointment_id;

        var appointment = {
            appointment_id: $scope.selected_event.appointment_id,
            user_id: $scope.loggedInUser.user_id,
            barber_id: $scope.selected_event.barber_id,
            haircut_type: $scope.selected_event.haircut_type,
            music_choice: $scope.selected_event.music_choice,
            music_artist: $scope.selected_event.music_artist,
            drink_choice: $scope.selected_event.drink_choice,
            date: $scope.selected_event.date

        };

        $http({
            method: 'POST',
            url: url,
            data: appointment,
        }).success(function(response) {
            console.log(response);
            editEventAside.hide();
            $scope.reloadCalendar();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });

        console.log(uiCalendarConfig.calendars['myCalendar']);
        var updateAlert = $alert({title: 'Event Updated!', content: 'Your event has been updated.', placement: 'top',
            type: 'info',duration: 3,
            container: 'body',animation: 'am-fade-and-slide-top', show: true});




    };

    $scope.reloadCalendar = function()
    {

        $('#calendar').fullCalendar('removeEvents');

        $scope.getAppointments();
    };




    /* add custom event*/
    $scope.addEvent = function() {

        $scope.new_event = {};
        $scope.new_event.date = new Date();

        addEventAside.$promise.then(function() {
            addEventAside.show();
        });

    };

    $scope.getAppointments = function()
    {
        $http.get(API_URL + "client/appointments")
            .success(function(response) {
                $scope.appointments = response;
                angular.forEach($scope.appointments,function(value,index){
                    $scope.events.push({
                        title: value.start_time  + " "+value.barber.first_name + " " + value.client.first_name,
                        appointment_id: value.appointment_id,
                        user_id: value.user_id,
                        barber_id: value.barber_id,
                        haircut_type: value.haircut_type,
                        music_choice: value.music_choice,
                        music_artist: value.music_artist,
                        drink_choice: value.drink_choice,
                        date: value.appointment_date,
                        start_time: value.start_time,
                        end_time: value.end_time,
                    });
                })
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
        element.attr({'tooltip': event.title,
            'tooltip-append-to-body': true});

        $compile(element)($scope);

    };
    /* config object */
    $scope.uiConfig = {
        calendar:{
            height: 450,
            editable: false,
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




    /* event sources array*/
    $scope.eventSources = [$scope.events, $scope.eventSource];

    //get appointments and load onto calendar.
    $scope.getAppointments();

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

    $scope.removeEvent = function(appointment_id)
    {
        var isConfirmDelete = confirm('Are you sure you want this appointment?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'client/appointments/' + appointment_id,
            }).
            success(function(data) {
                console.log(data);
                editEventAside.hide();
                $scope.reloadCalendar();
                var removeAlert = $alert({title: 'Event Deleted!', content: 'Your event has been deleted.', placement: 'top',
                    type: 'danger',duration: 3,container: 'body',
                    animation: 'am-fade-and-slide-top', show: true});
            }).
            error(function(data) {
                console.log(data);
                alert('Unable to delete');
            });



        } else {
            return false;
        }
    };

    $scope.getTimes = function(haircut_type,date)
    {
        var day = date.getDate();
        var x = date.toDateString().substr(4,3);
        var year = date.getFullYear();
        var formattedDate = day+'-'+x+'-'+year;

        console.log(formattedDate);

        var timeslot = 40;

        if(haircut_type == "Hot Towel Shave")
        {
            timeslot = 20;
        }
        else if(haircut_type == "Dry Cut & Hot Towel Shave" || haircut_type == "Wet Cut & Hot Towel Shave" || haircut_type == "Style Cut & Hot Towel Shave")
        {
            timeslot = 60;
        }

        $http.get(API_URL + "times/" + timeslot + "/" + formattedDate)
            .success(function (response) {
                console.log(response);
                $scope.times = response;
                console.log(timeslot);
            });
    };

});