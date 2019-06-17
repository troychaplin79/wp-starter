module.exports = {
	plugins: [
		// TODO: why doesn't this work inside cssnano preset
		require('autoprefixer')({
			flexbox: false,
			grid: false,
		}),
		require('css-mqpacker')({
			sort: true,
		}),
		require('postcss-pxtorem')({
			replace: true,
		}),
		require('cssnano')({
			preset: ['advanced', {
				cssDeclarationSorter: {
					order: 'concentric-css',
				},
				discardComments: {
					removeAll: true,
				},
			}]
			// zindex: false,
		}),
	],
};
