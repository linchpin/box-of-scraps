'use strict';

/**
 * This gulp file is utilized to watch and build our assets.
 *
 * In order to run this gulpfile, you must run the following command:
 *
 * `yarn install && gulp`
 *
 * All options are set in the package.json file within the "gulp" object.
 *
 * @since 1.2.0 This file as been update to remove some dependencies and cleanup the codebase.
 */

const {
	task,
	src,
	series,
	parallel,
	watch,
	dest
}                  = require( 'gulp' );                                 // It's gulp, it handles our task running.
const uglify       = require( 'gulp-uglify' );                          // Minify our javascript
const gulpif       = require( 'gulp-if' );                              // Conditional logic for gulp tasks.
const sourcemaps   = require( 'gulp-sourcemaps' )                       // Sourcemaps for debugging our code.
const postcss      = require( 'gulp-postcss' )
const cleancss     = require( 'gulp-clean-css' );                       // PostCSS for autoprefixing and minifying our CSS.
const sass         = require( 'gulp-sass' )( require( 'node-sass' ) );  // Build our Sass files.
const yargs        = require( 'yargs' );                                // Used to grab arguments from the command line.
const fs           = require( 'fs-extra' )                              // Expands the functionality of Node's fs module.
const webpack      = require( 'webpack-stream' );												// It's webpack.
const log          = require( 'fancy-log' );                            // Better output log for gulp tasks
const autoprefixer = require( 'autoprefixer' );                         // Autoprefix our CSS with vendor prefixes if needed.

/**
 * Create some placeholder variables for use in our gulp tasks.
 *
 * @since 0.2.0
 *
 * @type {{}}
 */
let config     = {};                          // Save our config data to a local object.
let PRODUCTION = !!( yargs.argv.production ); // Check for --production flag

/**
 * Utility method to load our configuration file information
 *
 * @since 1.2.0
 *
 * @param done
 */
const loadConfig = ( done ) => {

	fs.readJson( './package.json' )
		.then( packageJson => {
			config                 = packageJson.buildconfig;
			config.webpack.mode    = ( PRODUCTION ? 'production' : 'development' );
			config.webpack.devtool = ! PRODUCTION && 'source-map'
			done();
		} )
		.catch( err => {
			log( err );
			done();
		} );
}

/**
 * Set production mode during the build process
 *
 * @since 0.1.0
 *
 * @param done
 */
const setProductionMode = ( done ) => {
	if ( PRODUCTION ) {
		config.webpack.mode    = 'production';
		config.webpack.devtool = false;
	}

	done();
}


/**
 * Cleanup our javascript and css folder.
 */
const clean = ( done ) => {
	fs.remove( 'js', done );
	fs.remove( 'css', done );
}

/**
 * Watch for changes to static assets, Sass, and JavaScript.
 *
 * @since 0.1.0
 */
const watchChanges = () => {
	watch( config.gulp.javascript.assets ).on(
		'all',
		series(
			javascript
		)
	);

	watch( config.gulp.sass.assets ).on(
		'all',
		series(
			buildSass
		)
	);
}

// In production, the CSS is compressed
const buildSass = () => {

	return src( config.gulp.sass.assets )
		.pipe( sourcemaps.init() )
		.pipe( sass( {
			includePaths: config.gulp.sass.libraries
		} )
		.on( 'error', sass.logError ) )
		.pipe( postcss( [ autoprefixer() ] ) )
		.pipe( gulpif( PRODUCTION, cleancss({ compatibility: config.gulp.sass.compatibility } ) ) )   // Minify CSS in production, don't worry about IE11 and below.
		.pipe( gulpif( ! PRODUCTION, sourcemaps.write( '.' ) ) ) // Write our sourcemaps if not in production.
		.pipe( dest( config.gulp.sass.dest ) );
}

/**
 * Build our javascript
 *
 * @returns {*}
 */
const javascript = () => {
	return src( config.webpack.entry.core, { sourcemaps: PRODUCTION } )
		.pipe( webpack( config.webpack ) )
		.pipe(
			gulpif(
				PRODUCTION,
				uglify().on( 'error', e => {
					log( e );
				} )
			) )
		.pipe( dest( config.gulp.javascript.dest ) );
}

// Build the "dist" folder by running the tasks below
// Sass must be run later so UnCSS can search for used classes in the others assets.
task(
	'build:production',
	series(
		loadConfig,
		clean,
		javascript,
		buildSass
	)
);

// Build the site and watch for file changes.
task(
	'default',
	series(
		loadConfig,
		clean,
		javascript,
		buildSass,
		parallel(
			watchChanges
		)
	)
);
