(function (angular) {
    angular.module('location_editor').factory('locationEditor', locationEditor);

    locationEditor.$inject = [
        'executeQuery',
        '$q',
        'spinnerService',
        'resourceLoader'
    ];

    function locationEditor(query, $q, spinner, resource) {
        var self = this;

        var factory = {
            'loadLevel': loadLevel
        };

        return factory;

        function loopLooadResources(resources) {
            for (var i in resources) {
                resources[i].resource = resource.loadImageResource(resources[i].resource);
            }
        }

        function loadLevel(location_id) {
            var defered = $q.defer();
            var promise = query.get(Routing.generate('location_editor', { 'location_id': location_id }), true);
            promise.then(function (data) {
                // Buildings Humans
                loopLooadResources(data.editor.buildings.summer.humans);
                loopLooadResources(data.editor.buildings.swamp.humans);
                loopLooadResources(data.editor.buildings.wasteland.humans);
                loopLooadResources(data.editor.buildings.winter.humans);

                // Buildings Orcs
                loopLooadResources(data.editor.buildings.summer.orcs);
                loopLooadResources(data.editor.buildings.swamp.orcs);
                loopLooadResources(data.editor.buildings.wasteland.orcs);
                loopLooadResources(data.editor.buildings.winter.orcs);

                // Buildings Neutrals
                loopLooadResources(data.editor.buildings.summer.neutrals);
                loopLooadResources(data.editor.buildings.swamp.neutrals);
                loopLooadResources(data.editor.buildings.wasteland.neutrals);
                loopLooadResources(data.editor.buildings.winter.neutrals);

                // Icons
                loopLooadResources(data.editor.icons);

                // Missiles
                loopLooadResources(data.editor.missiles);

                // Terrains
                loopLooadResources(data.editor.terrains);

                // Units
                loopLooadResources(data.editor.units.humans);
                loopLooadResources(data.editor.units.neutrals);
                loopLooadResources(data.editor.units.orcs);

                defered.resolve(data);
            });
            spinner.addPromise(promise);
            return defered.promise;
        }
    }
})(angular);