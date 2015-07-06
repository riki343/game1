(function (angular) {
    angular.module('game').factory('canvasEngineService', canvasEngineService);

    canvasEngineService.$inject = [

    ];

    function canvasEngineService() {
        var self = this;
        this.canvas = null;
        this.renderer = null;
        this.stage = null;
        this.terrainsContainer = null;
        this.objectsContainer = null;

        var factory = {
            'resizeEngine': resizeEngine,
            'getRenderer': getRenderer,
            'getContainers': getContainers,
            'setCanvas': setCanvas,
            'getCanvas': getCanvas,
            'calculateClientWindow': calculateClientWindow
        };

        initEngine();
        return factory;

        function initEngine() {
            var point = calculateClientWindow();
            self.renderer = PIXI.autoDetectRenderer(point.width, point.height);
            self.stage = new PIXI.Container();

            self.terrainsContainer = new PIXI.Container();
            self.stage.addChild(self.terrainsContainer);

            self.objectsContainer = new PIXI.Container();
            self.stage.addChild(self.objectsContainer);

            resizeEngine();
        }

        function resizeEngine() {
            self.stage.x = self.renderer.width;
            self.stage.y = self.renderer.height;
            self.terrainsContainer.x = self.renderer.width;
            self.terrainsContainer.y = self.renderer.height;
            self.objectsContainer.x = self.renderer.width;
            self.objectsContainer.y = self.renderer.height;
        }

        function calculateClientWindow() {
            var viewContainer = document.getElementById('view-container');
            return {
                'width': viewContainer.clientWidth,
                'height': 0.5 * viewContainer.clientWidth
            };
        }

        function getRenderer() {
            return self.renderer;
        }

        function setCanvas(renderer) {
            self.renderer = renderer;
        }

        function getCanvas() {
            return self.renderer;
        }

        function getContainers() {
            return {
                'stage': self.stage,
                'terrains': self.terrainsContainer,
                'objects': self.objectsContainer
            };
        }
    }
})(angular);