angular.module('fleming')
  .factory('centerHttpService', ['$http', function($http) {
    var service = {
      getCenters: function(callback) {
    	$http.get('center/cetCenters/').success(callback);
      }
    };
    
    return service;
  }]);