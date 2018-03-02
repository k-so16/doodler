# Doodler - Tiny Doodle BBS
## Overview
- ちょっとした絵(doodle)を描いて公開できます。
- 投稿された絵はトップページのリストに表示されます。

---

## Functions
- トップページで投稿された絵の一覧を表示
- 一覧の絵をクリックすると、実際のサイズの絵を表示
- 右上のボタンをクリックすると、絵を描くページに遷移
- 投稿ボタンで描いた絵を投稿

---

## Prerequisite
### Server
- Composerを使用
- Laravel 5.6.5を使用 (PHP >= 7.1.3)
- MySQLを使用

### Client
- HTML5及びcanvasが利用可能なブラウザ

---

## Installation
1. Gitリポジトリからclone
2. 依存パッケージのインストール
3. ファイル `.env` の作成
4. アプリケーションキーの生成
5. ディレクトリのパーミッションの変更
6. マイグレーションの実行

```sh
git clone https://github.com/k-so16/doodler.git
cd doodler

# 依存パッケージのインストール
composer install

# .envの作成
cp .env.sample .env

# clone先の環境に合わせて変更
vi .env

# アプリケーションキーの生成
php artisan key:generate

# storage及びbootstrap/cacheのパーミッションの変更
# Webサーバのユーザをwww-dataと仮定
sudo chgrp -R www-data storage bootstrap/cache
chmod -R g+w storage bootstrap/cache

# マイグレーションの実行
php artisan migrate
```
