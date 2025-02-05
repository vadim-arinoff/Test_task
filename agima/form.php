<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars(trim($_POST['email']));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('Неверный формат электронной почты');</script>";
    } else {
        $rating = htmlspecialchars($_POST['rating']);
        $comment = htmlspecialchars($_POST['comment']);

        $feedback = [
            'Имя' => $username,
            'Почта' => $email,
            'Оценка' => $rating,
            'Комментарий' => $comment,
            'Дата' => date('Y-m-d H:i:s')
        ]; 
        
        $file = fopen ("feedback.txt", "a+");
        if ($file){
        $dataString = json_encode($feedback, JSON_UNESCAPED_UNICODE) . PHP_EOL;
        fwrite($file, $dataString);
        fclose($file);
        echo "<script>alert('Спасибо за ваш отзыв!'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Ошибка при открытии файла для записи.'); window.location.href = 'index.php';</script>";
    }
       
    }
    exit();
    }


    /* fwrite($file, "Имя пользователя: $username\n");
        fwrite($file, "Электронная почта: $email\n");
        fwrite($file, "Оценка: $rating\n");
        fwrite($file, "Комментарий: $comment\n");
        fwrite($file, "----------------------\n");
        fclose($file);*/