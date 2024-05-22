document.addEventListener("DOMContentLoaded", function() {
    var usernameDisplay = document.getElementById("usernameDisplay");
    var logoutBtn = document.getElementById("logoutBtn");

    // Проверяем, есть ли имя пользователя в сессии
    fetch('get_user_info.php')
    .then(response => response.json())
    .then(data => {
        if (data.logged_in) {
            usernameDisplay.textContent = data.username;
        } else {
            window.location.href = "index.html"; // Перенаправляем на страницу входа
        }
    });

    logoutBtn.addEventListener("click", function() {
        fetch('logout.php')
        .then(() => {
            window.location.href = "index.html";
        });
    });
});
