<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="..\template\style\style.css">
</head>

<body>

    <body>
        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <div class="header__title">TODO List</div>
                </div> <!-- /.header__inner -->
            </div> <!-- /.container -->
        </header> <!-- /.header -->

        <section class="login">
            <div class="container">
            <?php if (isset($errors) and is_array($errors)): ?>
                <?php foreach ($errors as $error) : ?>
            <div class="error__msg"><?= $error; ?></div>
                <?php endforeach; ?>
                <?php endif; ?>
                <form action="" method="POST">
                    <h3>Авторизация</h3>
                    <div class="form__group">
                        <label for="username">Логин</label>
                        <input type="text" name="username" id="username" required>
                        <label for="token">Токен</label>
                        <input type="text" name="token" id="token">
                    </div>
                    <div class="submit__block">
                        <input type="submit" value="Войти" name="submit">
                    </div>
                </form>
            </div>
        </section>
    </body>

</html>