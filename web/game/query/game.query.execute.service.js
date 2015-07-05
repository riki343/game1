(function (angular) {
    angular.module('query').factory('executeQuery', executeQuery);

    executeQuery.$inject = [
        '$q',
        '$http',
        'spinnerService'
    ];

    function executeQuery($q, $http, spinner) {
        var factory = {
            'post': Post,
            'get': Get,
            'delete': Delete
        };

        return factory;

        function Post(path, object) {
            var deffered = $q.defer();
            var promise = $http.post(path, object);
            promise.then(function (data) {
                deffered.resolve(data.data);
            });
            return deffered.promise;
        }

        function Get(path, withSpinner) {
            var deffered = $q.defer();
            var promise = $http.get(path);
            promise.then(function (data) {
                deffered.resolve(data.data);
            });
            if (angular.isDefined(withSpinner) && withSpinner === true) {
                spinner.addPromise(deffered.promise);
            }
            return deffered.promise;
        }

        function Delete(path) {
            var deffered = $q.defer();
            var promise = $http.delete(path);
            promise.then(function (data) {
                deffered.resolve(data.data);
            });
            return deffered.promise;
        }
    }
})(angular);