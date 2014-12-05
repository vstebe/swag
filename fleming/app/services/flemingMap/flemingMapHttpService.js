angular.module('fleming')
  .factory('flemingMapHttpService', ['$http', 'constants', function($http, constants) {
    var service = {
      getZoneEpidemie: function(callback) {
    	$http.get(constants.api + '/zoneEpidemie/getJSON/').success(callback);
      }
    };
    
    return service;
  }]);