# Node.js の公式イメージを使用
FROM node:18

# 作業ディレクトリを設定
WORKDIR /app

# package.json をコピーして依存関係をインストール
COPY package.json package-lock.json ./

# TypeScript のバージョンを 4.x に固定してインストール
RUN npm install typescript@4.9.5 --save-dev

# 依存関係をインストール (依存関係の衝突を無視)
RUN npm install --legacy-peer-deps

# ソースコードをコピー
COPY . .

# React をビルド
RUN npm run build

# ポートを開放
EXPOSE 3000

# 開発サーバーを起動
CMD ["npm", "start"]
