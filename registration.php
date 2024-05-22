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

// Получение данных из формы регистрации
$newUsername = $_POST["newUsername"];
$newPassword = $_POST["newPassword"];

// Проверка, существует ли уже пользователь с таким именем
$sql_check = "SELECT * FROM users WHERE username='$newUsername'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Пользователь с таким именем уже существует
    echo json_encode(array("success" => false, "message" => "Пользователь с таким именем уже существует."));
} else {
    // Добавление нового пользователя в базу данных
    $sql_insert = "INSERT INTO users (username, password) VALUES ('$newUsername', '$newPassword')";
    if ($conn->query($sql_insert) === TRUE) {
        // Пользователь успешно зарегистрирован
        echo json_encode(array("success" => true, "message" => "Регистрация успешна."));
    } else {
        // Ошибка при добавлении пользователя
        echo json_encode(array("success" => false, "message" => "Ошибка регистрации: " . $conn->error));
    }
}

// Закрытие соединения
$conn->close();
?>
