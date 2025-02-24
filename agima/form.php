<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars(trim($_POST['email']));

        $response = array();

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $response ['status'] = 'error';
            $response ['message'] = 'Неверный формат почты';
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
        $response ['status'] = 'success';
        $response ['message'] = 'Спасибо за ваш отзыв!';
    } else {
        $response ['status'] = 'error';
        $response ['message'] = 'Ошибка при открытии файла для записи';
    }
       
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
    }


    /* fwrite($file, "Имя пользователя: $username\n");
        fwrite($file, "Электронная почта: $email\n");
        fwrite($file, "Оценка: $rating\n");
        fwrite($file, "Комментарий: $comment\n");
        fwrite($file, "----------------------\n");
        fclose($file);*/
