angular.module('fleming')
	.directive('navbar', [function() {
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'app/templates/navbar/navbar.html',
			link: function (scope, elem, atts) {
				
			}
		};
	}]);