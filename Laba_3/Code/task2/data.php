<?php
function redirectToHome(): void
{
    header('Location: /');
    exit();
}

if (false === isset($_POST['name'], $_POST['age'], $_POST['salary'], $_POST['color']))
{
    redirectToHome();
}

session_start();

$_SESSION["user_data"] = [ $_POST['name'], $_POST['age'], $_POST['salary'], $_POST['color'] ];

redirectToHome();