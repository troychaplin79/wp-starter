// Import main stylesheet
// -------------------------

import '../scss/styles.scss';

// ES6 support via polyfills
// -------------------------

import "@babel/polyfill";

// Include jQuery in project
// -------------------------

// window.$ = window.jQuery = require('jquery');

// Check for jQuery
window.onload = function() {
	if (window.jQuery) {
		console.log('jQuery is ready to go');
	} else {
		console.log('jQuery is not available');
	}
};

// Testing that things are working
// -------------------------

console.log('welcome to webpack');
