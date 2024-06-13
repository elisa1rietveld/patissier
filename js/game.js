const game = document.getElementById('game');
const canvas = document.getElementById('gameCanvas');
canvas.width = game.clientWidth;
canvas.height = game.clientHeight;
const ctx = canvas.getContext('2d');

const timerText = document.getElementById('timer');
const scoreText = document.getElementById('score');
const confirmButton = document.getElementById('confirm-button');
const resetButton = document.getElementById('reset-button');
const selectedCakesDiv = document.getElementById('selected-cakes');
const animateDiv = document.getElementById('animate');

const startButton = document.getElementById('start-button');
const pauseButton = document.getElementById('pause-button');
const againButton = document.getElementById('again-button');

const endGameDiv = document.getElementById('end-game');

let score = 0;
let timeLeft = 30;
let selectedCakes = [];
let gameInterval;
let timerInterval;
let hoveredCakeId = null;
let canPlay = true;

let totalProduct = 0;
let totalCustomer = 0;
let totalGood = 0;
let totalBad = 0;



const cakes = [
    // { id: 1, name: "Cake 1", image: "img/game/cakes/chocolate_cake.png", x: 100, y: canvas.height - 250, width: 100, height: 100, scale: 1 },
    // { id: 2, name: "Cake 2", image: "img/game/cakes/jell-o_cake.png", x: 300, y: canvas.height - 250, width: 100, height: 100, scale: 1 },
    // { id: 3, name: "Cake 3", image: "img/game/cakes/bubblegum_cake.png", x: 500, y: canvas.height - 250, width: 100, height: 100, scale: 1 },
    // { id: 4, name: "Cake 4", image: "img/game/cakes/brownie_cake.png", x: 700, y: canvas.height - 250, width: 100, height: 100, scale: 1 },
    { id: 1, name: "Bundt", image: "img/game/bakeds/Bundt.png", x: 60, y: canvas.height - 200, width: 80, height: 80, scale: 1 },
    { id: 2, name: "Charlotte", image: "img/game/bakeds/Charlotte.png", x: 200, y: canvas.height - 200, width: 80, height: 80, scale: 1 },
    { id: 3, name: "ChocolateCake", image: "img/game/bakeds/ChocolateCake.png", x: 340, y: canvas.height - 200, width: 80, height: 80, scale: 1 },
    { id: 4, name: "CranScone", image: "img/game/bakeds/CranScone.png", x: 480, y: canvas.height - 200, width: 80, height: 80, scale: 1 },
    { id: 5, name: "BlueScone", image: "img/game/bakeds/BlueScone.png", x: 620, y: canvas.height - 200, width: 80, height: 80, scale: 1 },
    // Bottom row
    { id: 6, name: "Eclair", image: "img/game/bakeds/Eclair.png", x: 60, y: canvas.height - 100, width: 80, height: 80, scale: 1 },
    { id: 7, name: "Melon", image: "img/game/bakeds/Melon.png", x: 200, y: canvas.height - 100, width: 80, height: 80, scale: 1 },
    { id: 8, name: "PinkCake", image: "img/game/bakeds/PinkCake.png", x: 340, y: canvas.height - 100, width: 80, height: 80, scale: 1 },
    { id: 9, name: "Tiramisu", image: "img/game/bakeds/Tiramisu.png", x: 480, y: canvas.height - 100, width: 80, height: 80, scale: 1 },
];

const cakeImages = {};
cakes.forEach((cake) =>
{
    const cakeImage = new Image();
    cakeImage.src = cake.image;
    cakeImages[ cake.id ] = cakeImage;
})

const getRandomCakes = () =>
{
    let selected = [];
    const count = Math.floor(Math.random() * 4) + 1;
    while (selected.length < count)
    {
        let randomCake = cakes[ Math.floor(Math.random() * cakes.length) ];
        if (!selected.includes(randomCake))
        {
            selected.push(randomCake);
        }
    }
    return selected;
}

