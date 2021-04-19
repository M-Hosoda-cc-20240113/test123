// gulpプラグインを読み込み
const gulp = require('gulp');
// Sassをコンパイルするプラグインの読み込み
const sass = require('gulp-sass');

// style.scssをタスクを作成する
gulp.task('sass', ()=>{
    return gulp.src('./resources/sass2/style.scss')   // style.scssファイルを取得
    .pipe(sass({outputStyle : 'expanded'}))   // Sassのコンパイルを実行
    .pipe(gulp.dest('./public/css2'));    // cssフォルダー以下に保存
});

//監視タスク
gulp.task('sass-watch',()=>{
    gulp.watch('./resources/sass2/**/*.scss', gulp.task('sass'));
});

//デフォルトタスク
gulp.task('default',gulp.task('sass-watch'));