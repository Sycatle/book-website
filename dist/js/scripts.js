currentTimeout = null;

function sendNotification(notification){
    currentTimeout = null;
    $(".notification-content").text(notification);
    if (!$("#notification-wrapper").hasClass("show")) $("#notification-wrapper").toggleClass("show");
    
    currentTimeout = setTimeout(function(){ $("#notification-wrapper").removeClass("show"); }, 5000);
}

function initiateLight() {
    if (getCookie("dark") == "true") {
        $("body").removeClass("light-mode");
        $("body").addClass("dark-mode");
    } else {
        $("body").removeClass("dark-mode");
        $("body").addClass("light-mode");
    }
}

function toggleLight(){
    if ($("body").hasClass("light-mode")) {
        $("body").removeClass("light-mode");
        $("body").addClass("dark-mode");
    } else {
        $("body").removeClass("dark-mode");
        $("body").addClass("light-mode");
    }
    $(".light-switch img").attr("src", $("body").hasClass("light-mode") ? "./assets/img/light/moon.png" : "./assets/img/dark/moon.png");
    sendNotification("Vous avez activé le mode " + ($("body").hasClass("dark-mode") ? "sombre" : "clair") + ".");
    setCookie("dark", $("body").hasClass("dark-mode"), 30*24*60*60);
}

function setCookie(name, value, max_age){
    let date = new Date(Date.now() + 86400000);
    date = date.toUTCString();

    document.cookie = name + "=" + value + "; max-age=" + max_age;
}

function getCookie(name) {
    // Split cookie string and get all individual name=value pairs in an array
    var cookieArr = document.cookie.split(";");
    
    // Loop through the array elements
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        
        /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
        if(name == cookiePair[0].trim()) {
            // Decode the cookie value and return
            return decodeURIComponent(cookiePair[1]);
        }
    }
    
    // Return null if not found
    return null;
}

$(document).ready(function () {
    initiateLight();

    $(".light-switch").on('click', function (event) {
        toggleLight();
    });
    $("#notification-wrapper").on('click', function (event){
        $("#notification-wrapper").removeClass("show");
    });
});

/*

// SETTINGS UP IMAGES DIRECTORY
var imagesDirectory = "assets/images/";

// INIT DARK VAR
var isDark;
var isDayTime;

// INIT MOBILE NAV BAR
var isMobileNavOpen = false;

// ON LOAD PAGE
function loadPage(){
    initLight();
}

// INIT LIGHT FUNCTION
function initLight(){
    // DAY TIME?
    const hours = new Date().getHours();
    isDayTime = hours > 6 && hours < 18;

    // SET DARK IF IT'S NOT DAY
    setDarkMode(isDayTime);
}

// TOGGLE DARK FUNCTION
function toggleDarkMode(){
    // SET ELEMENTS TO DARK OR LIGHT
    setDarkMode(!isDark);
}

// SET DARK MODE FUNCTION
function setDarkMode(dark){
// ELEMENTS GETTER
    var body = document.querySelector("body");
    var logo_icon = document.getElementById("logo-text");
    var switch_icon = document.getElementById("light-switch");
    var bg_vid = document.getElementById("background-video");
    //var mobile_nav_icon = document.getElementById("mobile-nav-icon");

    // BACKGROUND VIDEO
    bg_vid.setAttribute("src", "assets/videos/" + (dark ? "light": "dark") + "-bg.mp4");
    bg_vid.setAttribute("autoplay", "true");
    bg_vid.setAttribute("loop", "true");

    // SET ELEMENTS TO DARK
    body.className = (dark ? "light-mode" : "dark-mode");
    logo_icon.setAttribute("src", imagesDirectory + (dark ? "freehandly-black.svg" : "freehandly-white.svg"));
    switch_icon.setAttribute("src", imagesDirectory + (dark ? "sun.png": "moon.png"));
    //mobile_nav_icon.setAttribute("src", imagesDirectory + (dark ? "dark-" : "light-") + "ham" + (isMobileNavOpen ?  "-enabled.png" : "-disabled.png"));

    // SET BOOLEAN
    isDark = dark;
}

// TOGGLE MOBILE NAV FUNCTION
function toggleMobileNav(){
    var body = document.querySelector("body");
    var mobile_nav_icon = document.getElementById("mobile-nav-icon");

    isMobileNavOpen = !isMobileNavOpen;
    mobile_nav_icon.setAttribute("src", imagesDirectory + (isDark ? "dark-" : "light-") + "ham" + (isMobileNavOpen ?  "-enabled.png" : "-disabled.png"));
}

function loadMobileNav(){
    
}
*/
