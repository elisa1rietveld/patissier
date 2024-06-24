<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patisserie_enrollment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $geboortedatum = $_POST['geboortedatum'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $straatnaam = $_POST['straatnaam'];
    $postcode = $_POST['postcode'];
    $woonplaats = $_POST['woonplaats'];
    $motivatie = $_POST['motivatie'];
    $ervaring = $_POST['ervaring'];
    $hoe_gehoord = $_POST['hoe_gehoord'];
    $voorwaarden = isset($_POST['voorwaarden']) ? 1 : 0;

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["motivatiebrief"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a actual file or fake
    if (move_uploaded_file($_FILES["motivatiebrief"]["tmp_name"], $target_file)) {
        $motivatiebrief_path = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
        $uploadOk = 0;
    }

    if ($uploadOk) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO enrollments (voornaam, achternaam, geboortedatum, email, telefoonnummer, straatnaam, postcode, woonplaats, motivatie, ervaring, hoe_gehoord, motivatiebrief_path, voorwaarden) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssi", $voornaam, $achternaam, $geboortedatum, $email, $telefoonnummer, $straatnaam, $postcode, $woonplaats, $motivatie, $ervaring, $hoe_gehoord, $motivatiebrief_path, $voorwaarden);

        if ($stmt->execute()) {
            echo "New record created successfully";
            // Redirect to thank you page
            header('Location: form.php?status=success');
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
