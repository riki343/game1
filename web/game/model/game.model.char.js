(function (angular) {
    angular.module('model').factory('charModel', charModel);

    charModel.$inject = [];

    function charModel() {
        var factory = {
            'newModel': newModel
        };

        return factory;

        function newModel() {
            //this.modelID = 1;
            return new function () {
                this.name = '';
                this.fractionID = 1;
                this.specializationID = 1;
                this.sex = 1;
            };
        }
    }

})(angular);