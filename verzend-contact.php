<?php

include_once "db/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contacts (email, bericht) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $bericht);

    if ($stmt->execute()) {
        echo "New record created successfully";
        header('Location: contact.php?status=success');
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
