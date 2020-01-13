/**
 * WordPress Webpack Config
 */
module.exports = env => {
    return require(`./webpack.${env}.js`);
};
