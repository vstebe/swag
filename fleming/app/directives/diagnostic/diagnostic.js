angular.module('fleming')
	.directive('diagnostic', [function () {
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'app/templates/diagnostic/diagnostic.html',
			link: function (scope) {
				  scope.symptoms = [
				                     {
				                       id:1,
				                       name:"Mal au bras"   
				                     },
				                     {
				                       id:2,
				                       name:"Fièvre"
				                     }
				                   ];
				                   
				                   scope.diseases = [
				                     {
				                       id:1,
				                       name:"Ebola",
				                       symptoms:[1,2]
				                     }
				                   ];
				                   
				                   scope.warningMessage = false;
				                   
				                   scope.equalArrays = function(arr1, arr2){
				                     if (arr1.length !== arr2.length) return false;
				                     for (var i = 0, len = arr1.length; i < len; i++){
				                         if (arr1[i] !== arr2[i]){
				                             return false;
				                         }
				                     }
				                     return true; 
				                 }
				                   
				                   scope.doDiagnostic = function() {
				                     
				                       symptomsConfirmed = [];
				                     
				                       scope.symptoms.forEach(function(s) {
				                 	  if(s.checked) {
				                 	      symptomsConfirmed.push(s.id);
				                 	  }
				                       });
				                       symptomsConfirmed.sort();
				                       
				                       scope.matchingDiseases = [];
				                       
				                       scope.diseases.forEach(function(d) {
				                 	  console.log(symptomsConfirmed);
				                 	  d.symptoms.sort();
				                 	  if( scope.equalArrays(d.symptoms, symptomsConfirmed))
				                 	    scope.matchingDiseases.push(d);
				                       });
				                       
				                       scope.diagnosticOk = scope.matchingDiseases.length==0;
				                   }
				                   
				                   				
			}
		};
	}]);