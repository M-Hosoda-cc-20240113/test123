# aegis環境構築

リポジトリaegisをローカルにクローン

クローンが終わったらコンテナを立ち上げる（初めての場合結構時間かかります）

```docker
docker-compose up -d --build
```

コンテナが作成されたら下記コマンド

```docker
docker-compose ps
```

でコンテナが起動していることを確認。

Stateがupになっていることを確認したら下記コマンドでphpのコンテナに入る

```docker
docker-compose exec php bash
```

コンテナ内で下記コマンド

```docker
composer install
```

compose install が終わったら「.env」の作成（コンテナ内）

```bash
cp .env.example .env
```

「.env」を作成したら.envのDBとHASHの設定を追加・編集

```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=4000
DB_DATABASE=aegis
DB_USERNAME=developer
DB_PASSWORD=password

HASH_EMAIL_ALGO=SHA512
HASH_EMAIL_SALT=eudhfkwoektkeidw
HASH_ACCOUNT_ALGO=SHA512
HASH_ACCOUNT_SALT=flsiemnb84jsovgj
```

keyを作成する（コンテナ内）

```bash
php artisan key:generate 
```

config設定を読み込む（コンテナ内

```php
php artisan config:cache
```

.envを編集したらmigrate（コンテナ内）

```bash
php artisan migrate --seed
```

nodeのパッケージを入れる(コンテナ内)

```sql
npm install
```

jsをコンパイルする（コンテナ内）

```bash
npx webpack
```

ブラウザで「localhost:8090」でAegisのlogin画面を確認する。

※メールアドレス変更などメールが関連する機能を作成・実行・テストしたい場合は別途Mailtrapに登録し.envファイルにMailtrap情報を追加する。
