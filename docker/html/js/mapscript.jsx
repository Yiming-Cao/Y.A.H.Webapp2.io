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




  
