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
                <h1>Admin Panel - Contacts</h1>
                <a class="logout" href="admin.php">Admin Panel</a>
            </div>
            <div class="data">
                <table>
                    <tr>
                        <th>Email</th>
                        <th>Bericht</th>
                        <th>Verzend Datum</th>
                    </tr>
                    <?php
                    include_once "db/db.php";

                    $stmt = $conn->prepare("SELECT * FROM contacts");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['bericht'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
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