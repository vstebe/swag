angular.module('fleming')
	.factory('modalService', ['$modal', function($modal) {
		var service = {
			openModal: function (opts) {		
				var modal = $modal.open({
					template: '<div class="modal-header"><h4 class="modal-title">'
						+ '<button type="button" class="close" ng-click="cancel()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'
						+ opts.title
						+ '</h4></div>'
						+ '<div class="modal-body">'
						+ opts.content
						+ '</div>'
						+ '<div class="modal-footer">'
						+ opts.footer
						+ '</div>'
				});
			}
		};
		
		return service;
	}]);