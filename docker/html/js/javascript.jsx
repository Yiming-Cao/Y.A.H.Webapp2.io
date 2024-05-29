const container = document.querySelector('.middown-left-2');
const resizable = document.querySelector('.resizable');
const image = document.getElementById('image');

let isDragging = false;
let isResizing = false;
let startX, startY, startWidth, startHeight;

// 阻止默认的拖拽行为
image.addEventListener('dragstart', (e) => {
    e.preventDefault();
});

container.addEventListener('mousedown', (e) => {
    if (e.target === resizable) {
        isDragging = true;
        startX = e.clientX - resizable.offsetLeft;
        startY = e.clientY - resizable.offsetTop;
        document.addEventListener('mousemove', onMouseMove);
        document.addEventListener('mouseup', onMouseUp);
    }
});

resizable.addEventListener('mousedown', (e) => {
    if (e.target === image) {
        isResizing = true;
        startWidth = image.offsetWidth;
        startHeight = image.offsetHeight;
        startX = e.clientX;
        startY = e.clientY;
        document.addEventListener('mousemove', onResizeMove);
        document.addEventListener('mouseup', onResizeUp);
    }
});

function onMouseMove(e) {
    if (isDragging) {
        let x = e.clientX - startX;
        let y = e.clientY - startY;
        resizable.style.left = `${x}px`;
        resizable.style.top = `${y}px`;
        checkBounds();
    }
}

function onMouseUp() {
    isDragging = false;
    document.removeEventListener('mousemove', onMouseMove);
    document.removeEventListener('mouseup', onMouseUp);
}

function onResizeMove(e) {
    if (isResizing) {
        let width = startWidth + (e.clientX - startX);
        let height = startHeight + (e.clientY - startY);
        image.style.width = `${width}px`;
        image.style.height = `${height}px`;
        checkBounds();
    }
}

function onResizeUp() {
    isResizing = false;
    document.removeEventListener('mousemove', onResizeMove);
    document.removeEventListener('mouseup', onResizeUp);
}

function checkBounds() {
    const containerRect = container.getBoundingClientRect();
    const resizableRect = resizable.getBoundingClientRect();

    if (resizableRect.left < containerRect.left) {
        resizable.style.left = '0px';
    }
    if (resizableRect.top < containerRect.top) {
        resizable.style.top = '0px';
    }
    if (resizableRect.right > containerRect.right) {
        resizable.style.left = `${container.offsetWidth - resizable.offsetWidth}px`;
    }
    if (resizableRect.bottom > containerRect.bottom) {
        resizable.style.top = `${container.offsetHeight - resizable.offsetHeight}px`;
    }

    const imgRect = image.getBoundingClientRect();
    if (imgRect.width > containerRect.width) {
        image.style.width = `${containerRect.width}px`;
    }
    if (imgRect.height > containerRect.height) {
        image.style.height = `${containerRect.height}px`;
    }
}
