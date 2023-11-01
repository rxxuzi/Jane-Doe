"use strict";
document.addEventListener('DOMContentLoaded', () => {
    fetchNews();
});
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
        const urlArea = document.createElement('p');
        const url = document.createElement('a');
        url.className = 'news-url';
        url.href = article.url;
        url.textContent = article.source.name;
        urlArea.appendChild(url);
        const image = document.createElement('img');
        image.className = 'news-image';
        image.src = article.image;
        const news = document.createElement('div');
        news.className = 'news';
        news.appendChild(title);
        news.appendChild(content);
        news.appendChild(urlArea);
        newsItem.appendChild(image);
        newsItem.appendChild(news);
        container.appendChild(newsItem);
    });
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
