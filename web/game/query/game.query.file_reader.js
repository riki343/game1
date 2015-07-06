(function (angular) {
    angular.module('query').factory('fileReaderService', fileReaderService);

    fileReaderService.$inject = [
        '$q'
    ];

    function fileReaderService($q) {
        /**
         * @type {{readAsDataURL: function}}
         */
        var factory = {
            'readAsDataURL': readAsDataURL,
            'readAsImageURL': readAsImageURL
        };

        return factory;

        function onLoad(reader, deferred, scope, file) {
            return function () {
                scope.$broadcast('fileLoadFinished', {
                    'file': file,
                    'result': reader.result
                });
                scope.$apply(function () {
                    deferred.resolve(reader.result);
                });
            };
        }

        function onError(reader, deferred, scope, file) {
            return function () {
                scope.$broadcast('fileLoadFailed', {
                    'file': file,
                    'result': reader.result
                });
                scope.$apply(function () {
                    deferred.reject(reader.result);
                });
            };
        }

        function onProgress($scope, file) {
            return function (event) {
                if (event.loaded === 0) {
                    $scope.$broadcast('fileLoadStart', file);
                } else {
                    $scope.$broadcast("fileProgressChanged", {
                        'total': event.total,
                        'loaded': event.loaded,
                        'file': file
                    });
                }
            };
        }

        function getReader(deferred, scope, file) {
            var reader = new FileReader();
            reader.onload = onLoad(reader, deferred, scope, file);
            reader.onerror = onError(reader, deferred, scope, file);
            reader.onprogress = onProgress(scope, file);
            return reader;
        }

        function getImageReader(deferred, scope, file) {
            var reader = new Image();
            reader.onload = onLoad(reader, deferred, scope, file);
            reader.onerror = onError(reader, deferred, scope, file);
            reader.onprogress = onProgress(scope, file);
            return reader;
        }

        function readAsDataURL(file, scope) {
            var deferred = $q.defer();

            var reader = getReader(deferred, scope, file);
            reader.readAsDataURL(file);

            return deferred.promise;
        }

        function readAsImageURL(file, scope) {
            var deferred = $q.defer();

            var reader = getImageReader(deferred, scope, file);
            reader.src = file;

            return deferred.promise;
        }
    }
})(angular);