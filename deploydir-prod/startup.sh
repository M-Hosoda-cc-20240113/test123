#!/bin/bash -e
cd /var/www/app/
# .env.exampleから.envを作成
cp -f .env.example .env
composer self-update
composer install --no-dev
php artisan key:generate
#シンボリックリンクの作成
php artisan storage:link
# storageディレクトリの権限変更
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
chmod -R 777 storage/
# migration実行
php artisan migrate --force
# キャッシュクリア
php artisan cache:clear
php artisan config:clear
# 環境変数で.envを置換
sed -i \
    -e "/^APP_DEBUG=.*/c APP_DEBUG=${APP_DEBUG}" \
    -e "/^APP_ENV=.*/c APP_ENV=${APP_ENV}" \
    -e "/^APP_KEY=.*/c APP_KEY=${APP_KEY}" \
    -e "/^DB_HOST=.*/c DB_HOST=${DB_HOST}" \
    -e "/^DB_PORT=.*/c DB_PORT=${DB_PORT}" \
    -e "/^DB_DATABASE=.*/c DB_DATABASE=${DB_DATABASE}" \
    -e "/^DB_USERNAME=.*/c DB_USERNAME=${DB_USERNAME}" \
    -e "/^DB_PASSWORD=.*/c DB_PASSWORD=${DB_PASSWORD}" \
    -e "/^HASH_EMAIL_ALGO=.*/c HASH_EMAIL_ALGO=${HASH_EMAIL_ALGO}" \
    -e "/^HASH_EMAIL_SALT=.*/c HASH_EMAIL_SALT=${HASH_EMAIL_SALT}" \
    -e "/^HASH_ACCOUNT_ALGO=.*/c HASH_ACCOUNT_ALGO=${HASH_ACCOUNT_ALGO}" \
    -e "/^HASH_ACCOUNT_SALT=.*/c HASH_ACCOUNT_SALT=${HASH_ACCOUNT_SALT}" \
    /var/www/app/.env
# envにtokenのブラックリスト化後の保持期間を追記。以下を参照
# https://qiita.com/yh1224/items/bd00e85d5c53350e93ca
echo 'update success /var/www/app/.env'
exec $@
