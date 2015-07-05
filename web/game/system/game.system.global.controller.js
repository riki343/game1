(function (angular) {
    angular.module('system').controller('GlobalController', GlobalController);

    GlobalController.$inject = [
        'clankService'
    ];

    function GlobalController(clank) {

    }
})(angular);