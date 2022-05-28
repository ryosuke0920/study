const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
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
		new webpack.ProvidePlugin({
			'$': 'jquery',
			'jQuery': 'jquery',
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
			}
		],
	},
	devServer: {
		host: '0.0.0.0',
		static: './dist',
	},
	// optimization: {
	// 	runtimeChunk: 'single',
	// },
};
