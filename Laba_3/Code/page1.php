<?php
function redirectToHome(): void
{
    header('Location: /');
    exit();
}

if (false === isset($_POST['first_name'], $_POST['second_name'], $_POST['age']))
{
    redirectToHome();
}

session_start();

$_SESSION["first_name"] = $_POST['first_name'];
$_SESSION["second_name"] = $_POST['second_name'];
$_SESSION["age"] = $_POST['age'];

redirectToHome();