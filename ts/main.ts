document.addEventListener('DOMContentLoaded', () => {
    fetchNews();
});

function fetchNews() {
    fetch('./../api_proxy.php')
        .then(async response => {
            if (!response.ok) {
                let text = await response.text();
                throw new Error("HTTP error! Status: " + response.status + ", Body: " + text);
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


function displayNews(data: any) {
    const container = document.querySelector('.news-container') as HTMLElement;
    data.articles.forEach((article: any) => {
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

function formatLargeNumber(num: number): string {
    if (num >= 1_000_000_000) {
        return (num / 1_000_000_000).toFixed(2) + ' B USD';
    } else if (num >= 1_000_000) {
        return (num / 1_000_000).toFixed(2) + ' M USD';
    } else if (num >= 1_000) {
        return (num / 1_000).toFixed(2) + ' K USD';
    } else {
        return num + ' USD';
    }
}
