document.addEventListener("DOMContentLoaded", function() {
    var usernameDisplay = document.getElementById("usernameDisplay");
    var logoutBtn = document.getElementById("logoutBtn");

    fetch('get_user_info.php')
    .then(response => response.json())
    .then(data => {
        if (data.logged_in) {
            usernameDisplay.textContent = data.username;
        } else {
            window.location.href = "index.html";
        }
    });

    logoutBtn.addEventListener("click", function() {
        fetch('logout.php')
        .then(() => {
            window.location.href = "index.html";
        });
    });
});
