//
<?php
require './database/connection.php';
// Get the posted data.
$data = file_get_contents("php://input");

if (isset($data) && !empty($data)) {

    $request = json_decode($data);

    $query = "INSERT INTO contacts (name,tel) VALUES ('$request->nom','$request->tel')";

    if (mysqli_query($con, $query)) {
        $contact = [
            'name' => $request->nom,
            'tel' => $request->tel,
            'id'    => mysqli_insert_id($con)
        ];
        echo json_encode($contact);
    } else {
        echo mysqli_error($con);
    }
}