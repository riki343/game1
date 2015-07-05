(function (angular) {
    angular.module('system').controller('LevelController', LevelController);

    LevelController.$inject = [
        '$routeParams',
        'levelLoader'
    ];

    function LevelController($params, levelLoader)  {
        var self = this;
        this.char_id = $params.char_id;

        function loadLevel() {
            var promise = levelLoader.loadLevel(self.char_id);
            promise.then(function (data) {

            });
        }

        loadLevel();
    }
})(angular);