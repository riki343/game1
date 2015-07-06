(function (angular) {
    angular.module('location_editor').controller('LocationEditorController', LocationEditorController);

    LocationEditorController.$inject = [
        '$routeParams',
        'locationEditor'
    ];

    function LocationEditorController($params, editorService) {
        var self = this;
        this.level = {};
        this.editor = {};
        this.location_id = $params.location_id;

        function loadLocation() {
            var promise = editorService.loadLevel(self.location_id);
            promise.then(function (data) {
                self.editor = data.editor;
                self.level = data.level;
            });
        }

        loadLocation();
    }
})(angular);