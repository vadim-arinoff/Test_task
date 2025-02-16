
<?php
        require_once 'header.php';
        require 'form.php';
        require_once 'footer.php';

        error_reporting(E_ALL);
        ini_set('display_errors', 'on');
        mb_internal_encoding('UTF-8');
    ?>
   <h2 id="form-title">Форма обратной связи</h2>
    <form action="form.php" method="post">
    <div class="form">
        <input type="text" id="username" name ="username" placeholder="Имя пользователя" maxlength="15" required><br>
        <input type="email" id= "email" name ="email" placeholder="Электронная почта" required><br>
        <input type="range" id= "rating" name ="rating" placeholder="Оценка страницы" min="0" max="5" required><br>
        <textarea id="comment" name ="comment" placeholder="Комментарий" maxlength="200" required></textarea><br>
        <input type="submit" value="Отправить">
    </div>
    </form>
