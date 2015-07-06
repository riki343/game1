(function (angular) {
    angular.module('validation').directive('formValidation', formValidation);

    formValidation.$inject = [
        '$compile'
    ];

    function formValidation($compile) {
        return {
            'restrict': 'EA',
            'link': link,
            'scope': {
                'errors': '=',
                'model': '='
            }
        };

        function generateErrorList(id) {
            var list = '<ul id="' + id + '_errors">';
            list += '<li style="font-size: 13px;" class="text-primary" ng-repeat="error in errors" ng-if="error.field == \''+ id +'\'" ng-bind="error.message"></li>';
            list += '</ul>';

            return list;
        }

        function clearErrors(element, model) {
            for (var i in model) {
                var input = element.find(document.querySelector('[name="'+ i +'"]'));
                var inputContainer = input.parent().parent();
                var existingElement = inputContainer.find('ul#' + i + '_errors');
                if (existingElement) {
                    existingElement.remove();
                }
            }
        }

        function link($scope, element, attr) {
            $scope.$watch('errors', function () {
                clearErrors(element, $scope.model);
                var errors = $scope.errors;
                for (var i in errors) {
                    var el = element.find(document.querySelector('[name="'+ errors[i].field +'"]'));
                    var inputContainer = el.parent().parent();
                    var errorList = angular.element(generateErrorList(errors[i].field));
                    inputContainer.append(errorList);
                    $compile(inputContainer)($scope);
                }
            });
        }
    }
})(angular);