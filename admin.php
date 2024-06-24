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
                <h1>Admin Panel </h1>
                <a class="logout" href="admin-logout.php">Logout</a>
            </div>
            <div class="pages">
                <a href="admin-inschrijvingen.php">Inschrijvingen</a>
                <a href="admin-contacts.php">Contacts</a>
            </div>
        </div>
    </div>

    <?php
    include_once "footer.php"
    ?>
</body>

</html>