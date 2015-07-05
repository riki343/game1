(function (angular) {
    angular.module('global').constant('TEMPLATES', TEMPLATES());
    angular.module('global').constant('RESOURCES', RESOURCES());

    function TEMPLATES() {
        return {
            'game': {
                'layout': 'resources/templates/game.html',
                'mainMenu': 'resources/templates/menu.html',
                'newChar': 'resources/templates/new_char.html'
            }
        }
    }

    function RESOURCES() {
        return {
            'character': {
                'human': {

                },
                'orc': {

                }
            }
        }
    }
})(angular);