(function (angular, PIXI) {
    angular.module('game').directive('pixiCanvas', pixiCanvas);

    pixiCanvas.$inject = [
        'canvasEngineService'
    ];

    function pixiCanvas(engine) {
        return {
            'restrict': 'AE',
            'link': link
        };

        function link($scope, element, attr) {
            var renderer = engine.getRenderer();
            var canvas = angular.element(renderer.view);
            canvas.attr('id', 'canvas');
            element.append(canvas);

            window.onresize = function () {
                var point = engine.calculateClientWindow();
                canvas.attr('width', point.width);
                canvas.attr('height', point.height);
                renderer.width = point.width;
                renderer.height = point.height;
                engine.resizeEngine();
            };

            engine.setCanvas(canvas);
        }
    }
})(angular, PIXI);