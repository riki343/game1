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

        this.loadLocation = loadLocation;
        loadLocation();

        function loadLocation() {
            var promise = locationEditor.loadLevel(self.location_id);
            promise.then(function (data) {
                self.editor = data.editor;
                self.level = data.level;
                canvas.initEngine(self.level.width, self.level.height);
            });
        }
    }
})(angular);