const customers = [
    { id: 1, name: "Customer 1", image: "img/game/customers/Customer1.png" },
    { id: 2, name: "Customer 2", image: "img/game/customers/Customer2.png" },
    { id: 3, name: "Customer 3", image: "img/game/customers/Customer3.png" },
    { id: 4, name: "Customer 4", image: "img/game/customers/Customer4.png" },
    { id: 5, name: "Customer 5", image: "img/game/customers/Customer5.png" },
    { id: 6, name: "Customer 6", image: "img/game/customers/Customer6.png" },
    { id: 7, name: "Customer 7", image: "img/game/customers/Customer7.png" },
    { id: 8, name: "Customer 8", image: "img/game/customers/Customer8.png" },
    { id: 9, name: "Customer 9", image: "img/game/customers/Customer9.png" },
    { id: 10, name: "Customer 10", image: "img/game/customers/Customer10.png" },
    { id: 11, name: "Customer 11", image: "img/game/customers/Customer11.png" },
    { id: 12, name: "Customer 12", image: "img/game/customers/Customer12.png" },
    { id: 13, name: "Customer 13", image: "img/game/customers/Customer13.png" },
    { id: 14, name: "Customer 14", image: "img/game/customers/Customer14.png" },
    { id: 15, name: "Customer 15", image: "img/game/customers/Customer15.png" },
    { id: 16, name: "Customer 16", image: "img/game/customers/Customer16.png" },
    { id: 17, name: "Customer 17", image: "img/game/customers/Customer17.png" },
    { id: 18, name: "Customer 18", image: "img/game/customers/Customer18.png" },
    { id: 19, name: "Customer 19", image: "img/game/customers/Customer19.png" },
    { id: 20, name: "Customer 20", image: "img/game/customers/Customer20.png" },
    { id: 21, name: "Customer 21", image: "img/game/customers/Customer21.png" },
]

const customerImages = {};
customers.forEach((customer) =>
{
    const customerImage = new Image();
    customerImage.src = customer.image;
    customerImages[ customer.id ] = customerImage;
})

let currentCustomer = {
    id: customers[ Math.floor(Math.random() * customers.length) ].id,
    x: -100,
    y: canvas.height - 535,
    width: 330,
    height: 330,
    requestedCakes: getRandomCakes(),
    speed: Math.floor(Math.random() * 3) + 3,
}

let backgroundImage = new Image();
backgroundImage.src = 'img/game/background.png';

let counterImage = new Image();
counterImage.src = 'img/game/counter.png';

const startGame = () =>
{
    gameInterval = setInterval(updateGame, 1000 / 60);
    timerInterval = setInterval(updateTimer, 1000);
}

const updateGame = () =>
{
    // ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawBackground();
    drawCustomer();
    drawCakes();
    drawRequestedCakes();

    if (currentCustomer.x < canvas.width / 2 - currentCustomer.width / 2)
    {
        currentCustomer.x += currentCustomer.speed;
    }
    // else if (timeLeft < 5)
    // {
    //     currentCustomer.x -= 2;
    // }
}

const drawBackground = () =>
{
    ctx.drawImage(backgroundImage, 0, 0, canvas.width, canvas.height);

    ctx.drawImage(counterImage, 0, 0, canvas.width, canvas.height);
}

const drawCustomer = () =>
{
    // const customerImage = new Image();
    // customerImage.src = currentCustomer.image;
    // customerImage.onload = () =>
    // {
    //     ctx.drawImage(customerImage, currentCustomer.x, currentCustomer.y, currentCustomer.width, currentCustomer.height);
    // }
    ctx.drawImage(customerImages[ currentCustomer.id ], currentCustomer.x, currentCustomer.y, currentCustomer.width, currentCustomer.height);

}

const drawCakes = () =>
{
    cakes.forEach((cake) =>
    {
        // const cakeImage = new Image();
        // cakeImage.src = cake.image;
        // cakeImage.onload = () =>
        // {
        //     ctx.drawImage(cakeImage, cake.x, cake.y, 100, 100);
        // }
        // if (cake.id === hoveredCakeId)
        // {
        //     ctx.drawImage(cakeImages[ cake.id ], cake.x - 10, cake.y - 10, cake.width + 20, cake.height + 20); // Büyütülmüş hali
        // } else
        // {
        //     ctx.drawImage(cakeImages[ cake.id ], cake.x, cake.y, cake.width, cake.height);
        // }
        // ctx.drawImage(cakeImages[ cake.id ], cake.x, cake.y, 100, 100);
        // Calculate the target scale
        let targetScale = cake.id === hoveredCakeId ? 1.2 : 1;
        cake.scale += (targetScale - cake.scale) * 0.1;

        // Calculate the new size and position
        let width = cake.width * cake.scale;
        let height = cake.height * cake.scale;
        let x = cake.x - (width - cake.width) / 2;
        let y = cake.y - (height - cake.height) / 2;

        ctx.drawImage(cakeImages[ cake.id ], x, y, width, height);
    });
}

