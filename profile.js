document.addEventListener("DOMContentLoaded", function() {
    fetch('get_user_info.php')
    .then(response => response.json())
    .then(data => {
        if (data.logged_in) {
            document.getElementById("usernameDisplay").textContent = data.username;

            const bookingsSection = document.getElementById("bookings");
            if (data.bookings.length > 0) {
                data.bookings.forEach(booking => {
                    const bookingItem = document.createElement("p");
                    bookingItem.textContent = `Гора: ${booking.mountain} - Дата прибытия: ${booking.arrival_date} - Дата тренировки: ${booking.train_date}`;
                    bookingsSection.appendChild(bookingItem);
                });
            } else {
                bookingsSection.textContent = "У вас пока нет забронированных восхождений.";
            }
        } else {
            window.location.href = "index.html"; // Перенаправляем на страницу входа
        }
    });

    document.getElementById("logoutBtn").addEventListener("click", function() {
        fetch('logout.php')
        .then(() => {
            window.location.href = "index.html";
        });
    });
});
