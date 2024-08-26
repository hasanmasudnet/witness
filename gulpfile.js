const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const del = require('del');

// Define the paths
const cssPath = 'witness/assets/css';
const jsPath = 'witness/assets/js';
const scssPath = 'witness/assets/css/**/*.scss';

// Clean task to clear old CSS and JS
gulp.task('clean', function() {
    return del([cssPath + '/style.css'], { force: true });
});

// Task to compile SCSS files to CSS
gulp.task('css', function() {
    return gulp.src(scssPath)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(cssPath));  // Output to witness/assets/css/
});

// Task to process and minify JavaScript files
gulp.task('js', function() {
    return gulp.src(jsPath + '/*.js')
        .pipe(sourcemaps.init())
        .pipe(concat('witness.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(jsPath));
});

// Watch task to monitor files and run the corresponding tasks on change
gulp.task('watch', function() {
    gulp.watch(scssPath, gulp.series('css'));
    gulp.watch(jsPath + '/*.js', gulp.series('js'));
});

// Deploy task to run all tasks sequentially
gulp.task('deploy', gulp.series('clean', 'css', 'js'));

// Default task
gulp.task('default', gulp.series('deploy', 'watch'));
