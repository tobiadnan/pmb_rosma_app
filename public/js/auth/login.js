function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var icon = document.querySelector(".toggle-password i");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    } else {
        passwordInput.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    }
}

var togglePassword = document.querySelector(".toggle-password");
togglePassword.addEventListener("click", togglePasswordVisibility);

// Get the input field
var input = document.getElementById("input");
var password = document.getElementById("password");

// Get the warning text
var text = document.getElementById("textMsg");

// When the user presses any key on the keyboard, run the function
input.addEventListener("keyup", function (event) {
    // If "caps lock" is pressed, display the warning text
    if (event.getModifierState("CapsLock")) {
        text.style.display = "block";
    } else {
        text.style.display = "none";
    }
});
password.addEventListener("keyup", function (event) {
    // If "caps lock" is pressed, display the warning text
    if (event.getModifierState("CapsLock")) {
        text.style.display = "block";
    } else {
        text.style.display = "none";
    }
});

setTimeout(function () {
    document.getElementById("errorAlert").remove();
}, 5000);
