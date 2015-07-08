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
            var point = engine.calculateClientWindow();
            var renderer = PIXI.autoDetectRenderer(point.width, point.height);
            engine.setRenderer(renderer);
            var canvas = angular.element(renderer.view);
            canvas.attr('id', 'canvas');
            element.append(canvas);

            window.onresize = function () {
                var point = engine.calculateClientWindow();
                renderer.view.width = point.width;
                renderer.view.height = point.height;
                renderer.resize(point.width, point.height);
            };

            engine.setCanvas(canvas);
        }
    }
})(angular, PIXI);