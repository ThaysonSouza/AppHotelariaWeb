<?php
require_once 'configuracoes.php';
$error = false;

try {
    $connect = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    
    if($connect->connect_error){
    
    $error = true;
}
} catch (mysqli_sql_exception $error){
    $error = true;
}

?>