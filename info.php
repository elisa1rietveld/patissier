<?php
include_once "header.php"
/*
verwijder dit als je er last van hebt!!
wel aub weer toevoegen als je gaat pushen :)
*/
?>
<title>Patissier Opleiding</title>
<link rel="stylesheet" href="css/info.css">
<link rel="stylesheet" href="css/game.css">
</head>

<body>
    <?php include_once "navbar.php"; ?>
    <header>
        <h1>Patissier Opleiding</h1>
    </header>
    <div class="container">
        <div class="intro">
            Een patissier opleiding<br> bereidt je voor op een creatieve en uitdagende <br> carrière in de wereld van
            desserts en gebak. Hier ontdek je alles<br> wat je moet weten over deze opleiding, inclusief de vaardigheden
            die je zult<br> leren, de toelatingsvereisten, de structuur van de opleiding en <br>de carrièremogelijkheden
            na het afronden van de cursus.
        </div>

        <h2 onclick="toggleContent('vaardigheden')" class="collapsed">
            <span class="toggle-icon">-</span> Vaardigheden die je leert
        </h2>
        <div id="vaardigheden" class="content">
            <p>Tijdens een patissier opleiding leer je een breed scala aan vaardigheden, waaronder:</p>
            <ul>
                <li><strong>Basis en Geavanceerde Baktechnieken</strong>: Het begrijpen van de chemie achter bakken en
                    het maken van verschillende soorten deeg en beslag.</li>
                <li><strong>Chocoladebewerking</strong>: Technieken voor het tempereren van chocolade en het maken van
                    bonbons en chocoladedecoraties.</li>
                <li><strong>Dessertpresentatie</strong>: Het artistiek presenteren van desserts, inclusief plating en
                    garnituren.</li>
                <li><strong>Werken met suiker</strong>: Het creëren van suikerdecoraties en -sculpturen.</li>
            </ul>
        </div>

        <h2 onclick="toggleContent('toelating')" class="collapsed">
            <span class="toggle-icon">-</span> Toelatingsvereisten
        </h2>
        <div id="toelating" class="content">
            <p>De toelatingsvereisten voor een patissier opleiding kunnen variëren, maar over het algemeen heb je nodig:
            </p>
            <ul>
                <li>Een middelbareschooldiploma of gelijkwaardig.</li>
                <li>Basiskennis van voedselveiligheid en hygiëne.</li>
                <li>Een passie voor bakken en creativiteit.</li>
            </ul>
        </div>

        <h2 onclick="toggleContent('structuur')" class="collapsed">
            <span class="toggle-icon">-</span> Structuur van de Opleiding
        </h2>
        <div id="structuur" class="content">
            <p>De opleiding is meestal opgedeeld in verschillende modules, zoals:</p>
            <ul>
                <li>Theoretische lessen over ingrediënten en technieken.</li>
                <li>Praktijklessen in professionele
                </li>
        </div>

        <?php include_once 'game.php'; ?>

        <script>
        function toggleContent(id) {
            const content = document.getElementById(id);
            content.style.maxHeight = content.style.maxHeight ? null : content.scrollHeight + "px";
            const icon = content.previousElementSibling.querySelector('.toggle-icon');
            icon.textContent = icon.textContent === '-' ? '+' : '-';
            content.previousElementSibling.classList.toggle('collapsed');
        }
        </script>

        <?php
        include_once "footer.php"
        ?>
</body>

</html>