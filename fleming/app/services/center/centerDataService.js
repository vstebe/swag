angular.module('fleming')
  .factory("centerDataService", ['centerHttpService', function(centerHttpService) {
    var service = {
      getCenters: function(callback) {
    	  centerHttpService.getCenters(callback);
      }
    };
    
    return service;
  }]);