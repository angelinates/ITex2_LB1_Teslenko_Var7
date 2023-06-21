<?php
    require_once "connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ItehLb1</title>
</head>
<body>
    <div>
        <form action="getSeanse.php">
            <p>Task1 - Отримати сеанси роботи в мережі для обраного клієнта</p>
            <select name="client" id="client">
                <?php
                    $sql = "SELECT id_client, name FROM client";
                    $stmt = $connection->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $item){
                        echo "<option value=" . $item["id_client"] . ">" . $item["name"] . "</option>";
                    }
                ?>
            </select>
            <input type="submit" value="get">
        </form>
    </div> 
    <hr>
    <div>
        <form action="getSeanseByTime.php">
            <p>Task2 - Отримати сеанси роботи в мережі за вказаний проміжок часу</p>
            <input type="time" value="07:30" name="start_time" id="start_time">
            <input type="time" value="23:01" name="end_time" id="end_time">
            <input type="submit" value="get">
        </form>
    </div>
    <hr>
    <div>
        <form action="getBalance.php">
            <p>Task3 - Отримати список клієнтів з від'ємним балансом рахунку</p>
            <input type="submit" value="get">
        </form>
    </div>
</body>
</html>