const drawRequestedCakes = () =>
{
    if (currentCustomer.x < canvas.width / 2 - currentCustomer.width / 2) return;

    let bubbleX = currentCustomer.x + currentCustomer.width + 20;
    let bubbleY = currentCustomer.y + 10;
    let bubbleWidth = 150;
    let bubbleHeight = 60 * currentCustomer.requestedCakes.length + 30;
    // let bubbleHeight = currentCustomer.requestedCakes.length === 1 ? 115 : (90 * currentCustomer.requestedCakes.length);

    // Draw thought bubble
    ctx.beginPath();
    ctx.moveTo(bubbleX, bubbleY + 20);
    ctx.lineTo(bubbleX + bubbleWidth, bubbleY + 20);
    ctx.quadraticCurveTo(bubbleX + bubbleWidth + 10, bubbleY + 20, bubbleX + bubbleWidth + 10, bubbleY + 30);
    ctx.lineTo(bubbleX + bubbleWidth + 10, bubbleY + bubbleHeight - 10);
    ctx.quadraticCurveTo(bubbleX + bubbleWidth + 10, bubbleY + bubbleHeight, bubbleX + bubbleWidth, bubbleY + bubbleHeight);
    ctx.lineTo(bubbleX, bubbleY + bubbleHeight);
    ctx.quadraticCurveTo(bubbleX - 10, bubbleY + bubbleHeight, bubbleX - 10, bubbleY + bubbleHeight - 10);
    ctx.lineTo(bubbleX - 10, bubbleY + 30);
    ctx.quadraticCurveTo(bubbleX - 10, bubbleY + 20, bubbleX, bubbleY + 20);
    ctx.closePath();
    ctx.fillStyle = 'white';
    ctx.fill();
    ctx.stroke();

    // // Draw connecting dots
    // ctx.beginPath();
    // ctx.arc(bubbleX - 5, bubbleY + bubbleHeight - 10, 5, 0, Math.PI * 2);
    // ctx.arc(bubbleX - 15, bubbleY + bubbleHeight - 30, 3, 0, Math.PI * 2);
    // ctx.fill();


    // let offsetX = currentCustomer.x + currentCustomer.width + 20;
    // let offsetY = currentCustomer.y;

    // center the cakes in the bubble
    let offsetX = bubbleX + 40;
    let offsetY = bubbleY + 25;
    currentCustomer.requestedCakes.forEach((cake) =>
    {
        // const cakeImage = new Image();
        // cakeImage.src = cake.image;
        // cakeImage.onload = () =>
        // {
        //     ctx.drawImage(cakeImage, offsetX, offsetY, 50, 50);
        //     offsetX += 60;
        // }
        ctx.drawImage(cakeImages[ cake.id ], offsetX, offsetY, 60, 60);
        // offsetX += 60;
        offsetY += 60;

    })
}

const updateTimer = () =>
{
    timeLeft--;
    timerText.textContent = timeLeft;
    if (timeLeft < 0)
    {
        gameOver();
    }
}

const updateSelectedCakesDisplay = () =>
{
    selectedCakesDiv.innerHTML = '';
    selectedCakes.forEach((id) =>
    {
        let cake = cakes.find((cake) => cake.id === id);
        if (cake)
        {
            const cakeImage = document.createElement('img');
            cakeImage.src = cake.image;
            cakeImage.width = 65;
            cakeImage.height = 65;
            selectedCakesDiv.appendChild(cakeImage);
        }
    });
}

var timer;

const checkSelection = () =>
{
    if (selectedCakes.length > 0)
    {
        clearTimeout(timer);

        let correct = true;
        // currentCustomer.requestedCakes.forEach((cake) =>
        // {
        //     if (!selectedCakes.includes(cake.id))
        //     {
        //         correct = false;
        //     }
        // });

        if (selectedCakes.length > currentCustomer.requestedCakes.length)
        {
            correct = false;
        } else
        {
            correct = currentCustomer.requestedCakes.every((cake) => selectedCakes.includes(cake.id));
        }

        if (correct)
        {
            score += 10;
            timeLeft += 5;
            totalGood++;
            totalProduct += selectedCakes.length;
            totalCustomer++;

            animateDiv.classList.add('animateCorrect');
            updateTimer();
            timer = setTimeout(() =>
            {
                console.log("Worked");
                animateDiv.classList.remove('animateCorrect');
                clearTimeout(timer);
            }, 300);
        }
        else
        {
            score -= 5;
            totalBad++;
            animateDiv.classList.add('animateWrong');
            timer = setTimeout(() =>
            {
                console.log("Worked");
                animateDiv.classList.remove('animateWrong');
                clearTimeout(timer);
            }, 300);
        }


        scoreText.textContent = score;
        selectedCakes = [];
        updateSelectedCakesDisplay();
        currentCustomer = {
            id: customers[ Math.floor(Math.random() * customers.length) ].id,
            x: -100,
            y: canvas.height - 535,
            width: 330,
            height: 330,
            requestedCakes: getRandomCakes(),
            speed: Math.floor(Math.random() * 3) + 3,
        }
    }
}

