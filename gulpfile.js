var gulp = require('gulp');
var sass = require('gulp-sass');
var mainBowerFiles = require('main-bower-files');
var uglify       = require('gulp-uglify');
var concat       = require('gulp-concat');
var runSequence = require('run-sequence');

gulp.task('styles', function() {
    gulp.src('assets/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./assets/css/'));
});

// Bower dependencies
gulp.task("ace", function(){
	return gulp.src(mainBowerFiles())
			.pipe(gulp.dest("./assets/js/ace/"))
});

//Watch task
gulp.task('watch',function() {
    gulp.watch('assets/sass/**/*.scss',['styles']);
});

//Build task
gulp.task('build', function(callback) {
  runSequence('styles',
							'ace',
              callback);
});

// ### Gulp
// `gulp` - Run a complete build. To compile for production run `gulp --production`.
gulp.task('default', function() {
  gulp.start('build');
});
