# Roots.io Sage Starter Theme 

Starter theme, built with [Sage](https://roots.io/sage/) 8.5.1 
## Extras

- Holder.js for prototyping. Generate placeholders with `<img src="holder.js/300x200">`
- Slick Carousel
- Customizer Options
    - Option 1
    - Option 2
- Social Media Nav Class  
Call the class with `social_nav($classes)` where $classes is a string or array of css class names
to pass to the nav.  
Example usage:  
  ```
  <?php $social_args = Branding\social_nav('stack circle brand'); ?>
  <nav class="social-nav" role="navigation">
    <?php wp_nav_menu( $social_args ); ?>
  </nav>
  ```  
  Classes are applied to the UL element, so Bootstrap list layout classes can apply here. Additional classes:  
  - `brand` Use social media brand colors
  - `stack square` Stack icon on a square background
  - `stack circle` Stack icon on a circular background
  

[![Build Status](https://travis-ci.org/roots/sage.svg)](https://travis-ci.org/roots/sage)
[![devDependency Status](https://david-dm.org/roots/sage/dev-status.svg)](https://david-dm.org/roots/sage#info=devDependencies)

## Sage

Sage is a WordPress starter theme based on HTML5 Boilerplate, gulp, Bower, and Bootstrap Sass, that will help you make better themes.

* Source: [https://github.com/roots/sage](https://github.com/roots/sage)
* Homepage: [https://roots.io/sage/](https://roots.io/sage/)
* Documentation: [https://roots.io/sage/docs/](https://roots.io/sage/docs/)
* Twitter: [@rootswp](https://twitter.com/rootswp)
* Newsletter: [Subscribe](http://roots.io/subscribe/)
* Forum: [https://discourse.roots.io/](https://discourse.roots.io/)

### Requirements

| Prerequisite    | How to check | How to install
| --------------- | ------------ | ------------- |
| PHP >= 7.x.x    | `php -v`     | [php.net](http://php.net/manual/en/install.php) |
| Node.js >= 10.x.x  | `node -v`    | [nodejs.org](http://nodejs.org/) |
| webpack >= 4.43  | `yarn list webpack`    | `yarn add webpack webpack-cli -D` |
| PostCSS >= 7.0.14 | `yarn list postcss`   | `yarn add postcss-loader autoprefixer --dev` |


### Features

* [gulp](http://gulpjs.com/) build script that compiles both Sass and Less, checks for JavaScript errors, optimizes images, and concatenates and minifies files
* [BrowserSync](http://www.browsersync.io/) for keeping multiple browsers and devices synchronized while testing, along with injecting updated CSS and JS into your browser while you're developing
* [Bower](http://bower.io/) for front-end package management
* [asset-builder](https://github.com/austinpray/asset-builder) for the JSON file based asset pipeline
* [Bootstrap](http://getbootstrap.com/)
* [Theme wrapper](https://roots.io/sage/docs/theme-wrapper/)
* ARIA roles and microformats
* Posts use the [hNews](http://microformats.org/wiki/hnews) microformat
* [Multilingual ready](https://roots.io/wpml/) and over 30 available [community translations](https://github.com/roots/sage-translations)

Install the [Soil](https://github.com/roots/soil) plugin to enable additional features:

* Cleaner output of `wp_head` and enqueued assets
* Cleaner HTML output of navigation menus
* Root relative URLs
* Nice search (`/search/query/`)
* Google CDN jQuery snippet from [HTML5 Boilerplate](http://html5boilerplate.com/)
* Google Analytics snippet from [HTML5 Boilerplate](http://html5boilerplate.com/)

See a complete working example in the [roots-example-project.com repo](https://github.com/roots/roots-example-project.com).


### Theme setup

Edit `lib/setup.php` to enable or disable theme features, setup navigation menus, post thumbnail sizes, post formats, and sidebars.

### Theme development

Sage uses [gulp](http://gulpjs.com/) as its build system and [Bower](http://bower.io/) to manage front-end packages.

#### Install Webpack

Building the theme requires [node.js](http://nodejs.org/download/). We recommend you update to the latest version of npm: `npm install -g npm@latest`.

From the command line:

1. Navigate to the theme directory, 
2. Then install [webpack](https://webpack.js.org/) and dependencies with `yarn install`


You now have all the necessary dependencies to run the build process.

#### Available webpack commands

 *    "dev": "webpack --mode development --watch",
 *   "build": "webpack --mode production"



### Documentation

Sage documentation is available at [https://roots.io/sage/docs/](https://roots.io/sage/docs/).

### Contributing

Contributions are welcome from everyone. We have [contributing guidelines](https://github.com/roots/guidelines/blob/master/CONTRIBUTING.md) to help you get started.

### Community

Keep track of development and community news.

* Participate on the [Roots Discourse](https://discourse.roots.io/)
* Follow [@rootswp on Twitter](https://twitter.com/rootswp)
* Read and subscribe to the [Roots Blog](https://roots.io/blog/)
* Subscribe to the [Roots Newsletter](https://roots.io/subscribe/)
* Listen to the [Roots Radio podcast](https://roots.io/podcast/)
