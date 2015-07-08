(function (angular) {
    angular.module('game').factory('canvasEngineService', canvasEngineService);

    canvasEngineService.$inject = [
        'mapModel'
    ];

    function canvasEngineService(map) {
        var self = this;
        this.canvas = null;
        this.renderer = null;
        this.stage = null;
        this.terrainsContainer = null;
        this.gridContainer = null;
        this.gridPreviewContainer = null;
        this.unitsContainer = null;
        this.previewContainer = null;
        this.previewArea = [];
        this.map = null;
        this.mouseButton2 = {
            'down': false,
            'layerX': 0, 'layerY': 0,
            'containerX': 0, 'containerY': 0
        };
        this.building = null;
        this.terrain = null;
        this.unit = null;

        var factory = {
            'getRenderer': getRenderer,
            'setRenderer': setRenderer,
            'getContainers': getContainers,
            'setCanvas': setCanvas,
            'getCanvas': getCanvas,
            'calculateClientWindow': calculateClientWindow,
            'initEngine': initEngine,
            'createStage': createStage,
            'selectBuilding': selectBuilding,
            'selectTerrain': selectTerrain,
            'selectUnit': selectUnit
        };

        return factory;

        function initEngine(rows, cols) {
            createStage();
            drawGrid(rows, cols);
            self.map = new map.Grid(rows, cols);
            bindControls(rows, cols);
            animate();
        }

        function createStage() {
            delete self.stage;
            self.stage = new PIXI.Container();

            self.terrainsContainer = new PIXI.Container();
            self.stage.addChild(self.terrainsContainer);

            self.gridContainer = new PIXI.Container();
            self.stage.addChild(self.gridContainer);

            self.gridPreviewContainer = new PIXI.Container();
            self.stage.addChild(self.gridPreviewContainer);

            self.unitsContainer = new PIXI.Container();
            self.stage.addChild(self.unitsContainer);

            self.previewContainer = new PIXI.Container();
            self.stage.addChild(self.previewContainer);
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

        function bindControls(rows, cols) {
            var hitArea = new PIXI.Rectangle(
                -2 * 64, -2 * 64, // 2 x 2 offset
                (cols + 2) * 64,  // columns + 2 offset
                (rows + 2) * 64   // rows + 2 offset
            );
            self.stage.hitArea = self.terrainsContainer.hitArea = hitArea;
            self.stage.interactive = self.terrainsContainer.interactive = true;

            // Listenrs for stage mouse events
            self.stage.on('mousedown', down); // when we click on some button (mouse)
            self.stage.on('mouseup', up);     // when we release button (mouse)
            self.stage.on('mouseout', leave); // when mouse leave stage
            self.stage.on('mousemove', move); // when mouse move

            // bind shift + scroll(up/down) to scale canvas
            self.canvas[0].addEventListener("mousewheel", scale, false);
            self.canvas[0].addEventListener("DOMMouseScroll", scale, false);

            // Listeners for preview object that follows for mouse on canvas
            self.canvas.on('mouseover', previewEnter); // add object to canvass
            self.canvas.on('mouseout', previewLeave);  // remove object
            self.canvas.on('mousemove', previewMove);  // move object
            self.canvas.on('mouseup', previewUp);      // place object
        }

        /**
         * @param {String} pixel
         * @returns {Number}
         */
        function pixelToNumber(pixel) {
            pixel = pixel.replace('px', '');
            return parseInt(pixel);
        }

        function previewEnter(event) {
            var obj = self.terrain || self.building || self.unit || null;
            if (obj !== null) {
                self.previewContainer.addChild(obj);
            }
        }

        function previewLeave(event) {
            var obj = self.terrain || self.building || self.unit || null;
            if (obj !== null) {
                self.previewContainer.removeChild(obj);
            }
        }

        function previewMove(event) {
            var X = event.originalEvent.layerX - self.stage.x;
            var Y = event.originalEvent.layerY - self.stage.y;
            if (event.originalEvent.layerX - self.stage.x > 0 && event.originalEvent.layerY - self.stage.y > 0) {
                var obj = self.terrain || self.building || self.unit || null;
                if (obj !== null) {
                    obj.position.x = X;
                    obj.position.y = Y;
                    clearPreviewArea();
                    calculatePreviewArea(X, Y, obj);
                    drawPreviewArea();
                }
            }
        }

        function previewUp(event) {
            switch (event.originalEvent.which) {
                case 1:
                    if (self.terrain !== null) {
                        var copy = copySprite(self.terrain, true);
                        copy.position.x = self.previewArea[0].x;
                        copy.position.y = self.previewArea[0].y;
                        self.previewArea[0].terrain = copy;
                        self.terrainsContainer.addChild(copy);
                    } else if (self.building !== null) {
                    } else if (self.unit !== null) {
                    }
                    break;
                default: break;
            }
        }

        function clearPreviewArea() {
            var pw = self.previewArea;
            for (var i in pw) {
                self.gridPreviewContainer.removeChild(pw[i].preview);
                pw[i].preview = null;
                pw.splice(pw.indexOf(pw[i]), 1);
            }
        }

        function calculatePreviewArea(X, Y, obj) {
            var grid = self.map.grid;
            for (var i = ~~(X / 64); i < ((X + obj.width) / 64); i++) {
                for (var j = ~~(Y / 64); j < ((Y + obj.height) / 64); j++) {
                    if (grid[i][j].percentContains(obj.position.x, obj.position.y, obj.width, obj.height) > 70) {
                        var graphics = new PIXI.Graphics();
                        graphics.beginFill(0x00FF00, 0.6);
                        graphics.drawRect(grid[i][j].x, grid[i][j].y, grid[i][j].width, grid[i][j].height);
                        grid[i][j].preview = graphics;
                        self.previewArea.push(grid[i][j]);
                    }
                }
            }
        }

        function drawPreviewArea() {
            var pw = self.previewArea;
            for (var i in pw) {
                self.gridPreviewContainer.addChild(pw[i].preview);
            }
        }

        function copySprite(sprite, withScale) {
            var newSprite = new PIXI.extras.TilingSprite(sprite.texture);
            newSprite.width = sprite.width;
            newSprite.height = sprite.height;
            newSprite.tilePosition.x = sprite.tilePosition.x;
            newSprite.tilePosition.y = sprite.tilePosition.y;
            if (withScale === true) {
                newSprite.tileScale.x = sprite.tileScale.x;
                newSprite.tileScale.y = sprite.tileScale.y;
            }

            return newSprite;
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

        function up(event) {
            switch (event.data.originalEvent.which) {
                case 2:
                    self.mouseButton2.down = false;
                    break;
                default: break;
            }
        }

        function leave(event) {
            self.mouseButton2.down = false;
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
                    break;
            }
        }

        function animate() {
            self.renderer.render(self.stage);
            requestAnimationFrame(animate);
        }

        function selectBuilding(buildingItem, obj) {
            if (buildingItem === null) {
                self.building = null; return;
            }

            var texture = PIXI.Texture.fromImage(buildingItem.resource.src);
            texture.frame.width = pixelToNumber(obj.bgX);
            texture.frame.height = pixelToNumber(obj.bgY);
            var building = self.building = new PIXI.extras.TilingSprite(texture);
            building.width = pixelToNumber(obj.offsetX);
            building.height = pixelToNumber(obj.offsetY);
            /*if (buildingItem.resource.width >= texture.frame.width) {
                building.tileScale.x = buildingItem.resource.width / texture.frame.width;
            } else {
                building.tileScale.x = texture.frame.width / buildingItem.resource.width;
            }
            if (buildingItem.resource.height >= texture.frame.height) {
                building.tileScale.y = buildingItem.resource.height / texture.frame.height;
            } else {
                building.tileScale.y = texture.frame.height / buildingItem.resource.height;
            }*/
            //building.tileScale.x = self.building.tileScale.y = 2;
            building.tilePosition.x = -pixelToNumber(obj.X);
            building.tilePosition.y = -pixelToNumber(obj.Y);
        }

        function selectTerrain(terrainItem, obj) {
            if (terrainItem === null) {
                self.terrain = null; return;
            }

            var texture = PIXI.Texture.fromImage(terrainItem.resource.src);
            texture.frame.width = pixelToNumber(obj.bgX);
            texture.frame.height = pixelToNumber(obj.bgY);
            var terrain = self.terrain = new PIXI.extras.TilingSprite(texture);
            terrain.width = pixelToNumber(obj.offsetX);
            terrain.height = pixelToNumber(obj.offsetY);
            terrain.tileScale.x = self.terrain.tileScale.y = 2;
            terrain.tilePosition.x = -pixelToNumber(obj.X);
            terrain.tilePosition.y = -pixelToNumber(obj.Y);
        }

        function selectUnit(unitItem, obj) {
            if (unitItem === null) {
                self.unit = null; return;
            }

            self.unit = unitItem;
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