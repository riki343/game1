(function (angular) {
    var sprites = '../../resources/images/sprites';

    function getAsset(dir, resource) {
        return dir + resource;
    }

    angular.module('query').constant('SPRITES', {
        '': getAsset('', ''),
        }
    );
})(angular);