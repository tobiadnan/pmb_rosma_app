<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/auth.css">
</head>

<body>
    @include('layout.auth-nav')
    <div class="body"></div>
    <div class="container">
        <div class="header">
            <span class="register-text">Buat Akun</span>
        </div>
        <form action="{{ route('register.save') }}" method="post" class="login">
            @csrf
            <div class="mb-2 position-relative">
                <label for="nama" hidden></label>
                <input type="text" class="form-control" placeholder="Nama" name="nama">
                @error('nama')
                    <span class="text-red-600 mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2 position-relative">
                <label for="email" hidden></label>
                <input type="email" class="form-control" placeholder="Email" name="email">
                @error('email')
                    <span class="text-red-600 mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 position-relative">
                <label for="password" hidden></label>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                <span class="toggle-password">
                    <i class="fas fa-eye-slash"></i>
                </span>
                @error('password')
                    <span class="text-red-600 mt-2">{{ $message }}</span>
                @enderror
            </div>
            {{-- <div class="mb-3 position-relative">
                <label for="confirm-password" hidden></label>
                <input type="password" class="form-control" placeholder="Confirm Password" id="confirm-password" name="confirm-password">
            </div> --}}
            <div class="position-relative">
                <button type="submit" class="btn btn-primary register-btn">Buat Akun</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <p id="textMsg" style="color: red; display: none">Caps Lock ON !!!</p>
        </div>
        <div class="text-center mt-3">
            <p class="mb-0">Sudah punya akun? <a class="form-text" href="{{ route('login') }}"
                    style="color: rgb(0, 208, 255);">Masuk di sini</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and Font Awesome JS (for icons) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/auth.js"></script>
    <script>
        // Get the input field
        var password = document.getElementById("password");

        // Get the warning text
        var text = document.getElementById("textMsg");

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
