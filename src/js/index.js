// Include jQuwery in project
// -------------------------

// window.$ = window.jQuery = require('jquery');

// Check for jQuery
// window.onload = function() {
// 	if (window.jQuery) {
// 		// jQuery is loaded
// 		alert('jQuery is ready to go');
// 	} else {
// 		// jQuery is not loaded
// 		alert('jQuery is not available');
// 	}
// };

import '@babel/polyfill';

import LoadMore from './modules/LoadMore';
LoadMore('.u-loadmore');

import './modules/Polyfill-forEach';