const restartGame = () =>
{
    score = 0;
    timeLeft = 30;
    selectedCakes = [];
    hoveredCakeId = null;
    totalProduct = 0;
    totalCustomer = 0;
    totalGood = 0;
    totalBad = 0;

    endGameDiv.classList.remove('show');
    scoreText.textContent = score;
    timerText.textContent = timeLeft;
    updateSelectedCakesDisplay();
    currentCustomer = {
        id: customers[ Math.floor(Math.random() * customers.length) ].id,
        x: -100,
        y: canvas.height - 535,
        width: 330,
        height: 330,
        requestedCakes: getRandomCakes(),
        speed: Math.floor(Math.random() * 3) + 3,
    }


    startGame();
}

const gameOver = () =>
{
    clearInterval(gameInterval)
    clearInterval(timerInterval)
    endGameDiv.classList.add('show');
    document.getElementById('final-score').textContent = score;
    document.getElementById('best-score').textContent = localStorage.getItem('bestScore') || score;
    document.getElementById('customer-sold').textContent = totalCustomer;
    document.getElementById('total-product').textContent = totalProduct;
    document.getElementById('total-good').textContent = totalGood;
    document.getElementById('total-bad').textContent = totalBad;

    if (score > localStorage.getItem('bestScore'))
    {
        localStorage.setItem('bestScore', score);
    }


    // alert('Game Over! Score: ' + score);

    // Restart Game
    // setTimeout(() =>
    // {
    //     score = 0;
    //     timeLeft = 30;
    //     selectedCakes = [];
    //     scoreText.textContent = score;
    //     timerText.textContent = timeLeft;
    //     updateSelectedCakesDisplay();
    //     currentCustomer = {
    //         id: customers[ Math.floor(Math.random() * customers.length) ].id,
    //         x: -100,
    //         y: canvas.height - 786,
    //         width: 500,
    //         height: 500,
    //         requestedCakes: getRandomCakes(),
    //         speed: Math.floor(Math.random() * 3) + 3,
    //     }
    //     startGame();
    // }, 2000);
}

againButton.addEventListener('click', restartGame);

canvas.addEventListener('click', (e) =>
{
    if (!canPlay) return;

    const x = e.offsetX;
    const y = e.offsetY;

    cakes.forEach((cake) =>
    {
        if (x > cake.x && x < cake.x + 100 && y > cake.y && y < cake.y + 100)
        {
            if (!selectedCakes.includes(cake.id) && selectedCakes.length < 6)
            {
                selectedCakes.push(cake.id);
            } else
            {
                selectedCakes = selectedCakes.filter((id) => id !== cake.id)
            }
        }
    });

    updateSelectedCakesDisplay();
});

canvas.addEventListener('mousemove', function (event)
{
    if (!canPlay) return;

    const x = event.offsetX;
    const y = event.offsetY;

    let foundHoveredCake = false;
    cakes.forEach(cake =>
    {
        if (x > cake.x && x < cake.x + cake.width && y > cake.y && y < cake.y + cake.height)
        {
            hoveredCakeId = cake.id;
            foundHoveredCake = true;
        }
    });

    if (!foundHoveredCake)
    {
        hoveredCakeId = null;
    }

    // Change cursor style
    canvas.style.cursor = foundHoveredCake ? 'pointer' : 'default';
});

confirmButton.addEventListener('click', () =>
{
    if (!canPlay) return;

    checkSelection();
});

resetButton.addEventListener('click', () =>
{
    if (!canPlay) return;

    selectedCakes = [];
    updateSelectedCakesDisplay();
})

window.addEventListener('resize', () =>
{
    canvas.width = game.clientWidth;
    canvas.height = game.clientHeight;
});

// startGame();

startButton.addEventListener('click', () =>
{
    startGame();
    startButton.parentElement.parentElement.remove();
});

pauseButton.addEventListener('click', () =>
{
    if (canPlay)
    {
        clearInterval(gameInterval);
        clearInterval(timerInterval);
    }
    else
    {
        gameInterval = setInterval(updateGame, 1000 / 60);
        timerInterval = setInterval(updateTimer, 1000);
    }
    canPlay = !canPlay;
    pauseButton.innerHTML = canPlay ? '<i class="fa-solid fa-pause"></i>' : '<i class="fa-solid fa-play"></i>';
});

