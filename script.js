// Найти кнопку авторизации
var loginBtn = document.getElementById("loginBtn");

// Найти всплывающее окно
var loginModal = document.getElementById("loginModal");

// Найти элемент закрытия
var closeBtn = document.getElementsByClassName("close")[0];

// Клик на кнопку авторизации, открыть всплывающее окно
loginBtn.onclick = function() {
    loginModal.style.display = "block";
}

// Клик на элемент закрытия, закрыть всплывающее окно
closeBtn.onclick = function() {
    loginModal.style.display = "none";
}

// Клик за пределами всплывающего окна, закрыть его
window.onclick = function(event) {
    if (event.target == loginModal) {
        loginModal.style.display = "none";
    }
}

// Найти кнопку авторизации
var registerBtn = document.getElementById("registerBtn");

// Найти всплывающее окно
var registerModal = document.getElementById("registerModal");

// Найти элемент закрытия
var closeBtn = document.getElementsByClassName("close")[0];

// Клик на кнопку авторизации, открыть всплывающее окно
registerBtn.onclick = function() {
    registerModal.style.display = "block";
}

// Клик на элемент закрытия, закрыть всплывающее окно
closeBtn.onclick = function() {
    registerModal.style.display = "none";
}

// Клик за пределами всплывающего окна, закрыть его
window.onclick = function(event) {
    if (event.target == registerModal) {
        registerModal.style.display = "none";
    }
}