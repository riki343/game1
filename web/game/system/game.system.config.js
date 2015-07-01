(function (angular) {
    angular.module('system').config(systemConfig);

    systemConfig.$inject = [
        '$routeProvider',
        'TEMPLATES'
    ];

    function systemConfig($routeProvider, TEMPLATES) {
        $routeProvider
            .when('/', {
                templateUrl: TEMPLATES.game.layout,
                controller: 'GameController'
            });
    }
})(angular);