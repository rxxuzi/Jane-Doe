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
            setupInfiniteScroll();
        })
        .catch(error => console.error('Error:', error));
}

function displayCoinGeckoData(crypto: any) {
    const container = document.querySelector('.coin-container') as HTMLElement;

    const coinData = document.createElement('li');
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
    container.appendChild(coinData);
}

const scrollSpeed : number = 50;

function setupInfiniteScroll() {
    // TODO : 無限にスクロールするデザインの実装
}
