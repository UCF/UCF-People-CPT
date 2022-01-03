const gulp = require('gulp');
const readme = require('gulp-readme-to-markdown');

gulp.task('readme', function () {
  return gulp.src('readme.txt')
    .pipe(readme({
      details: false,
      screenshot_ext: []
    }))
    .pipe(gulp.dest('.'));
});

gulp.task('default', gulp.series('readme'));
