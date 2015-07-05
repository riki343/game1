(function (angular) {
    angular.module('system').controller('NewCharController', NewCharController);

    NewCharController.$inject = [
        'charService',
        'charModel',
        '$location'
    ];

    function NewCharController(char, charModel, $location) {
        var self = this;
        this.char = charModel.newModel();
        this.errors = [];
        this.addChar = addChar;

        function addChar(newChar) {
            var promise = char.addChar(newChar);
            promise.then(function (response) {
                if (response.error === -1) {
                    self.errors = response.messages;
                    $location.path('/');
                } else {
                    self.errors = response.messages;
                }
            });
        }
    }
})(angular);