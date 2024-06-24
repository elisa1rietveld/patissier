<?php
include_once "header.php"
?>

<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: admin-login.php');
}

?>

<link rel="stylesheet" href="css/admin.css">
<title>Patissier - Admin Panel</title>
</head>

<body>
    <?php include_once "navbar.php"; ?>

    <div class="admin-panel">
        <div class="box">
            <div class="top-bar">
                <h1>Admin Panel - Inschrijvingen</h1>
                <a class="logout" href="admin.php">Admin Panel</a>
            </div>
            <div class="data">
                <table>
                    <tr>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Geboortedatum</th>
                        <th>Email</th>
                        <th>Telefoonnummer</th>
                        <th>Straatnaam</th>
                        <th>Postcode</th>
                        <th>Woonplaats</th>
                        <th>Motivatie</th>
                        <th>Ervaring</th>
                        <th>Hoe gehoord</th>
                        <th>Motivatiebrief</th>
                        <th>Voorwaarden</th>
                        <th>Inscrijf Datum</th>
                    </tr>
                    <?php
                    include_once "db/db.php";

                    $stmt = $conn->prepare("SELECT * FROM enrollments");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['voornaam'] . "</td>";
                        echo "<td>" . $row['achternaam'] . "</td>";
                        echo "<td>" . $row['geboortedatum'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['telefoonnummer'] . "</td>";
                        echo "<td>" . $row['straatnaam'] . "</td>";
                        echo "<td>" . $row['postcode'] . "</td>";
                        echo "<td>" . $row['woonplaats'] . "</td>";
                        echo "<td>" . $row['motivatie'] . "</td>";
                        echo "<td>" . $row['ervaring'] . "</td>";
                        echo "<td>" . $row['hoe_gehoord'] . "</td>";
                        echo "<td><a href='" . $row['motivatiebrief_path'] . "'>Download</a></td>";
                        echo "<td>" . ($row['voorwaarden'] ? 'Ja' : 'Nee') . "</td>";
                        echo "<td>" . $row['inschrijfdatum'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <?php
    include_once "footer.php"
    ?>
</body>

</html>