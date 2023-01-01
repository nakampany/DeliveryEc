# 1.アプリ概要

| key    | value                                                |
| ------ | ---------------------------------------------------- |
| Name   | AWARAEATS（あわら市デリバリーデモサイト）`AWARAEATS` |
| URL    |                                |
| GitHub | https://github.com/nakampany/DeliveryEc                 |


## コンセプト

- あわら市デリバリー事業を行う際の EC サイト
- AWARAEATSの①ユーザーページと②店舗管理者ページ、③全体の管理者ページが存在する
- プログラミングを始めたきっかけが、EC サイトを構築できるようになりたいという思いから作成した。
大学3年時に、デリバリー事業（AWARAEATS）の立ち上げをしたが、ECサイトを受託したため、自分と相手で熱量の差を感じること、自分のアイデアを妥協することが多くあった。
自分でECサイトが構築でき、自分の発想を形にできたらと思い、プログラミング学習を始めた。


## 特徴

- ①ユーザーページ：商品を検索し、購入までできる（stripAPI）
- ②店舗管理者ページ：店舗ページや商品登録や在庫管理ができる（CRUD機能)
- ③全体の管理者ページ：店舗のユーザーを管理する（CRUD機能、論理削除も実装）

## 使用画面のイメージ

![screencapture-localhost-login-2023-01-02-02_15_20](https://user-images.githubusercontent.com/103278404/210179299-faea962b-fae9-4fb2-96f5-39d34874bce8.png)


# 2.使用技術

## ディレクトリ構造

```
【ルートディレクトリ】
├─ docker
│   ├─ mysql
│   │   ├─Dockerfile 
│   │   └─my.cnf 
│   ├─ nginx
│   │   ├─Dockerfile 
│   │   └─default.conf 
│   └─ php
|       ├─Dockerfile 
|       └─php.ini 
├─ src
│   └─ 【Laravelのパッケージ】
├─ .gitignore
└─ docker-compose.yml
```

## フロントエンド

- HTML / CSS / tailwindow / javascript

## バックエンド

- PHP 8.1
- Laravel 9.40.1

## DB

- MySQL 8.0
- PHPMyAdmin

## 開発環境

- Git(Git-flow) / GitHub
- Docker / docker-compose 
- VScode
- iTerm2
- MacOS

## パッケージ

- Composer 2.2
- npm 8.19.2
- Homebrew

## その他使用ツール

- draw.io(ER図)
- Notion(タスク管理)
- Google Sheet(ルート情報管理)
- figma(画面遷移図)

# 3.機能一覧

## メイン機能

- オーナー作成、商品登録などの投稿機能(CRUD)
- ページネーション機能
- stripAPI でクレジットカードで購入できる
- 商品絞り込み
- 論理削除（復元もできる）
- レスポンシブデザイン(ハンバーガーメニュー)

## 認証機能

LaravelBreezeで実装
- 会員登録 / ログイン / ログアウト
- プロフィール編集
- メールアドレス変更(SendGrid)
- パスワード再設定(SendGrid)
- 退会


## 実装予定

- EC2 / RDS 冗長化
- 結合テスト / 統合テスト
- メッセージ機能機能
- 購入履歴閲覧
- フロントエンド（vue.js化）

# 4.基本設計

## 画面遷移図
<img width="914" alt="スクリーン ショット 2023-01-02 に 02 07 52 午前" src="https://user-images.githubusercontent.com/103278404/210179340-b475750f-39ff-4426-a7c8-82eef2f49af2.png">

## 開発環境

- 開発環境：`Docker / docker-compose`
- バージョン管理：`Git(Git-flow) / GitHub`
- 開発ツール：`VScode / MacOS`

| key        | value   |
| :--------- | :------ |
| php        | app     |
| nginx      | web     |
| mysql      | db      |
| phpmyadmin | db 管理 |

## ER 図
![名称未設定ファイル drawio](https://user-images.githubusercontent.com/103278404/210179316-12cb03c0-e716-4601-a60a-a90d306df302.png)

## テーブル定義書

| テーブル名   | 説明                             |
| ------------ | -------------------------------- |
| Users        | ユーザー情報                     |
| owners        | 店舗オーナー情報                         |
| admin         | 店舗管理者情報                   |
| products      | 商品                            |
| primary_category | 第一カテゴリー                       |
| secondary_category | 第二カテゴリー                     |
| carts      | カート情報 （usersとproductsの中間テーブル）   |
| shops     | 店舗情報                                |
| stocks        | 在庫情報                          |
| images      | 店舗や商品の画像                     |

