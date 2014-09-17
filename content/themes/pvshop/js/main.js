(function($){
    'use strict';

    var collectionNav = require('./src/collectionNav'),
        productSlider = require('./src/productSlider');


    $(document).ready(function(){
        collectionNav.init($('#collection-nav'));
        productSlider.init($('.single-product-thumbnails'));
    });

}($));
