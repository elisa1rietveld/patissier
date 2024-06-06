// slideshow.js
document.addEventListener("DOMContentLoaded", function() {
    const images = [
        '../img/foto1.jpg',
        '../img/foto2.jpg',
        '../img/foto3.jpg',
        '../img/foto4.jpg',
        '../img/foto5.jpg'
    ];

    const slideshowContainer = document.querySelector('.slideshow');

    images.forEach((src, index) => {
        const img = document.createElement('img');
        img.src = src;
        if (index === 0) img.classList.add('active');
        slideshowContainer.appendChild(img);
    });

    let currentIndex = 0;
    setInterval(() => {
        const currentImage = slideshowContainer.querySelectorAll('img')[currentIndex];
        currentImage.classList.remove('active');
        currentIndex = (currentIndex + 1) % images.length;
        const nextImage = slideshowContainer.querySelectorAll('img')[currentIndex];
        nextImage.classList.add('active');
    }, 5000); // Change image every 5 seconds
});
