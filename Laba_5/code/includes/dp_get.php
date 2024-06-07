<?php

require_once(__DIR__ . '/../config/db_connection/db_connect.php');
function redirectToHome(): void
{
    header('Location: ../index.php');
    exit();
}

$pdo = connectToDatabase();

try {
    $sql = "SELECT ID, email AS `E-mail`, title AS `Title`, description AS `Description`, category AS `Category` FROM web.ad";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (is_array($results)) {
        foreach ($results as $row) {
            echo '<tr>';
            echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
            echo "<td>" . htmlspecialchars($row['E-mail']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Category']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Description']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Title']) . "</td>";
            echo '</tr>';
        }
    } else {

        logError("No data found");
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}