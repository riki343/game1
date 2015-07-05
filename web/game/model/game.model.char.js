(function (angular) {
    angular.module('model').factory('charModel', charModel);

    charModel.$inject = [];

    function charModel() {
        var factory = {
            'getModel': getModel
        };

        return factory;

        function getModel(options) {
            this.name = options.name;
            this.level = options.level;

            return this;
        }
    }

})(angular);