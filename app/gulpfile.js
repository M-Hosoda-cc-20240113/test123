// gulpプラグインを読み込み
const gulp = require('gulp');
// Sassをコンパイルするプラグインの読み込み
const sass = require('gulp-sass');

// style.scssをタスクを作成する
gulp.task('default', function () {
    return gulp.src('resources/sass/style.scss')   // style.scssファイルを取得
        .pipe(sass({outputStyle : 'expanded'}))   // Sassのコンパイルを実行
        .pipe(gulp.dest('public/css'));    // cssフォルダー以下に保存
});