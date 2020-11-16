<?php
session_start();
$text = $_POST['text'];
$pdo = new PDO("mysql:host=localhost;dbname=my_project;","root", "root");

$sql = "SELECT * FROM my_table WHERE text = (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($task)) {
    $mess = "Запись есть в таблице";
    $_SESSION['danger'] = $mess;
    header("Location: /task_10.php");
    exit;
}





$sql = "INSERT INTO my_table(text) VALUE(:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$mess = "Запись добавлена в таблицу";
$_SESSION['success'] = $mess;


header("Location: /task_10.php");