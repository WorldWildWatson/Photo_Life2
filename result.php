<?php
session_start();
include("functions.php");
check_session_id();
$thema_id = $_GET["thema_id"];
// var_dump($_GET);
// exit();

$pdo = connect_to_db();












// SELECT * FROM todo_table LEFT OUTER JOIN (SELECT todo_id, COUNT(id) AS cnt FROM like_table GROUP BY todo_id) AS result_table ON todo_table.id = result_table.todo_id ORDER BY cnt DESC

