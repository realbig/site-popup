var gulp = require('gulp');
var $ = require('gulp-load-plugins')();

var jsPaths = [
    './assets/src/js/*.js',
];

gulp.task('sass', function () {
    return gulp.src('./assets/src/scss/roadblockpopup-front.min.scss')
        .pipe($.sass()
            .on('error', $.sass.logError))
        .pipe($.sourcemaps.init())
        .pipe($.autoprefixer({
            browsers: ['last 2 versions', 'ie >= 9']
        }))
        .pipe($.sass({outputStyle: 'compressed'}))
        .pipe($.sourcemaps.write())
        .pipe(gulp.dest('./assets/dist/css/'))
        .pipe($.notify({ message: 'Sass task complete' }));
});

gulp.task('scripts', function() {
    return gulp.src(jsPaths)
        .pipe($.concat('roadblockpopup-front.min.js'))
        .pipe(gulp.dest('./assets/dist/js/'))
        .pipe($.uglify())
        .pipe($.sourcemaps.write())
        .pipe(gulp.dest('./assets/dist/js/'))
        .pipe($.notify({ message: 'Scripts task complete' }));
});

gulp.task('default', ['sass', 'scripts'], function () {
    gulp.watch(['./assets/src/scss/*.scss'], ['sass']);
    gulp.watch(['./assets/src/js/*.js'], ['scripts']);
});
