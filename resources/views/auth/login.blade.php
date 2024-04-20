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
    @include('layout.auth-nav')

    <div class="body"></div>
    <div class="container">
        <div class="header">
            <span class="login-text">Masuk</span> PMB Rosma
        </div>
        <form action="{{ route('login.action') }}" method="post" class="login">
            @csrf
            @if ($errors->any())
                <div id="errorAlert" class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <strong class="font-bold">Error!</strong>
                            <div class="mb-0" style="font-family: 'Arial', sans-serif; font-size: 14px;">
                                @foreach ($errors->all() as $error)
                                    <span class="block sm:inline">{{ $error }}</span><br>
                                @endforeach
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="mb-2 position-relative">
                <input type="email" class="form-control" placeholder=" Email" name="email" id="input">
            </div>
            <div class="mb-3 position-relative">
                <input type="password" class="form-control" placeholder=" Password" id="password" name="password">
                <span class="toggle-password">
                    <i class="fas fa-eye-slash"></i>
                </span>
            </div>
            <div class="d-flex justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
                <div>
                    <a href="lupa-password.html" style="color: white">Lupa Password?</a>
                </div>
            </div>
            <div class="position-relative mt-2">
                <button type="submit" class="btn btn-primary login-btn" id="loginButton">Masuk</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <p id="textMsg" style="color: red; display: none">Caps Lock ON !!!</p>
        </div>
        <div class="text-center mt-3">
            <p class="mb-0">Belum punya akun? <a class="form-text" href="{{ route('register') }}"
                    style="color: rgb(0, 208, 255);">Daftar di sini</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and Font Awesome JS (for icons) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="js/auth/login.js"></script>

</body>

</html>
