// Load plugins
var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    cssnano = require('gulp-cssnano'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    livereload = require('gulp-livereload'),
    bower = require('gulp-bower'),
    less = require('gulp-less'),
    jade = require('gulp-jade'),
    del = require('del');

// System var path
var bowerDir  = 'assets/vendor',
    lessDir   = 'assets/less',
    jadeDir   = 'assets/jade',
    publicCSS = 'assets/css',
    publicJS  = 'assets/js',
    publicIMG = 'assets/images';


/*
 |--------------------------------------------------------------------------
 | Inject doc: https://www.npmjs.com/package/gulp-inject/
 |--------------------------------------------------------------------------
 */



/*
 |--------------------------------------------------------------------------
 | Bower task
 |--------------------------------------------------------------------------
 */
gulp.task('bower', function() {
    return bower({directory:bowerDir, cmd:'update'})
});


/*
 |--------------------------------------------------------------------------
 | Jade task
 |--------------------------------------------------------------------------
 */
gulp.task('jade', function() {
    return gulp.src(jadeDir+'/**/*.jade')
        .pipe(jade({
            client: false,
            doctype: 'htm',
            pretty:true
        }))
        .pipe(rename({ extname: ".htm" }))
        .pipe(gulp.dest(''))
        .pipe(notify({ message: 'Jade compiled' }));
});


/*
 |--------------------------------------------------------------------------
 | Less task
 |--------------------------------------------------------------------------
 */
gulp.task('less', function() {
    return gulp.src(lessDir+'/pages/*.less')
        .pipe(less())
        .pipe(autoprefixer('last 2 version'))
        .pipe(gulp.dest(publicCSS))
        .pipe(rename({ suffix: '.min' }))
        .pipe(cssnano())
        .pipe(gulp.dest(publicCSS))
        .pipe(notify({ message: 'Less compiled' }));
});


/*
 |--------------------------------------------------------------------------
 | Script task
 |--------------------------------------------------------------------------
 */
gulp.task('scripts', function() {
    return gulp.src(publicJS+'/dev/**/*.js')
        .pipe(gulp.dest(publicJS+'/prod/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest(publicJS+'/prod/'))
        .pipe(notify({ message: 'Scripts task complete' }));
});


/*
 |--------------------------------------------------------------------------
 | Images task
 |--------------------------------------------------------------------------
 */
gulp.task('images', function() {
    return gulp.src(publicIMG+'/dev/**/*')
        .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
        .pipe(rename({ suffix: '_optimized' }))
        .pipe(gulp.dest(publicIMG+'/prod/**/*'))
        .pipe(notify({ message: 'Images task complete' }));
});


/*
 |--------------------------------------------------------------------------
 | Clean task
 |--------------------------------------------------------------------------
 */
gulp.task('clean', function() {
    return del([publicCSS, publicJS+'/prod']);
});


/*
 |--------------------------------------------------------------------------
 | Default task
 |--------------------------------------------------------------------------
 */
gulp.task('default', ['clean'], function() {
    gulp.start('less', 'scripts', 'images', 'jade');
});


/*
 |--------------------------------------------------------------------------
 | Watch task
 |--------------------------------------------------------------------------
 */
gulp.task('watch', function() {

    // Watch .scss files
    gulp.watch(jadeDir+'/**/*.jade', ['jade']);

    // Watch .scss files
    gulp.watch(lessDir+'/**/*.less', ['less']);

    // Watch .js files
    gulp.watch(publicJS+'/dev', ['scripts']);

    // Watch image files
    gulp.watch(publicIMG+'/**/*', ['images']);

    // Create LiveReload server
    livereload.listen();

    // Watch any files in dist/, reload on change
    gulp.watch([publicCSS,publicJS+'/prod/*',publicIMG+'/prod/*', jadeDir+'**/*.jade']).on('change', livereload.changed);

});