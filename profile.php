<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit();
}

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resort_db";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение имени пользователя из сессии
$username = $_SESSION['username'];

// Получение информации о бронированиях пользователя из базы данных
$sql_bookings = "SELECT * FROM bookings WHERE username = '$username'";
$result_bookings = $conn->query($sql_bookings);

$conn->close();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Профиль пользователя</h1>
        <nav>
            <ul>
                <li><a href="index.html">Главная</a></li>
                <li><a href="logout.php">Выйти</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Добро пожаловать, <?php echo htmlspecialchars($username); ?>!</h2>
        <section id="bookings">
            <h3>Ваши бронирования:</h3>
            <?php
            if ($result_bookings->num_rows > 0) {
                while($row_booking = $result_bookings->fetch_assoc()) {
                    echo "<p>Гора: " . htmlspecialchars($row_booking["mountain"]) . " - Дата прибытия: " . htmlspecialchars($row_booking["arrival_date"]) . "</p>";
                }
            } else {
                echo "<p>У вас пока нет забронированных восхождений.</p>";
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Горнолыжный курорт. Все права защищены.</p>
    </footer>
</body>
</html>
