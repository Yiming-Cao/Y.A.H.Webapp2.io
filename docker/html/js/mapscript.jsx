document.addEventListener('DOMContentLoaded', () => {
    const image = document.querySelector('.map-img');
    const container = document.querySelector('.image-container');

    container.addEventListener('mousemove', (event) => {
        const rect = container.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const deltaX = (x - centerX) / centerX;
        const deltaY = (y - centerY) / centerY;

        const rotateX = deltaY * -5; // 倾斜的角度，可以根据需要调整
        const rotateY = deltaX * 5;

        image.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
    });

    container.addEventListener('mouseleave', () => {
        image.style.transform = 'rotateX(0) rotateY(0)';
    });
});


// script.js

const map = document.getElementById('map');
const tooltip = document.getElementById('tooltip');
const tooltipImage = document.getElementById('tooltip-image');
const tooltipText = document.getElementById('tooltip-text');

// 示例数据，可以从数据库获取实际数据
const data = {
    'region1': { text: 'Region 1 Information', image: 'region1.png' },
    'region2': { text: 'Region 2 Information', image: 'region2.png' },
    // 添加其他区域数据
};

map.addEventListener('mousemove', (e) => {
    const mapRect = map.getBoundingClientRect();
    const x = e.clientX - mapRect.left;
    const y = e.clientY - mapRect.top;

    // 根据鼠标位置确定显示的信息（这里需要根据实际需求设置条件）
    let region;
    if (x > 100 && x < 300 && y > 100 && y < 200) {
        region = 'region1';
    } else if (x > 400 && x < 600 && y > 200 && y < 300) {
        region = 'region2';
    } else {
        tooltip.style.display = 'none';
        return;
    }

    if (region && data[region]) {
        tooltip.style.display = 'block';
        tooltip.style.left = `${x + 20}px`;
        tooltip.style.top = `${y + 20}px`;
        tooltipText.textContent = data[region].text;
        tooltipImage.src = data[region].image;
    } else {
        tooltip.style.display = 'none';
    }
});

map.addEventListener('mouseout', () => {
    tooltip.style.display = 'none';
});
