<?php
include_once "header.php"
?>

<?php
include_once "db/db.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && $password == $admin['password']) {
        $_SESSION['admin'] = $admin;
        header('Location: admin.php');
    } else {
        $error = "Gebruikersnaam of wachtwoord is onjuist!";
    }
}

?>

<link rel="stylesheet" href="css/admin.css">
<title>Patissier - Admin Login</title>
</head>

<body>
    <?php include_once "navbar.php"; ?>

    <div id="admin-login">
        <div class="box">
            <h1>Admin Login</h1>

            <?php if (isset($error)) : ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="" method="post">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <?php
    include_once "footer.php"
    ?>

</body>

</html>