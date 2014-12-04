angular.module('fleming')
	.directive('center', [function() {
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'app/templates/center/center.html'
		};
	}])