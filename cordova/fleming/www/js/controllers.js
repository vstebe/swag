angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, $ionicModal, $timeout) {
  // Form data for the login modal
  $scope.loginData = {};

  // Create the login modal that we will use later
  $ionicModal.fromTemplateUrl('templates/login.html', {
    scope: $scope
  }).then(function(modal) {
    $scope.modal = modal;
  });

  // Triggered in the login modal to close it
  $scope.closeLogin = function() {
    $scope.modal.hide();
  };

  // Open the login modal
  $scope.login = function() {
    $scope.modal.show();
  };

  // Perform the login action when the user submits the login form
  $scope.doLogin = function() {
    console.log('Doing login', $scope.loginData);

    // Simulate a login delay. Remove this and replace with your login
    // code if using a login system
    $timeout(function() {
      $scope.closeLogin();
    }, 1000);
  };
})

.controller('MapCtrl', ['$scope', '$http', 'Config', function($scope, $http, Config) {

	 $http.get(Config.api + '/zoneEpidemie/getJSON/').success(function(data) {
	      $scope.circles = [];
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
		id++;
	      });
	      
	      console.log(data);
	      console.log($scope.circles);
	   
	});
	 
	 $http.get(Config.api + '/center_controller/getJSON/').success(function(data) {
	      $scope.markers = [];
	      id = 1;
	      data.forEach(function(e) {
	 		$scope.markers.push({
			  latitude: parseInt(e.coordonneX),
			  longitude: parseInt(e.coordonneY),
			  nom:e.nom,
			  type:e.type,
			  id:id
			});
		      id++;
		});
	      console.log(data);
	      console.log($scope.circles);
	   
	});
  
	$scope.map = { center: { latitude: 6.652640, longitude: -9.352199 }, zoom: 8 };
	

		 $http.get('http://stebe.fr/nuit/swag/script-social/ebola.php').success(function(data) {
		  $scope.text = "";
		   data.forEach(function(t) {
		     $scope.text += t.text + " - ";
		  });
	   
	});
	
        
}]).controller('DiagnosisCtrl', function($scope) {
  $scope.symptoms = [
    {
      id:1,
      name:"Mal au bras"   
    },
    {
      id:2,
      name:"Fièvre"
    }
  ];
  
  $scope.diseases = [
    {
      id:1,
      name:"Ebola",
      symptoms:[1,2]
    }
  ];
  
  $scope.warningMessage = false;
  
  $scope.equalArrays = function(arr1, arr2){
    if (arr1.length !== arr2.length) return false;
    for (var i = 0, len = arr1.length; i < len; i++){
        if (arr1[i] !== arr2[i]){
            return false;
        }
    }
    return true; 
}
  
  $scope.doDiagnostic = function() {
    
      symptomsConfirmed = [];
    
      $scope.symptoms.forEach(function(s) {
	  if(s.checked) {
	      symptomsConfirmed.push(s.id);
	  }
      });
      symptomsConfirmed.sort();
      
      $scope.matchingDiseases = [];
      
      $scope.diseases.forEach(function(d) {
	  console.log(symptomsConfirmed);
	  d.symptoms.sort();
	  if( $scope.equalArrays(d.symptoms, symptomsConfirmed))
	    $scope.matchingDiseases.push(d);
      });
      
      $scope.diagnosticOk = $scope.matchingDiseases.length==0;
  }
  
  
});

