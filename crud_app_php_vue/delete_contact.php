<?php

require './database/connection.php';

if(!isset($_GET['id'])){
    echo(json_encode(['error' => 'Id obligatoire']));
    exit;
}

$id = $_GET['id'];

// Delete contact
$query = "DELETE FROM contacts WHERE id ='$id' LIMIT 1";

if (mysqli_query($con, $query)) {
    $message = [
        "deleted" => true
    ];
    echo json_encode($message);
}