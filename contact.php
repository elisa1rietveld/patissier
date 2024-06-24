<?php
include_once "header.php"
?>
<link rel="stylesheet" href="css/form.css">
<title>Contact</title>
</head>

<body>
    <?php include_once 'navbar.php'; ?>
    <div class="bg2">
    </div>
    <main>
        <form action="verzend-contact.php" method="post">
            <h1>Contact</h1>

            <?php if (isset($_GET['status']) && $_GET['status'] == 'success') : ?>
                <p class="success">
                    Uw bericht is succesvol verstuurd!
                </p>
            <?php endif; ?>

            <label for="email">E-mail address:</label>
            <input type="email" id="email" name="email" required>

            <label for="bericht">Uw Bericht</label>
            <textarea id="bericht" name="bericht" rows="4" required></textarea>

            <input type="submit" value="Verstuur">
        </form>
    </main>

    <?php
    include_once "footer.php"
    ?>
</body>

</html>