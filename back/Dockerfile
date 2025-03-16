# Apache + PHP 8.2 の公式イメージ
FROM php:8.2-apache

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
    libxml2-dev libzip-dev unzip git curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Apache の設定（mod_rewrite を有効化）
RUN a2enmod rewrite

# Apache の設定ファイルをコピー
COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Composer をインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを設定
WORKDIR /var/www/html

# Laravel の `composer.json` を先にコピー（キャッシュ最適化）
COPY composer.json composer.lock ./

# Composer install を最初にフルで実行
RUN composer install --prefer-dist --no-scripts

# Laravel のソースコードをコピー
COPY . .

# `.env` ファイルの設定とLaravelキーの生成
RUN cp .env.example .env \
    && php artisan key:generate

# キャッシュのクリアと再生成
RUN php artisan config:clear \
    && php artisan config:cache

# ストレージとキャッシュディレクトリの権限を設定
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# ポートを開放
EXPOSE 80
