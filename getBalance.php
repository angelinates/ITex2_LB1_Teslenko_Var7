<?php
require_once "connection.php";

try {
    $stmt = $connection->prepare("SELECT balance, name FROM client WHERE balance < 0");
    $stmt->execute();    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $item){
        echo "Ім'я: " . $item["name"] . " рахунок: " . $item["balance"];
    }
} catch(PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
}
?>