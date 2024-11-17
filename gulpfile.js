const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const rename = require('gulp-rename');
const cleanCSS = require('gulp-clean-css');  // Для мініфікації CSS
const uglify = require('gulp-uglify');  // Для мініфікації JS

// Шляхи до файлів
const paths = {
    scss: {
        src: './src/scss/**/*.scss', // Вхідні Sass файли
        dest: './public/css/' // Папка для готових CSS файлів
    },
    js: {
        src: './src/js/**/*.js', // Вхідні JS файли
        dest: './public/js/' // Папка для готових JS файлів
    }
};

// Завдання для компіляції Sass
function compileSass(done) {
    gulp
        .src(paths.scss.src) // Вхідні файли
        .pipe(sass().on('error', sass.logError)) // Компіляція
        .pipe(gulp.dest(paths.scss.dest)) // Вивід не мініфікованого CSS
        .pipe(cleanCSS()) // Мініфікація CSS
        .pipe(rename({ suffix: '.min' })) // Додавання суфікса .min
        .pipe(gulp.dest(paths.scss.dest)); // Вивід мініфікованого CSS
    done(); // Завершуємо завдання
}

// Завдання для мініфікації JS
function minifyJS(done) {
    gulp
        .src(paths.js.src) // Вхідні JS файли
        .pipe(uglify()) // Мініфікація JS
        .pipe(rename({ suffix: '.min' })) // Додавання суфікса .min
        .pipe(gulp.dest(paths.js.dest)); // Вивід мініфікованого JS
    done(); // Завершуємо завдання
}

// Завдання для зборки проекту
function build(done) {
    gulp.series(compileSass, minifyJS)(done); // Викликаємо серію та передаємо done
}

// Спостереження за змінами в файлах
function watchFiles() {
    gulp.watch(paths.scss.src, compileSass);
    gulp.watch(paths.js.src, minifyJS);
}

// Експортуємо завдання
exports.default = gulp.series(build, watchFiles);
exports.build = build;
exports.compileSass = compileSass;
exports.minifyJS = minifyJS;
