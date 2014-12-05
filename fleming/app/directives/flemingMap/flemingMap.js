angular.module('fleming')
	.directive('flemingMap', ['flemingMapHttpService', function(flemingMapHttpService) {
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'app/templates/flemingMap/flemingMap.html',
			controller: ['$scope', function ($scope) {
				flemingMapHttpService.getZoneEpidemie(function(data) {
				      $scope.circles = [];
				      $scope.markers = [];
				      id = 1;
				      data.forEach(function(e) {
					$scope.circles.push({
					      id: id,
					      center: {
						  latitude: parseInt(e.coordonneX),
						  longitude: parseInt(e.coordonneY)
					      },
					      radius: parseInt(e.radius),
					      stroke: {
						  color: '#F00',
						  weight: 2,
						  opacity: 1
					      },
					      fill: {
						  color: '#F00',
						  opacity: 0.5
					      }
					  });
					$scope.markers.push({
						  latitude: parseInt(e.coordonneX),
						  longitude: parseInt(e.coordonneY),
						  title:"ddd"
					});
					id++;
				      });
				      

				   
				});
			  
			  
				$scope.map = { center: { latitude: 6.652640, longitude: -9.352199 }, zoom: 8 };
			}]
		}
	}]);