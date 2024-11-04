function toggleForm(formId) {
    let form = document.getElementById(formId);
    if (form.style.display === "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}
// js/main.js
document.addEventListener('DOMContentLoaded', () => {
    // 選擇所有關鍵字
    const kwElements = document.querySelectorAll('.KW');

    // 為每個關鍵字綁定點擊事件
    kwElements.forEach(elem => {
        elem.addEventListener('click', handleKWClick);
    });
});
// 定義一個函數來處理點擊事件
function handleKWClick(event) {
    const timeline = event.currentTarget.getAttribute('data-timeline');
    console.log('Clicked timeline:', timeline);
     // 更新播放器的 src
     const player = document.getElementById('youtube-player');
     const currentSrc = player.src.split('?')[0];
     player.src = `${currentSrc}?start=${timeline}&autoplay=1`;
}
document.querySelector('marquee-content')
