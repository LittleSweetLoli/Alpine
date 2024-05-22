<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оплата и соглашение</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Оплата и соглашение</h1>
        <nav>
            <ul>
                <li><a href="index.html">Главная</a></li>
                <!-- Добавьте другие ссылки на страницы по вашему выбору -->
            </ul>
        </nav>
    </header>
    <main>
        <section id="payment">
            <h2>Оплата и соглашение</h2>
            <?php
            // Проверяем, была ли отправлена форма
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Проверяем, согласился ли пользователь с условиями договора
                if (isset($_POST['agree'])) {
                    // Обработка оплаты (можно добавить код для обработки платежных данных)
                    // Здесь мы просто выводим сообщение об успешной оплате
                    echo "<p>Оплата прошла успешно!</p>";
                    echo "<p>Спасибо за оплату.</p>";
                } else {
                    // Если пользователь не согласился с условиями договора, выводим сообщение об ошибке
                    echo "<p style='color: red;'>Для оплаты необходимо согласиться с условиями договора.</p>";
                }
            }
            ?>
            <form action="" method="post">
                <!-- Метка и выпадающий список для выбора способа оплаты -->
                <label for="paymentMethod" class="<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agree'])) echo 'hidden'; ?>">Способ оплаты:</label>
                <select id="paymentMethod" name="paymentMethod" class="<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agree'])) echo 'hidden'; ?>" required>
                    <option value="card">Оплата картой</option>
                    <option value="qr">Оплата через QR-код</option>
                </select><br><br>

                <!-- Поля для ввода информации о платеже -->
                <!-- Дополнительные поля могут быть добавлены в зависимости от выбранного способа оплаты -->

                <!-- Чекбокс согласия с условиями договора -->
                <label for="agree" class="<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agree'])) echo 'hidden'; ?>">
                    <input type="checkbox" id="agree" name="agree" required>
                    Я соглашаюсь со всеми условиями договора.
                </label>

                <!-- Кнопка оплаты -->
                <?php
                // Если форма отправлена и оплата прошла успешно, скрываем кнопку "Оплатить"
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agree'])) {
                    echo '<button id="returnToMainBtn" onclick="redirectToMain()">Вернуться на главную</button>';
                } else {
                    echo '<input type="submit" value="Оплатить">';
                }
                ?>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Горнолыжный курорт. Все права защищены.</p>
    </footer>

    <script>
        function redirectToMain() {
            window.location.href = "index.html";
        }
    </script>
</body>
</html>
