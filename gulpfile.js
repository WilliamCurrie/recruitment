var gulp = require('gulp');
var browserify = require('gulp-browserify');
var concat = require('gulp-concat');
var less = require('gulp-sass');
var minifyCSS = require('gulp-minify-css');
var embedlr = require('gulp-embedlr');
var rename = require("gulp-rename");
var uglify = require('gulp-uglify');
var image = require('gulp-image');

gulp.task('image', function () {
  gulp.src(['./resources/images/**/*'])
    .pipe(image())
    .pipe(gulp.dest('./public/img'));
});

gulp.task('scripts', function() {
    gulp.src(['./resources/scripts/wranx.js'])
        .pipe(browserify())
        .pipe(concat('wranx.js'))
        .pipe(gulp.dest('./public/js'))
        .pipe(uglify())
        .pipe(rename('wranx.min.js'))
        .pipe(gulp.dest('./public/js'))
})

gulp.task('styles', function() {
    gulp.src(['./resources/styles/wranx.scss'])
        .pipe(less())
        .pipe(rename("wranx.css"))
        .pipe(gulp.dest('./public/css'))
        .pipe(minifyCSS())
        .pipe(rename("wranx.min.css"))
        .pipe(gulp.dest('./public/css'))
})


gulp.task('default', function() {
    gulp.run('scripts');
    gulp.run('styles');
})
