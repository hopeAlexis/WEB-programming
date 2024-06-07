<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Person's data</title>
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
    <h2>Информация о пользователе:</h2>
    <?php
    function redirectToHome(): void
    {
        header('Location: /index2c.php');
        exit();
    }

    if (false === isset($_SESSION["user_data"]))
    {
        redirectToHome();
    }

    echo "<ul>";
    foreach ($_SESSION["user_data"] as $info)
    {
        echo "<li>$info";
    }
    echo "</ul>";
    ?>
</div>
</body>
</html>