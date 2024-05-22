<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root"; // Замените на ваше имя пользователя
$password = ""; // Замените на ваш пароль
$dbname = "resort_db"; // Замените на имя вашей базы данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получение данных из формы авторизации
$username = $_POST["username"];
$password = $_POST["password"];

// Поиск пользователя в базе данных
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Пользователь найден, авторизация успешна
    echo json_encode(array("success" => true, "message" => "Авторизация успешна."));
} else {
    // Пользователь не найден или пароль неверен
    echo json_encode(array("success" => false, "message" => "Неверное имя пользователя или пароль."));
}

// Закрытие соединения
$conn->close();
?>
