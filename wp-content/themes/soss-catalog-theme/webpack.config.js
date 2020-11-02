// webpack v4 with Yarn
// yarn run dev

const path = require('path');
const webpack = require('webpack');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
// update from 23.12.2019
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const CleanWebpackPlugin = require("clean-webpack-plugin");
const CopyWebpackPlugin = require('copy-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;


module.exports = {
  entry: [
      './assets/scripts/bootstrap.js',
      './assets/scripts/main.js',
      './assets/styles/main.scss'
  ],
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: './js/index.min.[hash].js',
   // filename: './js/index.min.js'
   // filename: './index.min.js'
  },
  watch: true,
  devtool: 'source-map',
  target: 'node',
  //externals: [nodeExternals()],
  module: {
    rules: [
      { // perform babel
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ['babel-preset-env']
          }
        }
      },

      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {sourceMap: true},
          },
        ]
      },

      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {sourceMap: true},
          },
          {
            loader: 'sass-loader',
            options: {sourceMap: true},
          }
        ]
      }
// fonts
      //  Note: Refactored for outputPath, and in Plugins, miniCssExtractPlugin and in setup.php to correct enqueue path. GM 9/2/2019
      // {
      //   test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
      //   use: [{
      //     loader: 'file-loader',
      //     options: {
      //       name: '[name].[ext]',
      //       outputPath: './fonts/'
      //     }
      //   }]
      // },

    ]
  },
  plugins: [
    // clean out build directories on each build
    new CleanWebpackPlugin(['./dist/*']),

    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      "window.jQuery": "jquery",
      Popper: ['popper.js', 'default'],
      "Tether": 'tether'
    }),

    // extract css into dedicated file
    new MiniCssExtractPlugin({
      filename: './css/main.min.[hash].css'
     // filename: './css/main.min.css'

    }),
      new CopyWebpackPlugin([
        { from: 'assets/fonts', to: 'fonts/' },
        { from: 'assets/images/' },
        { from: 'assets/scripts/admin-scripts.js', to: 'admin-scripts.js' },
      ]),
      new ImageminPlugin({
       test: /\.(jpe?g|png|gif|svg)$/i
    })

// Removed BrowserSync, wasn't working this time

  ], // End of plugins collection
  optimization: { // This may run when doing the 'yarn build' or production step
    minimizer: [
      // enable the js minification plugin
       new UglifyJsPlugin({
         test: /\.js(\?.*)?$/i,
         uglifyOptions: {
           warnings: false,
           parse: {},
           compress: {},
           mangle: true, // Note `mangle.properties` is `false` by default.
           output: null,
           toplevel: false,
           nameCache: null,
           ie8: false,
           keep_fnames: false,
         },
       }),

        // OptimizeCssAssetsPlugin
      new OptimizeCSSAssetsPlugin({
        assetNameRegExp: /\.optimize\.css$/g,
        cssProcessor: require('cssnano'),
        cssProcessorPluginOptions: {
          preset: ['default', { discardComments: { removeAll: true } }],
        },
        canPrint: true
       }),

    ],
  },
};
