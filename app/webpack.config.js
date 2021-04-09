const path = require('path'); // パスを指定するためにnode標準で搭載されるpathオブジェクトを読み込む

module.exports = {
  // モード値を production に設定すると最適化された状態で、
  // development に設定するとソースマップ有効でJSファイルが出力される
　mode: 'development',
　devtool: 'eval-source-map',
　entry: path.join(__dirname, '/resources/js/app.js'),
　output: {
    path: path.join(__dirname, '/public/js'), // バンドルしたファイルの吐き出し先を設定
    filename: 'bundle.js' //　ファイルの名前を指定
  },

  module: {
    rules: [
      {
        // 拡張子 .js の場合
        test: /\.js$/,
        exclude: /node_modules/,   //これ絶対に忘れてはいけない
      }
    ]
  }
};
