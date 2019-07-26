/**
 * WordPress Webpack Config
 */
const merge = require("webpack-merge");
const baseConfig = require("./webpack.config.base.js");
const SshWebpackPlugin = require("ssh-webpack-plugin");

// Build Config
module.exports = merge(baseConfig, {
	plugins: [
		new SshWebpackPlugin({
			port: process.env.SSH_PORT,
			username: process.env.SSH_USER,
			// password: process.env.SSH_PASS,
			privateKey: require("fs").readFileSync(process.env.SSH_KEY),
			from: "./release",
			host: process.env.STAGE_HOST,
			before: process.env.STAGE_CLEAN,
			to: process.env.STAGE_PATH
		})
	]
});
