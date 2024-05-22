// Найти элементы
var loginBtn = document.getElementById("loginBtn");
var registerBtn = document.getElementById("registerBtn");
var loginModal = document.getElementById("loginModal");
var registerModal = document.getElementById("registerModal");
var closeButtons = document.getElementsByClassName("close");

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
loginForm.addEventListener("submit", function(event) {
    event.preventDefault();

    var formData = new FormData(loginForm);

    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        var loginMessage = document.getElementById("loginMessage");
        if (data.success) {
            loginMessage.textContent = "Авторизация успешна!";
            loginMessage.style.color = "green";
            // Дополнительные действия, например, редирект на другую страницу
        } else {
            loginMessage.textContent = data.message;
            loginMessage.style.color = "red";
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
    });
});

// Обработчик формы регистрации
var registerForm = document.getElementById("registerForm");
registerForm.addEventListener("submit", function(event) {
    event.preventDefault();

    var formData = new FormData(registerForm);

    fetch('registration.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        var registerMessage = document.getElementById("registerMessage");
        if (data.success) {
            registerMessage.textContent = "Регистрация успешна!";
            registerMessage.style.color = "green";
        } else {
            registerMessage.textContent = data.message;
            registerMessage.style.color = "red";
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
    });
});
