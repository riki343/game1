(function (angular) {
    angular.module('query').factory('levelLoader', levelLoader);

    levelLoader.$inject = [
        'executeQuery'
    ];

    function levelLoader(query) {
        var factory = {
            'loadLevel': loadLevel
        };

        return factory;

        function loadLevel(char_id) {
            return query.get(Routing.generate('get_level', { 'char_id': char_id }));
        }
    }
})(angular);