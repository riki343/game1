(function (angular) {
    angular.module('query').factory('charService', charService);

    charService.$inject = [
        'executeQuery'
    ];

    function charService(query) {
        var factory = {
            'getChars': getChars,
            'getChar': getChar,
            'addChar': addChar
        };

        return factory;

        function getChar() {

        }

        function getChars() {
            return query.get(Routing.generate('get_user_chars'), true);
        }

        function addChar(char) {
            return query.post(Routing.generate('user_add_char'), char, true);
        }
    }
})(angular);