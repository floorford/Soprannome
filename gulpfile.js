let gulp = require('gulp');
let cleanCSS = require('gulp-clean-css');
let rename = require('gulp-rename');
let sass = require('gulp-sass');
let watch = require('gulp-watch');
let gulpSequence = require('gulp-sequence');

gulp.task('sass', function () {
    var stream = gulp.src('./scss/style.scss')
        .pipe(sass())
        .pipe(gulp.dest('.'))
        .pipe(rename('style.css'));
    return stream;
});

gulp.task('watch', function () {
	gulp.watch('./scss/*.scss', 'sass');
});
