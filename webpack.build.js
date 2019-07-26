/**
 * WordPress Webpack Config
 */
require("dotenv").config();
const path = require("path");
const { resolve } = require("path");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const CompressionPlugin = require("compression-webpack-plugin");
const copyWebpackPlugin = require("copy-webpack-plugin");
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
		new CleanWebpackPlugin({
			cleanOnceBeforeBuildPatterns: [resolve("dist/**/*")],
			verbose: true
		}),
		new CompressionPlugin({
			test: /\.(js|css|map)(\?.*)?$/i,
			filename: "[path].gz[query]",
			algorithm: "gzip"
		}),
		new MiniCssExtractPlugin({
			filename: "css/styles.css"
		}),
		new copyWebpackPlugin([
			{ from: "./*.php", to: "../release" },
			{ from: "./acf-json", to: "../release/acf-json" },
			{ from: "./blocks", to: "../release/blocks" },
			{ from: "./components", to: "../release/components" },
			{ from: "./dist", to: "../release/dist" },
			{ from: "./functions", to: "../release/functions" },
			{ from: "./templates", to: "../release/templates" },
			{ from: "./style.css", to: "../release" }
		]),
		new BrowserSyncPlugin({
			host: "localhost",
			port: 3000,
			proxy: process.env.LOCAL_URL,
			files: [
				"*.php",
				"acf-json/**/*",
				"blocks/**/*",
				"components/**/*",
				"dist/**/*",
				"functions/**/*",
				"templates/**/*"
			]
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
