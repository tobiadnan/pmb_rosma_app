document.addEventListener("DOMContentLoaded", function () {
    const registerLink = document.querySelector("#register-link");
    const submenu = document.querySelector("#register-submenu");
    const routeUrl = "@routes('admin.register-table')";

    registerLink.addEventListener("click", function (event) {
        event.preventDefault();
        if (submenu.style.display === "none") {
            submenu.style.display = "block";
        } else {
            submenu.style.display = "none";
        }
    });

    document.addEventListener("click", function (event) {
        if (
            !event.target.closest("#register-link") &&
            !event.target.closest("#register-submenu")
        ) {
            if (window.location.href.includes(routeUrl)) {
                submenu.style.display = "none";
            } else {
                submenu.style.display = "block";
            }
        }
    });
});
