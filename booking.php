<?php
session_start();
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

// Обработка данных из формы и сохранение в базе данных
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $mountain = $_POST["mountain"];
    $arrival_date = $_POST["arrival_date"];

    $sql = "INSERT INTO bookings (username, mountain, arrival_date)
            VALUES ('$username','$mountain','$arrival_date')";

    if ($conn->query($sql) === TRUE) {
        // Перенаправление на страницу оплаты и договора
        header("Location: payment.php");
        exit();
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
