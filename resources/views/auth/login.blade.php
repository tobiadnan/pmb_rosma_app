<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/auth.css">
</head>

<body>
    <div class="body"></div>
    <div class="container">
        <div class="header">
            <span class="login-text">Login</span> PMB Rosma
        </div>
        <form action="" method="post" class="login">
            <div class="mb-2 position-relative">
                <input type="email" class="form-control" placeholder=" example@email.com" name="email" id="input">
            </div>
            <div class="mb-3 position-relative">
                <input type="password" class="form-control" placeholder=" password" id="password" name="password">
                <span class="toggle-password">
                    <i class="fas fa-eye-slash"></i>
                </span>
            </div>
            <div class="position-relative">
                <button type="submit" class="btn btn-primary login-btn" id="loginButton">Masuk</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <p id="textMsg" style="color: red; display: none">Caps Lock ON !!!</p>
        </div>
        <div class="text-center mt-3">
            <div class="mb-2">
                <a href="lupa-password.html" class="form-text">Lupa Password?</a>
            </div>
            <p class="mb-0">Belum punya akun? <a class="form-text" href="register" style="color: rgb(0, 208, 255);">Daftar di sini</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and Font Awesome JS (for icons) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="js/auth.js"></script>
    <script>
        // Get the input field
        var input = document.getElementById("input");
        var password = document.getElementById("password");
        
        // Get the warning text
        var text = document.getElementById("textMsg");
        
        // When the user presses any key on the keyboard, run the function
        input.addEventListener("keyup", function(event) {
        
            // If "caps lock" is pressed, display the warning text
            if (event.getModifierState("CapsLock")) {
            text.style.display = "block";
        } else {
            text.style.display = "none"
        }
    });
        password.addEventListener("keyup", function(event) {
        
            // If "caps lock" is pressed, display the warning text
            if (event.getModifierState("CapsLock")) {
            text.style.display = "block";
        } else {
            text.style.display = "none"
        }
    });
    </script>

</body>

</html>
