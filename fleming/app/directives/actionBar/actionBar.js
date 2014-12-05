angular.module('fleming')
	.directive('actionBar', ['$timeout', function($timeout){
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'app/templates/actionBar/actionBar.html',
			link: function(scope) {
				scope.initAnim = true;
				scope.actions = [
					{
						title: 'Diagnostiquer',
						icon: '',
						description: 'Présentez vous des symptômes ? Vous pensez être infecté ? Faites le test !',
						cssClass: 'diagnostic'
					},
					{
						title: 'Centres',
						icon: '',
						description: 'Présentez vous des symptômes ? Vous pensez être infecté ? Faites le test !',
						cssClass: 'center'
					}
				];
				
				$timeout(function() {
					scope.initAnim = false;
				}, 250);
			}
		}
	}]);