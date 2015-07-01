(function (angular) {
    angular.module('global').constant('TEMPLATES', TEMPLATES());

    function TEMPLATES() {
        return {
            'game': {
                'layout': 'resources/templates/game.html'
            }
        }
    }
})(angular);