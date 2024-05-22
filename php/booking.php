<?php
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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $arrival_date = $_POST["arrival_date"];
    $departure_date = $_POST["departure_date"];

    $sql = "INSERT INTO bookings (name, email, arrival_date, departure_date)
            VALUES ('$name', '$email', '$arrival_date', '$departure_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Бронирование успешно создано.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>