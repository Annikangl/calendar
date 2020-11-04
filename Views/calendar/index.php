<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="template\style\style.css">
</head>
<?php if (!isset($_SESSION['user_id'])): ?>
    <?php header("Location: user/login"); ?>
<?php endif;?>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__title">TODO List</div>
                <nav class="header__nav">
                    <a href="/calendar" class="nav-link btn">Задачи</a>
                    <a href="user/logout/" class="nav-link btn">Выйти</a>
                </nav>
            </div> <!-- /.header__inner -->
        </div> <!-- /.container -->
    </header> <!-- /.header -->
    <div class="user__info">
        <div class="container">
            <h4>Ваш API ключ: <span class="token"><?= $_SESSION['token']; ?></span></h4>
        </div>
    </div>

    <section class="task__settings">
        <div class="container">
            <div class="task__settings__inner">
            <a href="task/create" class="add__task btn">Добавить задачу</a>

            <form action="" class="interval-sort" method="GET">
                <label for="start_date">От</label>
                <input type="date" id="start_date" name="start_date">
                <label for="end_date">До</label>
                <input type="date" id="end_date" name="end_date">
                <button type="submit" name="interval-sort">Сортировать</button>
            </form>
            <div class="sort__block">
            <a href="?sort=asc" class="asc__sort">
                <img src="template\images\sort-icon.png" alt="" class="sort__icon">
                По возрастанию
            </a>
            <a href="?sort=desc" class="asc__sort">
                <img src="template\images\sort-icon.png" alt="" class="sort__icon">
                По убыванию
            </a>
            </div>

            </div>
        </div> <!-- /.container -->
    </section> <!-- /.task__settings -->

    <section class="tasks">
            <div class="container">

            <div class="task__wrapeer">

            </div>
  
            </div>
        
    </section>

    <div class="pagination__nav">
        <div class="container">
            <div class="pagination__inner">
            <?php echo $pagination->get(); ?>
            </div>
        
        </div>
    </div>
    

</body>
<script src="template/js/app.js"></script>
<script>getTasks();</script>

</html>