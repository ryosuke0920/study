const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const path = require('path');
const webpack = require('webpack');

module.exports = {
	mode: 'development',
	entry: {
		index: './src/js/index.js',
		swiper: './src/js/swiper.js',
		myjquery: './src/js/myjquery.js',
	},
	devtool: 'inline-source-map',
	plugins: [
		new HtmlWebpackPlugin({
			template: 'src/index.html',
			chunks: ['index'],
		}),
		new HtmlWebpackPlugin({
			template: 'src/swiper.html',
			filename: 'swiper.html',
			chunks: ['swiper'],
		}),
		new HtmlWebpackPlugin({
			template: 'src/jquery.html',
			filename: 'myjquery.html',
			chunks: ['myjquery'],
		}),
		new HtmlWebpackPlugin({
			template: 'src/html.html',
			filename: 'html.html',
		}),
		new webpack.ProvidePlugin({
			'$': 'jquery',
			'jQuery': 'jquery',
		}),
		new CopyWebpackPlugin({
			patterns: [
				{from: "src/img", to: "img"},
			]
		})
	],
	output: {
		filename: '[name].bundle.js',
		path: path.resolve(__dirname, 'dist'),
		clean: true, //To clean output folder.
	},
	module: {
		rules: [
			{
				test: /\.css$/i,
				use: ['style-loader', 'css-loader'],
			},
			{
				test: /\.scss$/i,
				use: [
					'style-loader',
					'css-loader',
					'sass-loader'
				],
			},
			{
				test: /\.(png|svg|jpg|jpeg|gif)$/i,
				type: 'asset/resource',
			}
		],
	},
	devServer: {
		host: '0.0.0.0',
		// static: './dist',
		liveReload: false,
	},
	// optimization: {
	// 	runtimeChunk: 'single',
	// },
};
