<?php 
include('../db/connection.php');

$personID =  $mysqli->real_escape_string($_POST['person-id']);
$permission_level =  $mysqli->real_escape_string($_POST['permission-level']);

$db_values = ["reader", "moderator", "employee", "admin"];
$frontend_values = ["Leitor", "Moderador", "Funcionário", "Administrador"];

$index = array_search($permission_level, $frontend_values);

if ($index == 3) {
    $index = 0;
} else {
    $index++;
}

$promote_to = $db_values[$index];

$sql_code = "UPDATE person SET permissionLevel='$promote_to' WHERE personID=$personID";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);

