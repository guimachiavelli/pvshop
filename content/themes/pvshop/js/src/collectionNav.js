(function($, pv){
	'use strict';

	var $ = require('jquery');

	var collectionNav;

	collectionNav = {
		init: function($el) {
			$el.on('change', collectionNav.onSelectCollection);
		},

		onSelectCollection: function()	{
			var collectionSlug = $(this).find(':selected').val();
			window.location = pv.config.siteURL + '/collection/' + collectionSlug;
		}
	};


	module.exports = collectionNav;

}($, pv));
