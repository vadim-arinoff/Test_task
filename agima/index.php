<!DOCTYPE html>
<html lang="ru">
<link rel="stylesheet" href="styles.css">
<head>
    <meta charset="UTF-8">
    <title>Форма обратной связи</title>
</head>
<body>
    <h2 id="form-title">Форма обратной связи</h2>
    <form action="index.php" method="post">
    <div class="form">
        <input type="text" id="username" name="username" placeholder="Имя пользователя" maxlength="15" required><br><br>
        
        <input type="email" id="email" name="email" placeholder="Электронная почта" required><br><br>
        <input type="number" id="rating" name="rating" placeholder="Оценка" min="0" max="5" required><br><br>
        
        <textarea id="comment" name="comment" placeholder="Комментарий" maxlength="200" required></textarea><br><br>
        
        <input type="submit" value="Отправить">
    </div>
    </form>

    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Неверный формат электронной почты');</script>";
    } else {
        $rating = htmlspecialchars($_POST['rating']);
        $comment = htmlspecialchars($_POST['comment']);

        $file = fopen("feedback.txt", "a");
        fwrite($file, "Имя пользователя: $username\n");
        fwrite($file, "Электронная почта: $email\n");
        fwrite($file, "Оценка: $rating\n");
        fwrite($file, "Комментарий: $comment\n");
        fwrite($file, "----------------------\n");
        fclose($file);

        echo "<script>alert('Спасибо за ваш отзыв!');</script>";
        exit();
    }
}
    ?>
</body>
</html>