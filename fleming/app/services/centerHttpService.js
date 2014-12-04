angular.module("fleming")
  .factory("centerHttpService", ['$http', function($http) {
    var service = {
      getCenters: function(callback) {
	$http.get('Center/GetCenters/').success(callback);
      }
    };
    
    return service;
  }]);