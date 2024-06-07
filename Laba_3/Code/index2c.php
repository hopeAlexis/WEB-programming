<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2c</title>
    <style>
        body
        {
            background: antiquewhite;
            font-size: 20px;
            font-family: "Segoe Script", serif;
        }
    </style>
</head>
<body>
<div>
    <form action="data.php" method="post">
        <p>
            <label for="name">Имя</label>
            <input type="text" name="name" required> <br>
        </p>

        <p>
            <label for="age">Возраст</label>
            <input type="number" name="age" required> <br>
        </p>

        <p>
            <label for="salary">Зарплата</label>
            <input type="number" name="salary" required> <br>
        </p>

        <p>
            <label for="season">Любимый цвет</label>
            <input type = "color" name="color" required> <br>
        </p>

        <input type="submit" name="send_data" value="Запомнить информацию" style = "background-color: dimgrey">
    </form>

    <form action="page.php" method="post">
        <input type="submit" name="open_page" value="Открыть страницу пользователя" style = "background-color: dimgrey">
    </form>
</div>
</body>
</html>
