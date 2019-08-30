// Для работы с пакетами требуется:
// 1. Установить пакет
// 2. Подключить пакет к файлу gulpfile.js
// 3. Используем пакет в нашей программе

let gulp = require('gulp');
let importCss = require('gulp-import-css');
let postcss = require('gulp-postcss');
let autoprefixer = require('gulp-autoprefixer');
let cleanCSS = require('gulp-clean-css');
let watch = require('gulp-watch');

// task - задание для GULP 

function generateStyles () {
    // console.log('Привет, я GULP');
    // 1. Откуда мы берем файлы
    return gulp .src('styles/product.css')
                .pipe(importCss())
                .pipe(autoprefixer({ browsers: ['last 10 versions'] }))
                .pipe(cleanCSS({
                    level: 0
                  }))
                .pipe( gulp.dest('styles/dist') );

    // 2. Что мы делаем с этим файлами
    // 3. Куда мы помещаем результат
}

function generateBasketStyles () {
    // console.log('Привет, я GULP');
    // 1. Откуда мы берем файлы
    return gulp .src('styles/basket.css')
                .pipe(importCss())
                .pipe(autoprefixer({ browsers: ['last 10 versions'] }))
                .pipe(cleanCSS({
                    level: 0
                  }))
                .pipe( gulp.dest('styles/dist') );

    // 2. Что мы делаем с этим файлами
    // 3. Куда мы помещаем результат
}

function generateAllStyles() {
    gulp.watch('styles/blocks/**/*.css', gulp.series(generateStyles));
    gulp.watch('styles/blocks/**/*.css', gulp.series(generateBasketStyles));
}

gulp.task('watch', generateAllStyles );