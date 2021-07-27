const path = require('path');
const { VueLoaderPlugin } = require('vue-loader');

module.exports = {
	mode: 'development', // [ production - development - none ]

	// Specifying the entry point (by default ./src/index.js)
	// entry: './src/index.js',
	// entry: path.resolve(__dirname, 'src') + "/index.js",

	// Specifying the output file path (by default ./dist/main.js)
	output: {
		path: path.resolve(__dirname, 'public/dist'),
		filename: 'main.js'
	},

	module: {
		rules: [
			// ... other rules
			{
				test: /\.vue$/,
				loader: 'vue-loader'
			},
			// this will apply to both plain `.js` files
      		// AND `<script>` blocks in `.vue` files
			{
				test: /\.js$/,
				loader: 'babel-loader'
			},
			// this will apply to both plain `.css` files
			// AND `<style>` blocks in `.vue` files
			{
				test: /\.css$/i,
				use: ["style-loader", "css-loader"]
			},
			{
				test: /\.html$/i,
				loader: 'html-loader'
			}
		]
	},
	
	plugins: [
		// make sure to include the plugin!
		new VueLoaderPlugin()
	],

	// ...
	resolve: {
		alias: {
		  'vue$': 'vue/dist/vue.esm.js',
		  '@': path.resolve(__dirname)
		},
		extensions: [".ts", ".tsx", ".js", ".vue", ".json"],
		modules: ['src', 'node_modules']
	}
};