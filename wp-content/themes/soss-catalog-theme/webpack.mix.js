/**
 * @date 1/21/2021
 * @author Greg
 * Build created with Node 12.14.0
 * Laravel Mix v6.0.10
 * Will have problems >= Node 14+, >= Bootstrap 5
 * TODO: The `form-control-focus()` mixin has been deprecated as of v4.4.0. It will be removed entirely in v5.
 */

const mix = require('laravel-mix');
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
//const { CopyPlugin } = require("copy-webpack-plugin");

//require('laravel-mix-postcss-config');
mix
  .disableNotifications()
  .js('assets/scripts/main.js', 'dist/js/main.js')
  .sass('assets/styles/main.scss', 'assets/build/main.css')
  .options({
    processCssUrls: false,
    terser: {},
    purifyCss: false,
    // purifyCss: {},
    postCss: [require('autoprefixer')],
    clearConsole: false,
    cssNano: {
      // discardComments: {removeAll: true},
    }
  })
  // TODO: replace 'nested function call' to imported property
  .postCss('assets/build/main.css', 'dist/css/main.css', [
    require('postcss-custom-properties'),
    require('postcss-sorting')({
      'properties-order': 'alphabetical'
    }),
    require('postcss-url')({
      // Seeking options that work with Mix
    }),
    require('cssnano')
  ])

  .copyDirectory(
    'assets/images', 'dist/images/'
  )
  .copyDirectory(
    'assets/fonts', 'dist/fonts/'
  )
  .copyDirectory(
    'assets/scripts/admin-scripts.js', 'dist/admin-scripts.js'
  )

  .browserSync({proxy: 'http://localhost:10063/'})
  .webpackConfig({
      plugins: [
        new CleanWebpackPlugin({
          // Simulate the removal of files
          // default: false
          dry: true,

          // Write Logs to Console
          // (Always enabled when dry is true)
          // default: false
          verbose: true,

          // Automatically remove all unused webpack assets on rebuild
          // default: true
          cleanStaleWebpackAssets: true,

          // Do not allow removal of current webpack assets
          // default: true
          protectWebpackAssets: true,
          cleanOnceBeforeBuildPatterns: ['dist/*', '!static-files*'],
        }),
      ]
    }
  );
