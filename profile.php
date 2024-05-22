<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit();
}
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
        <h2>Добро пожаловать, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <!-- Дополнительная информация о профиле -->
    </main>
    <footer>
        <p>&copy; 2024 Горнолыжный курорт. Все права защищены.</p>
    </footer>
</body>
</html>
