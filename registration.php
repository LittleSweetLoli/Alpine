<?php
session_start();
$servername = "localhost";
$username = "root"; // Замените на ваше имя пользователя MySQL
$password = ""; // Замените на ваш пароль MySQL
$dbname = "resort_db"; // Имя вашей базы данных

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$newUsername = $_POST["newUsername"];
$newPassword = $_POST["newPassword"];

$sql_check = "SELECT * FROM users WHERE username='$newUsername'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo json_encode(array("success" => false, "message" => "Пользователь с таким именем уже существует."));
} else {
    $sql_insert = "INSERT INTO users (username, password) VALUES ('$newUsername', '$newPassword')";
    if ($conn->query($sql_insert) === TRUE) {
        echo json_encode(array("success" => true, "message" => "Регистрация успешна."));
    } else {
        echo json_encode(array("success" => false, "message" => "Ошибка регистрации: " . $conn->error));
    }
}

$conn->close();
?>
