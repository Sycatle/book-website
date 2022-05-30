/* LOAD PAGE FUNCTIONS */

function loadPage() {
  initiateLight();
}

/* END LOAD PAGE FUNCTIONS */

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

var isDark;

/* LIGHT FUNCTIONS */

function initiateLight() {
  const hours = new Date().getHours();
  isDayTime = hours > 7 && hours < 19;

  if (getCookie("dark") != null) {
    setLight(getCookie("dark"));
  } else {
    setLight(!isDayTime); 
  }
}

function setLight(dark) {
  var body = document.querySelector("body");
  var brandIcon = document.getElementById("brand-icon");
  var brandText = document.getElementById("brand-text");
  
  brandIcon.setAttribute("src", "./assets/img/" + (dark ? "dark" : "light") + "/brand_icon.svg");
  brandText.setAttribute("src","./assets/img/" + (dark ? "dark" : "light") + "/brand_text.svg");
  
  body.className = dark ? "dark-mode" : "light-mode";
  isDark = dark;
  setCookie("dark", isDark);
}
// TOGGLE DARK FUNCTION
function toggleLight() {
  // SET ELEMENTS TO DARK OR LIGHT
  setLight(!isDark);
}
