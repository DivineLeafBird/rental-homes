// Slider script
var currentSlide = 0;
var slides = document.querySelectorAll(".slider img");
var dots = document.querySelectorAll(".dot");

function showSlide(n) {
    // Hide all slides
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.opacity = 0;
    }

    // Set current slide
    currentSlide = (n + slides.length) % slides.length;

    // Show current slide
    slides[currentSlide].style.opacity = 1;

    // Update pagination dots
    for (var i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
    }
    dots[currentSlide].classList.add("active");
}

showSlide(currentSlide);

// Automatic slide show
var interval = setInterval(function () {
    showSlide(currentSlide + 1);
}, 10000);

// Pause slide show on mouse hover
var slider = document.querySelector(".slider");
slider.addEventListener("mouseover", function () {
    clearInterval(interval);
});

// Resume slide show on mouse out
slider.addEventListener("mouseout", function () {
    interval = setInterval(function () {
        showSlide(currentSlide + 1);
    }, 10000);
});

// Pagination dots click event
for (var i = 0; i < dots.length; i++) {
    dots[i].addEventListener("click", function () {
        showSlide(Array.prototype.indexOf.call(dots, this));
    });
}





function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}


function profiledrop() {
    var dropdown = document.getElementById("profileDropdown");
    if (dropdown.style.display === "none") {
        dropdown.style.display = "block";
    } else {
        dropdown.style.display = "none";
    }
}

function notifications() {
    var dropdowns = document.getElementById("notificationDropdown");
    if (dropdowns.style.display === "none") {
        dropdowns.style.display = "block";
    } else {
        dropdowns.style.display = "none";
    }
}


function filterhide() {

    document.getElementById("filter-1").style.display = 'none';
    document.getElementById("filter-2").style.display = 'inline';
}
function filterhide1() {

    document.getElementById("filter-1").style.display = 'inline';
    document.getElementById("filter-2").style.display = 'none';
}

function communitypost() {
    var dropdown = document.getElementById("communityDropdown");
    if (dropdown.style.display === "none") {
        dropdown.style.display = "block";
    } else {
        dropdown.style.display = "none";
    }
}