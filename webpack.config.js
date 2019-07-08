/**
 * WordPress Webpack Config
 */

// Webpack Dependencies
const path = require("path");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const compression = require("compression-webpack-plugin");
const globImporter = require("node-sass-glob-importer");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");

// Build Config
module.exports = {
	entry: {
		scripts: "./src/js/index.js"
	},
	output: {
		filename: "js/[name].js",
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
					MiniCssExtractPlugin.loader,
					{
						loader: "css-loader",
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
							sourceMap: true,
							importer: globImporter()
						}
					}
				]
			},
			{
				test: /\.(png|jpg|gif)$/,
				use: [
					{
						loader: "file-loader",
						options: {
							outputPath: "./dist/images",
							name: "[name].[ext]"
						}
					}
				]
			}
		]
	},
	plugins: [
		new CleanWebpackPlugin(),
		new compression({
			test: /\.(js|css|map)(\?.*)?$/i,
			filename: "[path].gz[query]",
			algorithm: "gzip"
		}),
		new MiniCssExtractPlugin({
			filename: "css/styles.css"
			// filename: "css/[name].css",
		}),
		new BrowserSyncPlugin({
			host: "localhost",
			port: 3000,
			proxy: "https://local.multitenant.ca",
			files: ["*.php", "dist/*"]
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
