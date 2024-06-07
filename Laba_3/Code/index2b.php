<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2b</title>
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
<div id="person">
    <form action="page1.php" method="post">
        <p>
            <label for="first_name">Имя</label>
            <input type="text" name="first_name" required> <br>
        </p>

        <p>
            <label for="second_name">Фамилия</label>
            <input type="text" name="second_name" required> <br>
        </p>

        <p>
            <label for="age">Возраст</label>
            <input type="number" name="age" required><br>
        </p>

        <input type="submit" name="send_data" value="Send Data" style = "background-color: dimgrey">
    </form>

    <form action="page2.php" method="post">
        <input type="submit" name="open_page" value="Open other page" style = "background-color: dimgrey">
    </form>
</div>
</body>
</html>
