angular.module('fleming')
  .factory('constants', [function() {
    var service = {
      api: 'http://karrde-ovh.tk/nuit/site/index.php'
    };
    
    return service;
  }]);