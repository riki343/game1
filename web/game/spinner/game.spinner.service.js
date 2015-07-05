(function (angular) {
    angular.module('spinner').factory('spinnerService', spinner);

    spinner.$inject = [
        '$rootScope'
    ];

    function spinner($rootScope) {
        var self = this;
        this.promises = [];
        this.progress = 0;

        return {
            'addPromise': addPromise,
            'onPromisesEnd': onPromisesEnd,
            'onPromisesStart': onPromisesStart,
            'onProgressChanged': onProgressChanged,
            'startPromises': startPromises,
            'changeProgress': changeProgress,
            'finishPromises': finishPromises
        };

        function addPromise(promise) {
            if (self.promises.length === 0) {
                $rootScope.$broadcast('promisesStart');
            }
            self.promises.push(promise);
            promise.then(function () {
                var promiseIndex = self.promises.indexOf(promise);
                self.promises.splice(promiseIndex, 1);
                if (self.promises.length === 0) {
                    $rootScope.$broadcast('promisesEnd');
                }
            });
        }

        function startPromises() {
            self.progress = 0;
            $rootScope.$broadcast('promisesStart');
        }

        function changeProgress(progress) {
            self.progress = progress;
            $rootScope.$broadcast('progressChanged', progress);
        }

        function finishPromises() {
            self.progress = 0;
            $rootScope.$broadcast('promisesEnd');
        }

        function onPromisesEnd(handler) {
            $rootScope.$on('promisesEnd', handler);
        }

        function onPromisesStart(handler) {
            $rootScope.$on('promisesStart', handler);
        }

        function onProgressChanged(handler) {
            $rootScope.$on('progressChanged', handler)
        }
    }
})(angular);