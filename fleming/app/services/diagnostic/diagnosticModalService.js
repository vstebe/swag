angular.module('fleming')
	.factory('diagnosticModalService', ['modalService', function (modalService) {
		var service = {
			openModal: function () {
				modalService.openModal({
					title: 'Diagnostic',
					content: 'Un modal de test',
					footer: 'La fin'
				});
			}	
		};
		
		return service;
	}]);