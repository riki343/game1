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
        this.gridContainer = null;
        this.mouseButton2 = {
            'down': false,
            'layerX': 0, 'layerY': 0,
            'containerX': 0, 'containerY': 0
        };

        this.wheelButton = { 'direction': 'up', 'scale': 1 };

        var factory = {
            'getRenderer': getRenderer,
            'setRenderer': setRenderer,
            'getContainers': getContainers,
            'setCanvas': setCanvas,
            'getCanvas': getCanvas,
            'calculateClientWindow': calculateClientWindow,
            'initEngine': initEngine
        };

        return factory;

        function initEngine(rows, cols) {
            self.stage = new PIXI.Container();

            self.gridContainer = new PIXI.Container();
            self.stage.addChild(self.gridContainer);

            self.terrainsContainer = new PIXI.Container();
            self.stage.addChild(self.terrainsContainer);

            self.objectsContainer = new PIXI.Container();
            self.stage.addChild(self.objectsContainer);

            drawGrid(rows, cols);
            bindControls(rows, cols);

            animate();
            function animate() {
                self.renderer.render(self.stage);
                requestAnimationFrame(animate);
            }
        }

        function bindControls(rows, cols) {
            self.stage.hitArea = new PIXI.Rectangle(
                -2 * 64, -2 * 64, // 2 x 2 offset
                (cols + 2) * 64,  // columns + 2 offset
                (rows + 2) * 64   // rows + 2 offset
            );

            self.stage.interactive = true;
            self.stage.on('mousedown', down);
            self.stage.on('mouseup', leave);
            self.stage.on('mouseleave', leave);
            self.stage.on('mousemove', move);
            self.canvas[0].addEventListener("mousewheel", scale, false);
            self.canvas[0].addEventListener("DOMMouseScroll", scale, false);
        }

        function scale(event) {
            var e = window.event || event;
            if (e.shiftKey) {
                var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
                if (delta > 0 || self.stage.scale.x > 1) {
                    self.stage.scale.x += delta * 0.1;
                    self.stage.scale.y += delta * 0.1;
                }
            }
        }

        function move(event) {
            if (self.mouseButton2.down === true) {
                self.stage.x = event.data.originalEvent.layerX - self.mouseButton2.layerX + self.mouseButton2.containerX;
                self.stage.y = event.data.originalEvent.layerY - self.mouseButton2.layerY + self.mouseButton2.containerY;
            }
        }

        function leave(event) {
            switch (event.data.originalEvent.which) {
                case 2:
                    self.mouseButton2.down = false;
                    break;
                default: break;
            }
        }

        function down(event) {
            switch (event.data.originalEvent.which) {
                case 2:
                    self.mouseButton2.down = true;
                    self.mouseButton2.layerX = event.data.originalEvent.layerX;
                    self.mouseButton2.containerX = self.stage.x;
                    self.mouseButton2.layerY = event.data.originalEvent.layerY;
                    self.mouseButton2.containerY = self.stage.y;
                    break;
                default:
                    console.log(event.data.originalEvent.which);
                    break;
            }
        }

        function drawGrid(rows, cols) {
            var graphics = new PIXI.Graphics();

            graphics.lineStyle(1, 0x00ff00, 1);
            graphics.beginFill(0x00FF00, 1);
            for (var i = 0; i <= cols; i++) {
                graphics.moveTo(i * 64, 0);
                graphics.lineTo(i * 64, rows * 64);
            }
            for (i = 0; i <= rows; i++) {
                graphics.moveTo(0, i * 64);
                graphics.lineTo(cols * 64, i * 64);
            }
            graphics.endFill();

            self.gridContainer.addChild(graphics);
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

        function setRenderer(renderer) {
            self.renderer = renderer;
        }

        function setCanvas(canvas) {
            self.canvas = canvas;
        }

        function getCanvas() {
            return self.canvas;
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