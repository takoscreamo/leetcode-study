
# LeetCode Study

LeetCodeで解いた問題を復習するためのリポジトリ。


## セットアップ

1. Docker Desktopをインストールする。
2. 本リポジトリをクローンする。

```
git clone <このリポジトリのURL>
cd leetcode-study
```

3. Dockerコンテナを起動する。

```
docker compose up -d --build
```


## PHPファイルの実行方法

```
docker compose exec web php hello.php
```


## ファイル構成例

- `hello.php` : サンプルのHello World
- `Dockerfile` : PHP実行環境の定義ファイル
- `docker-compose.yml` : Dockerサービスの定義ファイル

---
