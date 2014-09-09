(function($){
	'use strict';

	var collectionNav = require('./src/collectionNav');


	$(document).ready(function(){
		collectionNav.init($('#collection-nav'));
	});

}($));
