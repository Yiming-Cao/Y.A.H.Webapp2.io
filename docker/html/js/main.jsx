const popUpNotification = (message,prio)=>{
    const notification = document.createElement('div');
    const title = document.createElement('h2');
    notification.classList.add('notification');
    notification.classList.add(prio);
    title.inner.HTML = message;
    notification.appendChild(title);
    document.body.appendChild(notification);
}


const voorbeeldAanroep = () => {
    popUpNotification('This is notification','info');
}