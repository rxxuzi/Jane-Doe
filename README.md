# Jane-Doe Website

## Overview

このプロジェクトは、モダンな金融・経済情報ウェブサイトを構築することを目的としています。
ウェブサイトでは、仮想通貨の価格、ニュース、現在の日付と時刻をリアルタイムで表示します。

## Technology Stack

- Frontend: HTML, CSS, TypeScript
- Backend: PHP
- Runtime: Node.js
- External APIs: CoinGecko API, WorldTimeAPI, GNews

## Setup

1. Node.jsをインストール
2. プロジェクトのルートディレクトリで以下のコマンドを実行して依存関係をインストール

   ~~~shell
   npm install
   ~~~

3. TypeScriptファイルをコンパイル

   ~~~shell
   tsc
   ~~~

4. `assets`ディレクトリ内に `api.ini` ファイルを作成し、必要なAPIキーを設定。サンプルフォーマットは以下の通りです：
   ~~~ini
    [GNews]
    API_KEY = your_gnews_api_key
    ~~~

5ローカルサーバーを起動してプロジェクトを実行

## File Structure

- `index.php`: ウェブページのメインファイル。HTMLの構造とスタイルを定義しています。
- `main.ts`: 仮想通貨の情報とニュースをフェッチし、ウェブページに表示するためのTypeScriptファイルです。
- `realTime.ts`: 現在の日付と時刻をリアルタイムで表示するためのTypeScriptファイルです。
- `api_proxy.php`: 外部APIへのリクエストを処理するためのPHPプロキシファイルです。
- `clock.css`: `.clock` クラスとその他の要素のスタイルを定義するCSSファイルです。

## Contributing Guidelines

- **Issueの作成**: バグを見つけたり、新機能を提案したりする際は、まずIssueを作成してください。
- **ブランチの命名**: 新しいブランチを作成する際は、その目的を簡潔に表す名前をつけてください。例: `fix-typos`, `add-news-feature`
- **コードスタイル**: 一貫したコードスタイルを保つために、プロジェクトの既存のコードスタイルに従ってください。
- **プルリクエスト**: 変更が完了したら、プルリクエストを作成してください。変更内容とその理由を明確に説明してください。

## License

このプロジェクトはApache License 2.0の下で公開されています。詳細は[LICENSE](LICENSE)ファイルをご覧ください。

## Acknowledgements

### データ提供: 

* [CoinGecko](https://www.coingecko.com/)
* [WorldTimeAPI](http://worldtimeapi.org/)
* [GNews](https://gnews.io/)
