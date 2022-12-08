<?php

include("../db/connection.php");

$itemID =  $mysqli->real_escape_string($_POST['item']);
$personID =  $mysqli->real_escape_string($_POST['person']);
$content = $mysqli->real_escape_string($_POST['content']);
$reply_to = $mysqli->real_escape_string($_POST['reply-to']);

$reply_to = $reply_to == "" ? "NULL" : $reply_to;

$sql_code = "INSERT INTO comment (personID, itemID, content, replyTo, approved) VALUES ($personID, $itemID, '$content', $reply_to, 0)";
echo $sql_code;
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
