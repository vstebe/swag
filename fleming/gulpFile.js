var gulp = require('gulp'),
	del = require('del'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify');

var jsSrc = ['app/app.js', 'app/directives/**/*.js', 'app/services/**/*.js', 'app/route.js'];

gulp.task('clean', function(cb) {
	  del(['js/app.min.js'], cb);
});

gulp.task('default', ['clean','watch'], function () {
	gulp.src(jsSrc)
		.pipe(uglify())
		.pipe(concat('app.min.js'))
		.pipe(gulp.dest('js/'));
});

gulp.task('watch', function() {
	  gulp.watch(jsSrc, ['default']);
});