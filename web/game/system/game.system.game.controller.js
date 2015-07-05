(function (angular) {
    angular.module('system').controller('GameController', GameController);

    GameController.$inject = [
        'charService'
    ];

    function GameController(char) {
        var self = this;
        this.chars = [];
        this.selectedChar = null;
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