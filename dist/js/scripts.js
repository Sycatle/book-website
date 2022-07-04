/* LOAD VARIABLES */

/* END LOAD VARIABLES */

/* LOAD PAGE FUNCTIONS */

document.addEventListener("DOMContentLoaded", function (event) {
  initiateLight();
});


/* END LOAD PAGE FUNCTIONS */

/* LIGHT FUNCTIONS */

var isDark;

function initiateLight() {
  const hours = new Date().getHours();
  isDayTime = hours > 7 && hours < 19;

  if (getCookie("dark") != null) {
    setLight(getCookie("dark"), true);
    return;
  } else {
    setLight(!isDayTime, false);
  }
}

function setLight(dark, cookies) {
  var body = document.querySelector("body");
  var brandIcon = document.getElementById("brand-icon");
  var brandText = document.getElementById("brand-text");
  var backgroundImage = document.getElementById("background-image");
  var lightSwitchIcon = document.getElementById("light-switch-icon");

  if (brandIcon != null)
    brandIcon.setAttribute(
      "src",
      "./assets/img/" + (dark ? "dark" : "light") + "/brand_icon.svg"
    );
  if (brandText != null)
    brandText.setAttribute(
      "src",
      "./assets/img/" + (dark ? "dark" : "light") + "/brand_text.svg"
    );
  if (backgroundImage != null)
    backgroundImage.setAttribute(
      "src",
      "./assets/img/" + (dark ? "dark" : "light") + "/home_banner.webp"
    );
  if (lightSwitchIcon != null) {
    lightSwitchIcon.setAttribute(
      "src",
      "./assets/img/" + (dark ? "sun.svg" : "moon.svg")
    );
    lightSwitchIcon.addEventListener("click", () => {toggleLight()})
  }

  body.className = dark ? "dark-mode" : "light-mode";
  isDark = dark;
  if (cookies) setCookie("dark", isDark);

  
}
// TOGGLE DARK FUNCTION
function toggleLight() {
  // SET ELEMENTS TO DARK OR LIGHT
  setLight(!isDark, true);
}


/* ---------------------------------------------------------------- */
/* COOKIES FUNCTIONS */

function setCookie(name, value) {
  let date = new Date(Date.now() + 86400000);
  date = date.toUTCString();

  document.cookie = name + "=" + value + "; max-age=30*24*60*60";
}

function getCookie(name) {
  // Split cookie string and get all individual name=value pairs in an array
  var cookieArr = document.cookie.split(";");

  // Loop through the array elements
  for (var i = 0; i < cookieArr.length; i++) {
    var cookiePair = cookieArr[i].split("=");

    /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
    if (name == cookiePair[0].trim()) {
      // Decode the cookie value and return
      return decodeURIComponent(cookiePair[1]);
    }
  }

  // Return null if not found
  return null;
}

/* END COOKIES FUNCTIONS */
/* ---------------------------------------------------------------- */