/**
 * WordPress Webpack Config
 */
const path = require("path");
const { resolve } = require("path");
require("dotenv").config();
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const CompressionPlugin = require("compression-webpack-plugin");
const copyWebpackPlugin = require("copy-webpack-plugin");
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");

module.exports = {
	entry: [
		"./src/js/index.js",
		"./src/scss/styles.scss",
		"./src/admin/scss/admin.scss",
		"./src/admin/scss/editor.scss"
	],
	output: {
		filename: "js/scripts.js",
		path: path.resolve(__dirname, "dist")
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: "babel-loader",
					options: {
						presets: ["@babel/preset-env"]
					}
				}
			},
			{
				test: /\.scss$/,
				use: [
					{
						loader: "file-loader",
						options: {
							name: "css/[name].css"
						}
					},
					{
						loader: "extract-loader"
					},
					{
						loader: "css-loader?-url",
						options: {
							sourceMap: true
						}
					},
					{
						loader: "postcss-loader",
						options: {
							sourceMap: true
						}
					},
					{
						loader: "sass-loader",
						options: {
							sourceMap: true
						}
					}
				]
			}
		]
	},
	plugins: [
		new CompressionPlugin({
			test: /\.(js|css|map)(\?.*)?$/i,
			filename: "[path].gz[query]",
			algorithm: "gzip"
		}),
		new copyWebpackPlugin([
			{ from: "./src/favicons", to: "../dist/favicons" },
			{ from: "./src/svg/logos", to: "../dist/svg/logos" },
			{ from: "./src/svg/icons", to: "../dist/svg/icons" }
		]),
		new BrowserSyncPlugin({
			host: "localhost",
			port: 3000,
			proxy: process.env.LOCAL_URL,
			files: [
				"*.php",
				"acf-json/*",
				"blocks/**/*",
				"components/**/*",
				"dist/**/*",
				"functions/**/*",
				"layouts/**/*",
				"templates/**/*"
			],
			watchOptions: {
				ignoreInitial: true,
				ignored: "dist/svg/icons/*.svg"
			},
			notify: false
		})
	],
	optimization: {
		minimizer: [
			new UglifyJsPlugin({
				cache: true,
				parallel: true,
				sourceMap: true
			})
		]
	}
};
