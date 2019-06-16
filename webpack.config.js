/**
 * WordPress Webpack Config
 */

// Webpack Dependencies
const path = require('path');

// Build Config
module.exports = {
	entry: {
		'test': './src/js/index.js'
	},
	'output': {
		filename: '[name].js',
		path: path.join(__dirname, 'dist/')
	}
};
