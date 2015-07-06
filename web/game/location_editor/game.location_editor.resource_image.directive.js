(function (angular) {
    angular.module('location_editor').directive('resourceImage', resourceImage);

    function resourceImage() {
        return {
            'template': '<div></div>',
            'restrict': 'E',
            'link': link,
            'scope': { 'img': '=', 'unit': '=' }
        };

        function link($scope, element, attrs) {
            var imageElement = element.find('div');
            imageElement = $(imageElement[0]);
            var image = $scope.img;
            var unit = $scope.unit;
            imageElement.css('background-image', 'url(\'' + image.src + '\')');
            imageElement.css('width', unit.offsetX);
            imageElement.css('height', unit.offsetY);
            imageElement.css('background-size', unit.bgX + ' ' + unit.bgY);
            imageElement.css('background-position', unit.X + ' ' + unit.Y);
        }
    }
})(angular);