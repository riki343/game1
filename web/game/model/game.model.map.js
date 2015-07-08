(function (angular) {
    angular.module('model').value('mapModel', new MapModel());

    MapModel.$inject = [];

    function MapModel() {
        var self = this;

        /**
         * @param {Number} width
         * @param {Number} height
         * @constructor
         */
        this.Grid = function (width, height) {
            this.width = width;
            this.height = height;
            this.grid = [];
            for (var i = 0; i < width; i++) {
                this.grid.push([]);
                for (var j = 0; j < height; j++) {
                    this.grid[i].push(new self.Cell(i * 64, j * 64));
                }
            }
        };

        /**
         * @param {Number} x
         * @param {Number} y
         * @constructor
         */
        this.Cell = function (x, y) {
            this.x = x; this.y = y;
            this.width = 64;
            this.height = 64;
            this.terrain = null;
            this.building = null;
            this.buildingPart = null;
            this.unit = null;
            this.preview = null;

            /**
             * @param {Number} a
             * @param {Number} b
             * @param {Number} c
             * @returns {number}
             */
            function findPercent(a, b, c) {
                return c * 100 / Math.abs(a - b);
            }

            /**
             * @param {Number} x
             * @param {Number} y
             * @param {Number} width
             * @param {Number} height
             * @returns {number}
             */
            this.percentContains = function (x, y, width, height) {
                var widthPercents = 0;
                if (this.x <= x && this.x + this.width >= x) {
                    widthPercents = Math.abs((this.x + this.width) - x);
                    widthPercents = findPercent(this.x, this.x + this.width, widthPercents);
                } else if (this.x <= x + width && this.x + this.width >= x + width) {
                    widthPercents = Math.abs(this.x - (x + width));
                    widthPercents = findPercent(this.x, this.x + this.width, widthPercents);
                }

                var heightPercents = 0;
                if (this.y <= y && this.y + this.height >= y) {
                    heightPercents = Math.abs((this.y + this.height) - y);
                    heightPercents = findPercent(this.y, this.y + this.height, heightPercents);
                } else if (this.y <= y + height && this.y + this.height >= y + height) {
                    heightPercents = Math.abs(this.y - (y + height));
                    heightPercents = findPercent(this.y, this.y + this.height, heightPercents);
                }

                return (widthPercents + heightPercents) / 2;
            };
        };
    }

})(angular);