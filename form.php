<?php
include_once "header.php"
/*
verwijder dit als je er last van hebt!!
wel aub weer toevoegen als je gaat pushen :)
*/
?>
<link rel="stylesheet" href="css/form.css">
<title>Inschrijven voor de Patisserieopleiding</title>
</head>

<body>
    <?php include_once 'navbar.php'; ?>
    <div class="bg">
    </div>
    <main>
        <form action="/verzend-inschrijving" method="post" enctype="multipart/form-data">
            <h1>Inschrijven voor de Patisserieopleiding</h1>

            <?php if (isset($_GET['status']) && $_GET['status'] == 'success') : ?>
                <p class="success">Je inschrijving is succesvol verstuurd!</p>
            <?php endif; ?>

            <fieldset>
                <legend>Persoonlijke Gegevens</legend>
                <label for="voornaam">Voornaam:</label>
                <input type="text" id="voornaam" name="voornaam" required>

                <label for="achternaam">Achternaam:</label>
                <input type="text" id="achternaam" name="achternaam" required>

                <label for="geboortedatum">Geboortedatum:</label>
                <input type="date" id="geboortedatum" name="geboortedatum" required>

                <label for="email">E-mailadres:</label>
                <input type="email" id="email" name="email" required>

                <label for="telefoonnummer">Telefoonnummer:</label>
                <input type="tel" id="telefoonnummer" name="telefoonnummer" required>
            </fieldset>

            <fieldset>
                <legend>Adresgegevens</legend>
                <label for="straatnaam">Straatnaam en huisnummer:</label>
                <input type="text" id="straatnaam" name="straatnaam" required>

                <label for="postcode">Postcode:</label>
                <input type="text" id="postcode" name="postcode" required>

                <label for="woonplaats">Woonplaats:</label>
                <input type="text" id="woonplaats" name="woonplaats" required>
            </fieldset>

            <fieldset>
                <legend>Opleidingsinformatie</legend>
                <label for="motivatie">Waarom wil je de patisserieopleiding volgen?</label>
                <textarea id="motivatie" name="motivatie" rows="4" required></textarea>

                <label for="ervaring">Heb je eerdere ervaring in de patisserie of horeca?</label>
                <textarea id="ervaring" name="ervaring" rows="4" required></textarea>

                <label for="hoe_gehoord">Hoe heb je over onze opleiding gehoord?</label>
                <select id="hoe_gehoord" name="hoe_gehoord" required>
                    <option value="internet">Internet</option>
                    <option value="vrienden_familie">Vrienden/Familie</option>
                    <option value="social_media">Social Media</option>
                    <option value="andere">Andere</option>
                </select>
            </fieldset>

            <fieldset>
                <legend>Bijlagen</legend>

                <label for="motivatiebrief">Voeg een motivatiebrief toe:</label>
                <input type="file" id="motivatiebrief" name="motivatiebrief" accept=".pdf, .doc, .docx" required>

            </fieldset>

            <fieldset>
                <legend>Voorwaarden en Privacy</legend>
                <input type="checkbox" id="voorwaarden" name="voorwaarden" required>
                <label for="voorwaarden">Ik ga akkoord met de algemene voorwaarden en het privacybeleid.</label>
            </fieldset>

            <input type="submit" value="Inschrijven">
        </form>
    </main>

    <?php
    include_once "footer.php"
    ?>
</body>

</html>