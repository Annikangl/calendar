<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="template\style\style.css">
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
        <?php foreach ($taskList as $task) : ?>
            <div class="task__item">
                <div class="task__header">
                    <h2 class="task__title"><a href="task/<?= $task['id']; ?> "><?= $task['title'] ?></a></h2>
                    <div class="start__date"><?= $task['created_date'];?></div> -
                    <div class="end__date"><?= $task['end_date']; ?></div>
                </div>
                <div class="task__text">
                    <p><?= $task['text']; ?></p>
                </div>
               
                <div class="task__btn">
                    <a href="#" class="task__update">Редактировать</a>
                    <a href="task/delete/<?= $task['id'];?> " class="task__delete">Удалить</a>
                </div>
        </div>
        <?php endforeach; ?>

        
    </section>

    <div class="pagination__nav">
        <div class="container">
            <div class="pagination__inner">
            <?php echo $pagination->get(); ?>
            </div>
        
        </div>
    </div>
    

</body>

</html>