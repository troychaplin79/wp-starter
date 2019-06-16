module.exports = {
	plugins: [
		require('autoprefixer')({
			flexbox: false,
			grid: false,
		}),
		require('css-mqpacker')({
			sort: true,
		}),
		require('pixrem')({
			replace: true,
		}),
		require('cssnano')({
			zindex: false,

			preset: [
				'default',
				{
					discardComments: {
						removeAll: true,
					},
				},
			],
		}),
	],
};
