(function() {
	'use strict';

	var gulp = require('gulp'),
		source = require('vinyl-source-stream'),
		plumber = require('gulp-plumber'),
		gutil = require('gutil'),
		compass = require('gulp-compass'),
		browserify = require('browserify');

	var themePath = 'content/themes/pvshop';

	gulp.task('default', function() {
		console.log('default task');
	});

	gulp.task('compass', function() {
		gulp.src(themePath + '/sass/*.scss')
			.pipe(compass({
				css: themePath + '/css',
				sass: themePath + '/sass',
				style: 'nested',
				comments: false
			}))
			.on('error', gutil.log)
			.pipe(gulp.dest(themePath + '/css'));
	});

	gulp.task('browserify', function() {
		var bundleSource = browserify('./' + themePath + '/js/main.js')
			.require('jquery')
			.bundle();

		bundleSource
			.on('error', gutil.log)
			.pipe(plumber())
			.pipe(source('bundle.js'))
			.pipe(gulp.dest(themePath + '/js'));
	});

	gulp.task('develop', function() {
		gulp.watch([
			themePath + '/js/*.js',
			themePath + '/js/*/*.js',
			themePath + '/sass/*.scss',
			themePath + '/sass/*/*.scss'
		], ['browserify', 'compass']);
	});

}());

