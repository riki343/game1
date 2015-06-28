(function (angular) {
    angular.module('query').factory('resourceLoader', resourceLoader);

    resourceLoader.$inject = [
        '$rootScope',
        'fileReaderService'
    ];

    function resourceLoader ($scope, $fileReader) {
        var self = this;

        this.resourcesLoading = {};
        this.totalProgress = 0;
        this.resourcesCache = {};

        $scope.$on('fileLoadStart', function (file) {
            if (self.resourcesLoading.length === 0) {
                $scope.$broadcast('resourcesLoadingStart');
            }
            self.resourcesLoading[file] = 0;
        });

        $scope.$on('fileLoadEnd', function (event) {
            delete self.resourcesLoading[event.file];
            if (self.resourcesLoading.length === 0) {
                self.totalProgress = 0;
                $scope.$broadcast('resourcesLoadingEnd');
            }

            self.resourcesCache[event.file] = event.result;
        });

        $scope.$on('fileProgressChanged', function (event) {
            self.resourcesLoading[event.file] = (event.loaded / event.total) * 100;
            self.calculateTotalProgress();
        });

        $scope.$on('fileLoadFailed', function (event) {
            throw 'Resource "' + event.file + '" loading failed';
        });

        this.calculateTotalProgress = calculateTotalProgress;

        var loader = {
            'loadResource': loadResource,
            'loadResources': loadResources,
            'onResourcesLoadingStart': onResourcesLoadingStart,
            'onResourcesLoadingEnd': onResourcesLoadingEnd,
            'onTotalProgressChanged': onTotalProgressChanged
        };

        return loader;

        function loadResource(resource) {
            if (angular.isDefined(self.resourcesCache[resource])) {
                return self.resourcesCache[resource];
            } else {
                $fileReader.readAsDataURL(resource, $scope);
            }
        }

        function loadResources(resources) {
            angular.forEach(resources, function (key, val) {
               loadResource(val);
            });
        }

        function onResourcesLoadingStart(handler) {
            $scope.$on('resourcesLoadingStart', handler);
        }

        function onResourcesLoadingEnd(handler) {
            $scope.$on('resourcesLoadingEnd', handler);
        }

        function onTotalProgressChanged(handler) {
            $scope.$on('totalProgressChanged', handler);
        }

        function calculateTotalProgress() {
            var total = 0;
            var count = self.resourcesLoading.length;
            angular.forEach(self.resourcesLoading, function (key, val) {
                total += val;
            });
            var preTotalProgress = self.totalProgress;
            self.totalProgress = ~~(total / count);
            if (preTotalProgress !== self.totalProgress) {
                $scope.$broadcast('totalProgressChanged', self.totalProgress);
            }
        }
    }
})(angular);