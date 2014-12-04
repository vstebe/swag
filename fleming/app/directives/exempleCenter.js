angular.module("fleming")
  .directive("exempleCenter", ['centerDataService',
  function(centerDataService) {
    return {
      restrict: 'E',
      replace: true,
      scope: {},
      templateUrl: 'app/templates/exempleCenter.html',
      link: function(scope) {
    	  scope.centers = false;
    	  centerDataService.getCenters(function(centers) {
    		  if (angular.isDefined(centers)) {
    			  scope.centers = centers;
    		  }
    	  });
      }
    };
  }]);