<?php
function connectToDatabase(): PDO {
    $host = 'localhost';
    $port = 6603;
    $db = 'web';
    $user = 'root';
    $pass = 'helloworld';

    $dsn = "mysql:host=$host;port=$port;dbname=$db";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Установка режима ошибок
        return $pdo;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}