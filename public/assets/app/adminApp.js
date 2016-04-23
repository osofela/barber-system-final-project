var app = angular.module('adminAppointments', ['ui.bootstrap','ui.calendar','mgcrea.ngStrap',
    'ngAnimate','ngSanitize'])
    .constant('API_URL', 'http://localhost:8000/api/v1/');
