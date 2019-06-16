// Global Styles
// -------------------------

// import '../scss/styles.scss';

// Include jQuwery in project
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

console.log('welcome to webpack');
