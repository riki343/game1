(function (angular) {
    angular.module('core').config(config);

    config.$inject = [
        '$httpProvider',
        '$routeProvider',
        '$locationProvider',
        '$translateProvider',
        'TEMPLATES'
    ];

    function config($httpProvider, $routeProvider, $locationProvider, $translateProvider, TEMPLATES) {
        $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
        $locationProvider.html5Mode(true);
        /*
         $translateProvider.useStaticFilesLoader({
         prefix: 'bundles/naidusvoe/translations/locale-',
         suffix: '.json'
         });

         $translateProvider.preferredLanguage('ru');
         */
    }
})(angular);