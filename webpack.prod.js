/**
 * WordPress Webpack Config
 */
const merge = require("webpack-merge");
const baseConfig = require("./webpack.build.js");
const copyWebpackPlugin = require("copy-webpack-plugin");
const SshWebpackPlugin = require("ssh-webpack-plugin");

// Build Config
module.exports = merge(baseConfig, {
	plugins: [
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
		new SshWebpackPlugin({
			port: process.env.SSH_PORT,
			username: process.env.SSH_USER,
			// password: process.env.SSH_PASS,
			privateKey: require("fs").readFileSync(process.env.SSH_KEY),
			from: "./release",
			host: process.env.PROD_HOST,
			before: process.env.PROD_CLEAN,
			to: process.env.PROD_PATH
		})
	]
});
