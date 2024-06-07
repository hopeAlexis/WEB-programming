<?php
function redirectToHome(): void  {
    header('Location: ../index.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require(__DIR__ . '/../config/db_connection/db_connect.php');

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

    try {
        $pdo = connectToDatabase();

        $stmt = $pdo->prepare("INSERT INTO web.ad (email, category, title, description, created) VALUES (:email, :category, :title, :description, NOW())");

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);

        $stmt->execute();
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
        exit();
    }

    redirectToHome();
}