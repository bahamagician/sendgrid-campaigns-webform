var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var $    = require('gulp-load-plugins')();

var sassPaths = [
  './bower_components/normalize.scss/sass',
  './bower_components/foundation-sites/scss',
  './bower_components/motion-ui/src'
];

gulp.task('sass', function() {
  return gulp.src('./public/scss/app.scss')
    .pipe($.sass({
      includePaths: sassPaths,
      outputStyle: 'compressed' // if css compressed **file size**
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9']
    }))
    .pipe(gulp.dest('./public/css'));
});

gulp.task('javascript', function() {
    return gulp.src([
        './bower_components/jquery/dist/jquery.js',
        './bower_components/what-input/dist/what-input.js',
        './bower_components/foundation-sites/dist/js/foundation.js',
        './public/js/app.js'
    ])
    .pipe($.concat('bundle.js'))
    .pipe(rename('bundle.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./public/js/'));
});

gulp.task('default', ['sass'], function() {
  gulp.watch(['./public/scss/**/*.scss'], ['sass']);
});
