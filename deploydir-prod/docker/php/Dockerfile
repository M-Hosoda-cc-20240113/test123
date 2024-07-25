FROM php:7.4-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

#タイムゾーンを設定
ENV TZ=Asia/Tokyo

ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer
COPY publickey.txt /tmp/publickey.txt

RUN apt-get update && \
  apt-get -y install git unzip libzip-dev libicu-dev libonig-dev vim mlocate cron && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  docker-php-ext-install intl pdo_mysql zip bcmath
  
#   # 必要なパッケージをインストールし、MySQLの公開鍵を追加
# RUN apt-get update && \
#     apt-get install -y gnupg2 && \
#     apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys B7B3B788A8D3785C && \
#     apt-get install -y git unzip libzip-dev libicu-dev libonig-dev vim mlocate cron tzdata locales && \
#     locale-gen ja_JP.UTF-8 && \
#     docker-php-ext-install intl pdo_mysql zip bcmath && \
#     apt-get clean && \
#     rm -rf /var/lib/apt/lists/*


# Node.jsをインストール
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs
RUN echo "alias ll='ls -l'" >> /root/.bashrc
