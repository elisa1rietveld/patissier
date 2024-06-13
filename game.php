        <div id="game">
            <div id="start-game">
                <div class="box">
                    <h1>Patissier Game</h1>
                    <p>
                        Probeer klanten zo snel en accuraat mogelijk de producten te geven
                        die ze willen. Voor elke correcte bestelling krijg je 10 punten en 5
                        extra seconden. Elke fout kost je 5 punten. Streef naar de hoogste
                        score en laat zien hoe goed jij de patisserie runt!
                    </p>
                    <button id="start-button">Speel</button>
                </div>
            </div>
            <div id="end-game">
                <div class="box overflow">
                    <h1>Game Over</h1>
                    <p>Uw score is <span id="final-score">0</span></p>
                    <p>Uw beste score is <span id="best-score">0</span></p>
                    <div class="box small">
                        <p>
                            U hebt aan <span id="customer-sold">0</span> klanten verkocht.
                        </p>
                        <p>
                            U hebt in totaal <span id="total-product">0</span> producten
                            verkocht.
                        </p>
                        <p>
                            U hebt <span id="total-good">0</span> correcte bestellingen en
                            <span id="total-bad">0</span> foute bestellingen.
                        </p>
                    </div>

                    <button id="again-button">Speel Opnieuw</button>
                </div>
            </div>
            <div id="animate"></div>
            <div id="game-info">
                <div id="text-info">
                    <p><i class="fa-solid fa-star"></i> <span id="score">0</span></p>
                    <p><i class="fa-solid fa-clock"></i> <span id="timer">30</span></p>
                </div>
                <div id="button-info">
                    <button id="pause-button"><i class="fa-solid fa-pause"></i></button>
                </div>
            </div>
            <canvas id="gameCanvas"></canvas>
            <div id="selected-cakes" class="disable"></div>
            <div class="buttons">
                <button id="confirm-button"><i class="fa-solid fa-check"></i></button>
                <button id="reset-button"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>

        <script src="js/game.js"></script>