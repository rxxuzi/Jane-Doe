"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
document.addEventListener('DOMContentLoaded', () => {
    fetchNews();
});
function fetchNews() {
    fetch('./../api_proxy.php')
        .then((response) => __awaiter(this, void 0, void 0, function* () {
        if (!response.ok) {
            let text = yield response.text();
            throw new Error("HTTP error! Status: " + response.status + ", Body: " + text);
        }
        return response.json();
    }))
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
