angular.module('fleming')
	.directive('diagnostic', ['diagnosticModalService', function (diagnosticModalService) {
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'app/templates/diagnostic/diagnostic.html',
			link: function (scope) {
				scope.openModal = function () {
					diagnosticModalService.openModal();
				};
			}
		};
	}]);