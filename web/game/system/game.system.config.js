(function (angular) {
    angular.module('system').config(systemConfig);

    systemConfig.$inject = [
        '$routeProvider',
        'TEMPLATES'
    ];

    function systemConfig($routeProvider, TEMPLATES) {
        $routeProvider
            .when('/', {
                'templateUrl': TEMPLATES.game.mainMenu,
                'controller': 'GameController as game'
            })
            .when('/new_char', {
                'templateUrl': TEMPLATES.game.newChar,
                'controller': 'NewCharController as newChar'
            })
            .when('/game/:char_id', {
                'templateUrl': TEMPLATES.game.layout,
                'controller': 'LevelController as level'
            })
            .when('/test/:location_id', {
                'templateUrl': TEMPLATES.editor.level_editor,
                'controller': 'LocationEditorController as editor'
            })
        ;
    }
})(angular);