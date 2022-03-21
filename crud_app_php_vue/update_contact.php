<?php
require './database/connection.php';

// Get the posted data.
$data = file_get_contents("php://input");

if (isset($data) && !empty($data)) {
    $request = json_decode($data);

    $query = "UPDATE contacts SET name='$request->nom',tel='$request->tel' WHERE id = '$request->id'";

    if (mysqli_query($con, $query)) {
        $contact = [
            'name' => $request->nom,
            'tel' => $request->tel,
            'id'    => $request->id
        ];
        echo json_encode($contact);
    }
}