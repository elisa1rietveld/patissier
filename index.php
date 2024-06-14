<?php
include_once "header.php"
/*
    verwijder dit als je er last van hebt!!
    wel aub weer toevoegen als je gaat pushen :)
    */
?>

<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/slideshow.css">
<title>Patissier</title>
<!-- Title mag veranderen -->
</head>

<body>
    <?php include_once "navbar.php"; ?>

    <div class="image-container">
        <div class="slideshow"></div> <!-- Slideshow div -->
        <div class="pagecontent">
            <div class="container">
                <div class="box open-dagen">
                    <div class="text">Open Dagen & voorlichting</div>
                </div>
                <div class="box opleidingen">
                    <div class="text link"><a href="https://www.mboutrecht.nl/opleidingen/"
                            target="_blank">Opleidingen</a>
                    </div>
                </div>
                <div class="box opleidingen">
                    <div class="text">Zamazingo</div>
                    <!-- Veranderen -->
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once "footer.php"
    ?>

    <script src="js/slideshow.js"></script> <!-- De JavaScript voor de slideshow -->
</body>

</html>