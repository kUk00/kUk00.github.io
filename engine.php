<?php

$fio = $_POST["fio"];
$email = $_POST["email"];
$phone = $_POST["phone"];

$dblocation = "localhost";
$dbname = "mbservice";
$dbuser = "root";
$dbpasswd = "";
$pdo = new PDO("mysql:host=$dblocation;dbname=$dbname", $dbuser, $dbpasswd);

// Подготовка и выполнение запроса на вставку данных
$query = "INSERT INTO request (FullName, Email, Phone) VALUES (:fio, :email, :phone)";
$statement = $pdo->prepare($query);
$statement->bindValue(':fio', $fio);
$statement->bindValue(':email', $email);
$statement->bindValue(':phone', $phone);
$statement->execute();

echo "<h1 align=center>";
// Проверка успешности выполнения запроса
if ($statement->rowCount()) {
    echo "Данные успешно добавлены в базу данных.";
} else {
    echo "Произошла ошибка при добавлении данных в базу данных.";
}
echo "</h1>";
echo "<br><form action=\"index.html\"><button id=\"btnLeave\" style=\"position: absolute;top: 50%; left:50%;transform: translate(-50%, -50%);
margin-top: 30px;
width: 200px;
height: 60px;
color: #ffff;
border: 2px solid #002dff;
background: #00a8ff;\">
                    Вернуться
                </button></form>";
?>