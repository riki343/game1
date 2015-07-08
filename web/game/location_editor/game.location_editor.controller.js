(function (angular) {
    angular.module('location_editor').controller('LocationEditorController', LocationEditorController);

    LocationEditorController.$inject = [
        '$routeParams',
        'locationEditor',
        'canvasEngineService'
    ];

    function LocationEditorController($params, locationEditor, canvas) {
        var self = this;
        this.level = {};
        this.editor = {};
        this.location_id = $params.location_id;
        this.season = 'summer';

        this.selectedTerrain = null;
        this.selectedBuilding = null;
        this.selectedUnit = null;

        this.loadLocation = loadLocation;
        this.selectBuilding = selectBuilding;
        this.selectTerrain = selectTerrain;
        this.selectUnit = selectUnit;

        loadLocation();

        function loadLocation() {
            var promise = locationEditor.loadLevel(self.location_id);
            promise.then(function (data) {
                self.editor = data.editor;
                self.level = data.level;
                canvas.initEngine(self.level.width, self.level.height);
            });
        }

        function selectTerrain(terrain, obj) {
            canvas.selectBuilding(null);
            canvas.selectTerrain(terrain, obj);
            canvas.selectUnit(null);
            self.selectedTerrain = obj;
            self.selectedBuilding = null;
            self.selectedUnit = null;
        }

        function selectBuilding(building, obj) {
            canvas.selectBuilding(building, obj);
            canvas.selectTerrain(null);
            canvas.selectUnit(null);
            self.selectedTerrain = null;
            self.selectedBuilding = obj;
            self.selectedUnit = null;
        }

        function selectUnit(unit, obj) {
            canvas.selectBuilding(null);
            canvas.selectTerrain(null);
            canvas.selectUnit(unit, obj);
            self.selectedTerrain = null;
            self.selectedBuilding = null;
            self.selectedUnit = obj;
        }
    }
})(angular);