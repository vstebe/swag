angular.module('fleming')
	.directive('actionBar', ['$timeout', function($timeout){
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'app/templates/actionBar/actionBar.html',
			link: function(scope) {
				scope.initAnim = true;
				scope.secondAnim = true;
				scope.actions = [
					{
						title: 'Diagnostiquer',
						icon: '',
						description: 'Présentez vous des symptômes ? Vous pensez être infecté ? Faites le test !',
						type: 'diagnostic'
					},
					{
						title: "Zones d'épidemie",
						icon: '',
						description: 'Les zones à risque sont affichées ici;',
						type: 'center'
					}
				];
				
				$timeout(function() {
					scope.initAnim = false;
				}, 250);
				
				$timeout(function() {
					scope.secondAnim = false;
				}, 500);
				
				scope.toggleBar = function (current) {
					var bar = current.beBar;
					scope.actions.forEach(function (item) {
						item.beBar = false;
					});
					current.beBar = true;
				}
			}
		}
	}]);