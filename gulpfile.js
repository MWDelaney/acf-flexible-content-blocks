var gulp = require('gulp');
var sass = require('gulp-sass');
var runSequence = require('run-sequence');

gulp.task('styles', function() {
    gulp.src('assets/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./assets/css/'));
});

//Watch task
gulp.task('watch',function() {
    gulp.watch('assets/sass/**/*.scss',['styles']);
});

//Build task
gulp.task('build', function(callback) {
  runSequence('styles',
              callback);
});

// ### Gulp
// `gulp` - Run a complete build. To compile for production run `gulp --production`.
gulp.task('default', function() {
  gulp.start('build');
});