angular.module('fleming')
	.directive('centerList', [function() {
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'app/templates/center/center.html'
		};
	}])