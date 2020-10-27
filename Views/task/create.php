<?php


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="..\template\style\style.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__title">TODO List</div>
                <nav class="header__nav">
                    <a href="/calendar" class="nav-link btn">Задачи</a>
                    <a href="#" class="nav-link btn">Выйти</a>
                </nav>
            </div> <!-- /.header__inner -->
        </div> <!-- /.container -->
    </header> <!-- /.header -->



    <section class="tasks">
        <div class="container">
            <?php if ($createTask): ?>
        <div class="success__msg">Задача успешно создана</div>
            <?php endif; ?>
            <div class="from__add">
                <form action="" method="POST">
                    <h3>Добавление новой задачи</h3>
                    <div class="form__group">
                        <label for="task-title">Название задачи</label>
                        <input type="text" name="task__title" id="task-title" required>
                        <label for="task-text">Текст</label>
                        <input type="text" name="task__text" id="task-text">

                        <label for="created-date">Дата начала: </label>
                        <input type="date" name="created__date" id="created-date">
                        <label for="end-date">Дата окончания: </label>
                        <input type="date" name="end__date" id="end-date">
                    </div>
                    <div class="submit__block">
                        <input type="submit" value="Отправить" name="submit">
                    </div>

                </form>
            </div>


    </section>


</body>

</html>