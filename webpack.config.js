/**
 * WordPress Webpack Config
 */
const path = require("path");
const {resolve} = require("path");
require("dotenv").config();
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const CompressionPlugin = require("compression-webpack-plugin");
const copyWebpackPlugin = require("copy-webpack-plugin");
const FileManagerPlugin = require("filemanager-webpack-plugin");

module.exports = {
    entry: {
        scripts: "./src/js/index.js",
        localize: "./src/js/localize.js",
    },
    output: {
        filename: "js/[name].js",
        path: path.resolve(__dirname, "dist"),
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: ["@babel/preset-env"],
                    },
                },
            },
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                            name: "css/[name].css",
                        },
                    },
                    {
                        loader: "extract-loader",
                    },
                    {
                        loader: "css-loader?-url",
                        options: {
                            sourceMap: true,
                        },
                    },
                    {
                        loader: "postcss-loader",
                        options: {
                            sourceMap: true,
                        },
                    },
                    {
                        loader: "sass-loader",
                        options: {
                            sourceMap: true,
                        },
                    },
                ],
            },
            {
                test: /\.svg(\?.*)?$/, // match img.svg and img.svg?param=value
                use: [
                    "url-loader", // or file-loader or svg-url-loader
                    "svg-transform-loader",
                ],
            },
        ],
    },
    plugins: [
        new CompressionPlugin({
            test: /\.(js|css|map)(\?.*)?$/i,
            filename: "[path].gz[query]",
            algorithm: "gzip",
        }),
        new copyWebpackPlugin({
            patterns: [
                {from: "./src/favicons", to: "../dist/favicons"},
                {from: "./src/svg/logos", to: "../dist/svg/logos"},
                {from: "./src/svg/icons", to: "../dist/svg/icons"},
            ],
        }),
        new FileManagerPlugin({
            onStart: {
                delete: ["./release"],
            },
            onEnd: {
                copy: [
                    {
                        source: "./acf-json",
                        destination: "./release/acf-json",
                    },
                    {
                        source: "./asides",
                        destination: "./release/asides",
                    },
                    {
                        source: "./blocks",
                        destination: "./release/blocks",
                    },
                    {
                        source: "./components",
                        destination: "./release/components",
                    },
                    {
                        source: "./dist",
                        destination: "./release/dist",
                    },
                    {
                        source: "./functions",
                        destination: "./release/functions",
                    },
                    {
                        source: "./layouts",
                        destination: "./release/layouts",
                    },
                    {
                        source: "./templates",
                        destination: "./release/templates",
                    },
                    {
                        source: "./*.php",
                        destination: "./release",
                    },
                    {
                        source: "./screenshot.png",
                        destination: "./release",
                    },
                    {
                        source: "./style.css",
                        destination: "./release/style.css",
                    },
                ],
            },
        }),
        new BrowserSyncPlugin({
            host: "localhost",
            port: 3000,
            proxy: process.env.LOCAL_URL,
            files: [
                "*.php",
                "_examples/*",
                "acf-json/*",
                "asides/**/*",
                "blocks/**/*",
                "components/**/*",
                "dist/**/*",
                "functions/**/*",
                "layouts/**/*",
                "templates/**/*",
            ],
            watchOptions: {
                ignoreInitial: true,
                ignored: "dist/svg/icons/*.svg",
            },
            notify: false,
        }),
    ],
};
