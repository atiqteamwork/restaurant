var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var pump = require('pump');




gulp.task('sass', function () {
    return gulp.src('./assets/sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./assets/css'));
});

gulp.task('sass:watch', function () {
    gulp.watch('./assets/sass/*.scss', ['sass']);
});






gulp.task('compress', function (cb) {
    pump([
            gulp.src('./assets/js/app.js'),
            uglify(),
            gulp.dest('./assets/dist/')
        ],
        cb
    );
});



