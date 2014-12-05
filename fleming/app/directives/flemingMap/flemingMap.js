angular.module('fleming')
	.directive('flemingMap', [function() {
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'app/templates/flemingMap/flemingMap.html'
		}
	}]);