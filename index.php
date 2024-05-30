<?php
include_once "headercontact.php"
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Patissier opleiding</title>
</head>
<body>
<!-- 
  Er moet nog een slideshow background komen. hier wil ik
  fotos van een patissier. (patissier is de naam van de bakker btw, niet patissiere.)
-->

<!-- "slideshow-container">
        <div class="mySlides fade">
            <img src="https://i.imgur.com/eQkmHx9.jpg" style="width: 100vw;height: 100vh">

        </div>
        <div class="mySlides fade">

            <img src="https://i.imgur.com/QtMelqo.jpg" style="width: 100vw;height: 100vh">

        </div>
        <div class="mySlides fade">

            <img src="https://i.imgur.com/IO2tBwy.jpg" style="width: 100vw;height: 100vh">

        </div>
        <div style="text-align:center; margin:-5vh;">

            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>

        </div>
        <a class="prev" onclick="prevSlide()">&#10094;</a>
        <a class="next" onclick="showSlides()">&#10095;</a>
    </div>
-->
<!-- Content -->
<div class="pagecontent">
 <div class="container">
   <div class="box">
     Div 1
   </div>
   <div class="box">
     Div 2
   </div>
   <div class="box">
     Div 3
   </div>
 </div>

<script>
var timeOut = 2000;
        var slideIndex = 0;
        var autoOn = true;

        autoSlides();

        function autoSlides() {
            timeOut = timeOut - 20;

            if (autoOn == true && timeOut < 0) {
                showSlides();
            }
            setTimeout(autoSlides, 20);
        }

        function prevSlide() {

            timeOut = 2000;

            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slideIndex--;

            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            if (slideIndex == 0) {
                slideIndex = 3
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }

        function showSlides() {

            timeOut = 2000;

            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slideIndex++;

            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }

</script>

</body>
</html>