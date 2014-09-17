(function($, pv){
    'use strict';

    var $ = require('jquery'),
        slider = require('slider');

    var productSlider = {
        init: function($el){
            $el.flexslider(productSlider.config);
        },

        config: {
            selector: 'li',
            controlNav: false,
            slideshow: false
        }
    };

    module.exports = productSlider;

}($, pv));
