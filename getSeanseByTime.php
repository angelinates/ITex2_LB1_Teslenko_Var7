<?php
require_once "connection.php";

$start_time = $_GET["start_time"];
$end_time = $_GET["end_time"];

if($start_time && $end_time){
    try {
        $sql = "SELECT start, stop FROM seanse WHERE start >= :start AND stop <= :end";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(":start", $start_time);
        $stmt->bindParam(":end", $end_time);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $item){
            echo "Початок сеансу: " . $item["start"] . " - кінець сеансу: " . $item["stop"] . "<br>";
        }
    } catch(PDOException $e) {
        echo "Ошибка подключения к базе данных: " . $e->getMessage();
    }
}
else {
    echo "No start time or end time";
}
?>