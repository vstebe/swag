angular.module('fleming', ['ngRoute', 'ui.bootstrap']);

angular.module('fleming')
	.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
		  $routeProvider
		   .when('/center', {
			   templateUrl: 'app/templates/center/center.html'
		   });
		  
		  $locationProvider.html5Mode(true);
	}]);