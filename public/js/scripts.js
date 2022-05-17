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
    $(".light-switch img").attr("src", $("body").hasClass("light-mode") ? "./public/img/light/moon.png" : "./public/img/dark/moon.png");
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
