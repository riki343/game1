(function (angular) {
    angular.module('global').constant('TEMPLATES', TEMPLATES());
    //angular.module('global').constant('RESOURCES', RESOURCES());

    function TEMPLATES() {
        return {
            'game': {
                'layout': 'resources/templates/game.html',
                'mainMenu': 'resources/templates/menu.html',
                'newChar': 'resources/templates/new_char.html'
            },
            'editor': {
                'level_editor': 'resources/templates/level_editor.html'
            }
        }
    }
})(angular);