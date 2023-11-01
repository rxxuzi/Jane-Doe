"use strict";
document.addEventListener('DOMContentLoaded', () => {
    fetchNews();
    fetchAPI();
});
const cryptoIds = ['bitcoin', 'ethereum', 'dogecoin', 'cardano', 'ripple',
    'litecoin', 'tron', 'solana', 'matic-network', 'avalanche-2'];
function fetchAPI() {
    const cryptoQueryString = cryptoIds.join(',');
    fetch(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${cryptoQueryString}`)
        .then(response => response.json())
        .then(data => {
        console.log(data);
        data.forEach((crypto) => displayCoinGeckoData(crypto));
    })
        .catch(error => console.error('Error:', error));
}
function fetchNews() {
    fetch('./../api_proxy.php')
        .then(response => {
        if (!response.ok) {
            return response.text().then(text => {
                throw new Error("HTTP error! Status: " + response.status + ", Body: " + text);
            });
        }
        return response.json();
    })
        .then(data => {
        console.log(data);
        displayNews(data);
    })
        .catch(error => {
        console.error("Fetch error: " + error.message);
    });
}
function displayNews(data) {
    const container = document.querySelector('.news-container');
    data.articles.forEach((article) => {
        const newsItem = document.createElement('div');
        newsItem.className = 'news-item';
        const title = document.createElement('h2');
        title.className = 'news-title';
        title.textContent = article.title;
        const content = document.createElement('p');
        content.className = 'news-content';
        content.textContent = article.description;
        const url = document.createElement('a');
        url.className = 'news-url';
        url.href = article.url;
        url.textContent = article.source.name;
        newsItem.appendChild(title);
        newsItem.appendChild(content);
        container.appendChild(newsItem);
        content.appendChild(url);
    });
}
function displayCoinGeckoData(crypto) {
    const container = document.querySelector('.coin-container');
    const coinData = document.createElement('li');
    coinData.className = 'coin-data';
    const image = document.createElement('img');
    image.className = 'coin-image';
    image.src = crypto.image;
    coinData.appendChild(image);
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
    coinData.appendChild(infoContainer);
    container.appendChild(coinData);
}
function formatLargeNumber(num) {
    if (num >= 1000000000) {
        return (num / 1000000000).toFixed(2) + ' B USD';
    }
    else if (num >= 1000000) {
        return (num / 1000000).toFixed(2) + ' M USD';
    }
    else if (num >= 1000) {
        return (num / 1000).toFixed(2) + ' K USD';
    }
    else {
        return num + ' USD';
    }
}
