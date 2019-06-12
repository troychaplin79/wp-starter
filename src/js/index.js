// Include jQuwery in project
// -------------------------

window.$ = window.jQuery = require('jquery');

// Check for jQuery
window.onload = function() {
	if (window.jQuery) {
		console.log('jQuery is ready to go');
	} else {
		console.log('jQuery is not available');
	}
};

// import '@babel/polyfill';

// import SomeFunction from './modules/jsFunction';
// SomeFunction('.u-function');

// import './modules/Polyfill-forEach';
