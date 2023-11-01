"use strict";
document.addEventListener('DOMContentLoaded', () => {
    displayRealTimeClock();
    fetchDateAndRegion();
});
function displayRealTimeClock() {
    const container = document.querySelector('.time-container');
    const timeData = document.createElement('div');
    timeData.className = 'clock';
    container.appendChild(timeData);
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit', timeZoneName: 'short' });
        timeData.textContent = timeString;
    }
    setInterval(updateClock, 1000);
    updateClock(); // 初回表示のために直ちに呼び出し
}
function fetchDateAndRegion() {
    fetch('https://worldtimeapi.org/api/timezone/Asia/Tokyo')
        .then(response => response.json())
        .then(data => {
        console.log(data);
        displayDateAndRegion(data);
    })
        .catch(error => console.error('Error:', error));
}
function displayDateAndRegion(data) {
    const container = document.querySelector('.time-container');
    // 日付と曜日の表示
    const dateTime = new Date(data.datetime);
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZoneName: 'short' };
    const dateString = dateTime.toLocaleDateString(undefined, options);
    const dateAndRegion = document.createElement('div');
    dateAndRegion.className = 'time-data';
    const dateElement = document.createElement('p');
    dateElement.textContent = dateString + ` : Region: ${data.timezone}`;
    dateAndRegion.appendChild(dateElement);
    container.appendChild(dateAndRegion);
}
