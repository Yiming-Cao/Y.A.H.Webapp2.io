function showLogin() {
    var loginBox = document.getElementById("login-box");
    var loginFrame = document.getElementById("login-frame");
    var body = document.body;
    loginBox.style.display = "block";
    loginFrame.style.display = "block";
    loginFrame.style.zIndex = "2";
    body.classList.add("overlay");
}

function hideLogin() {
    var loginBox = document.getElementById("login-box");
    var loginFrame = document.getElementById("login-frame");
    var body = document.body;
    loginBox.style.display = "none";
    loginFrame.style.display = "none";
    loginFrame.style.zIndex = "-1";
    body.classList.remove("overlay");
}