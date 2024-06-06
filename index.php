<?php
include_once "header.php"
    /*
    verwijder dit als je er last van hebt!!
    wel aub weer toevoegen als je gaat pushen :)
    */
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="image-container">
        <div class="slideshow"></div> <!-- Slideshow div -->
        <div class="pagecontent">
            <div class="container">
                <div class="box open-dagen">
                    <div class="text">Open Dagen & voorlichting</div>
                </div>
                <div class="box opleidingen">
                    <div class="text">Opleidingen</div>
                </div>
                <div class="box google-maps">
                    <div class="location-text">Dit is onze locatie</div> <!-- Voeg nieuwe class toe -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2452.849989008322!2d5.09961257653783!3d52.06425507194516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c665948a2073bf%3A0xb8405acd63a12ee1!2sMBO%20Utrecht!5e0!3m2!1snl!2snl!4v1717662637700!5m2!1snl!2snl"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
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