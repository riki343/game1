(function (angular) {
    angular.module('system').controller('GameController', GameController);

    GameController.$inject = [
        'clankService',
        'charService',
        'charModel'
    ];

    function GameController(clank, char, charModel) {
        var self = this;
        this.chars = [];
        this.getChars = getChars;

        function getChars() {
            var promise = char.getChars();
            promise.then(function (data) {
                self.chars = data;
            });
        }

        getChars();
    }
})(angular);