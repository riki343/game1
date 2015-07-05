(function (angular, PIXI) {
    angular.module('game').directive('pixiCanvas', pixiCanvas);

    pixiCanvas.$inject = [];

    function pixiCanvas() {
        return {
            'restrict': 'AE',
            'link': link
        };

        function link($scope, element, attr) {
            var viewContainer = document.getElementById('view-container');
            var width = viewContainer.clientWidth;  // width - 2, height - 1,
            var height = 0.5 * width;               // need to calculate 2:1
            var renderer = PIXI.autoDetectRenderer(width, height);
            var canvas = angular.element(renderer.view);
            canvas.attr('id', 'canvas');
            element.append(canvas);

            window.onresize = function () {
                canvas.attr('width', viewContainer.clientWidth);
                canvas.attr('height', viewContainer.clientWidth * 0.5);
            }
        }
    }
})(angular, PIXI);