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

// checkbox
// document.addEventListener("DOMContentLoaded", function () {
//     document
//         .querySelector("#loginButton")
//         .addEventListener("click", function (e) {
//             if (document.querySelector("#lupaPassword").checked) {
//                 e.preventDefault(); // Menghentikan aksi default dari tombol login
//                 window.location.href = "lupa-password.html"; // Arahkan ke halaman lupa password
//             } else {
//                 // Lakukan proses login (tambahkan kode login Anda di sini)
//             }
//         });
// });
