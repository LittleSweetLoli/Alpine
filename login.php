<?php
$servername = "localhost";
$username = "root"; // Замените на ваше имя пользователя MySQL
$password = ""; // Замените на ваш пароль MySQL
$dbname = "resort_db"; // Имя вашей базы данных

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(array("success" => true, "message" => "Авторизация успешна."));
} else {
    echo json_encode(array("success" => false, "message" => "Неверное имя пользователя или пароль."));
}

$conn->close();
?>
