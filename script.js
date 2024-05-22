// Найти элементы
var loginBtn = document.getElementById("loginBtn");
var registerBtn = document.getElementById("registerBtn");
var profileBtn = document.getElementById("profileBtn");
var loginModal = document.getElementById("loginModal");
var registerModal = document.getElementById("registerModal");
var closeButtons = document.getElementsByClassName("close");

// Проверка, авторизован ли пользователь
fetch('get_user_info.php')
.then(response => response.json())
.then(data => {
    if (data.logged_in) {
        loginBtn.style.display = "none";
        registerBtn.style.display = "none";
        profileBtn.style.display = "inline-block";
    } else {
        loginBtn.style.display = "inline-block";
        registerBtn.style.display = "inline-block";
        profileBtn.style.display = "none";
    }
});

// Открытие модального окна авторизации при нажатии на кнопку "Войти"
loginBtn.onclick = function() {
    loginModal.style.display = "block";
}

// Открытие модального окна регистрации при нажатии на кнопку "Регистрация"
registerBtn.onclick = function() {
    registerModal.style.display = "block";
}

// Закрытие модального окна при нажатии на крестик
for (var i = 0; i < closeButtons.length; i++) {
    closeButtons[i].onclick = function() {
        this.parentElement.parentElement.style.display = "none";
    }
}

// Закрытие модальных окон при нажатии вне их
window.onclick = function(event) {
    if (event.target == loginModal) {
        loginModal.style.display = "none";
    }
    if (event.target == registerModal) {
        registerModal.style.display = "none";
    }
}

// Обработчик формы авторизации
var loginForm = document.getElementById("loginForm");
loginForm.onsubmit = function(event) {
    event.preventDefault();
    var formData = new FormData(loginForm);

    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loginModal.style.display = "none";
            loginBtn.style.display = "none";
            registerBtn.style.display = "none";
            profileBtn.style.display = "inline-block";
        } else {
            document.getElementById("loginMessage").textContent = data.message;
        }
    });
}

// Обработчик формы регистрации
var registerForm = document.getElementById("registerForm");
registerForm.onsubmit = function(event) {
    event.preventDefault();
    var formData = new FormData(registerForm);

    fetch("registration.php", {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            registerModal.style.display = "none";
            loginBtn.style.display = "none";
            registerBtn.style.display = "none";
            profileBtn.style.display = "inline-block";
        } else {
            document.getElementById("registerMessage").textContent = data.message;
        }
    });
}

// Переход в профиль при нажатии на кнопку "Профиль"
profileBtn.onclick = function() {
    window.location.href = "profile.html";
}
