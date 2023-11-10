document.addEventListener('DOMContentLoaded', () => {
    fetchCoinAPI();
});

const cryptoIds = ['bitcoin', 'ethereum', 'dogecoin', 'cardano', 'ripple',
    'litecoin',  'tron', 'solana', 'matic-network', 'avalanche-2'];

function fetchCoinAPI() {
    const cryptoQueryString = cryptoIds.join(',');

    fetch(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${cryptoQueryString}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach((crypto: any) => displayCoinGeckoData(crypto));
            mkList();
        })
        .catch(error => console.error('Error:', error));
}

function displayCoinGeckoData(crypto: any) {
    const container = document.querySelector('.coin-container') as HTMLElement;

    const coinList = document.createElement('li');
    coinList.className = 'coin-list';

    const coinData = document.createElement('div');
    coinData.className = 'coin-data';

    const article =  document.createElement('article');
    article.className = 'coin-article';

    const image = document.createElement('img');
    image.className = 'coin-image';
    image.src = crypto.image;
    article.appendChild(image);

    const infoContainer = document.createElement('div');
    infoContainer.className = 'coin-info';

    const title = document.createElement('h2');
    title.textContent = crypto.name;
    infoContainer.appendChild(title);

    const marketCap = document.createElement('p');
    marketCap.textContent = `Market Cap: ${formatLargeNumber(crypto.market_cap)}`;
    infoContainer.appendChild(marketCap);

    const currentPrice = document.createElement('p');
    currentPrice.textContent = `Current Price: ${formatLargeNumber(crypto.current_price)}`;
    infoContainer.appendChild(currentPrice);

    article.appendChild(infoContainer);
    coinData.appendChild(article);
    coinList.appendChild(coinData);
    container.appendChild(coinList);
}

function mkList(){
    const container = document.querySelector('.coin-container') as HTMLElement;
    if (!container) return;

    // コンテナの子要素をすべて取得
    const coins = Array.from(container.children);

    // 各要素をクローンしてコンテナの最後に追加
    coins.forEach((coin) => {
        const coinClone = coin.cloneNode(true);
        container.appendChild(coinClone);
    });
}


