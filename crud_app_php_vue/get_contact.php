<?php
require './database/connection.php';

$id = ($_GET['id'] !== null) ? $_GET['id'] : false;


// Delete contact
$query = "SELECT * FROM contacts WHERE id ='$id' LIMIT 1";

if ($result = mysqli_query($con, $query)) {
    $row = mysqli_fetch_assoc($result);
    $contact = [
        'name' => $row['name'],
        'tel' => $row['tel'],
        'id'  => $row['id'],
    ];
    echo json_encode($contact);
}