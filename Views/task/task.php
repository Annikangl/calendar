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
            <div class="task__item">
                <div class="task__header">
                    <h2 class="task__title"><?= $taskItem['title'];?></h2>
                    <div class="start__date"><?= $taskItem['created_date'];?></div>
                    <div class="end__date"><?= $taskItem['end_date'];?></div>
                </div>
                <div class="task__text">
                    <p><?= $taskItem['text'];?></p>
                </div>
               
                <div class="task__btn">
                    <a href="#" class="task__update">Редактировать</a>
                    <a href="#" class="task__delete">Удалить</a>
                </div>
        </div>
        </div>
    </section>
    

</body>

</html>