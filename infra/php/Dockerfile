FROM php:7.4-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

#php
COPY ./infra/php/php.ini /usr/local/etc/php/php.ini
#docker.conf
COPY ./infra/php/docker.conf /usr/local/etc/php-fpm.d/docker.conf
# MySQLの公開鍵ファイルをビルドコンテキストからコピー
COPY ./infra/php/RPM-GPG-KEY-mysql-2023.asc /tmp/RPM-GPG-KEY-mysql-2023.asc


# タイムゾーンを設定
ENV TZ=Asia/Tokyo

ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer


# 必要なパッケージをインストールし、公開鍵を追加
RUN apt-get update && \
  DEBIAN_FRONTEND=noninteractive apt-get install -y gnupg2 curl && \
  apt-key add /tmp/RPM-GPG-KEY-mysql-2023.asc && \
  DEBIAN_FRONTEND=noninteractive apt-get install -y git unzip libzip-dev libicu-dev libonig-dev vim mlocate cron && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  docker-php-ext-install intl pdo_mysql zip bcmath


# Node.jsをインストール
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - && \
  DEBIAN_FRONTEND=noninteractive apt-get install -y nodejs

RUN echo "alias ll='ls -l'" >> /root/.bashrc

WORKDIR /aegis