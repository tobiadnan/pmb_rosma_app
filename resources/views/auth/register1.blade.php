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
    <div class="body"></div>
    <div class="container">
        <div class="header">
            <span class="register-text">Register</span> PMB 
        </div>
        <form action="" method="post" class="login">
            <div class="mb-2 position-relative">
                <label for="nama" hidden></label>
                <input type="text" class="form-control" placeholder="Nama" name="nama">
            </div>
            <div class="mb-2 position-relative">
                <label for="email" hidden></label>
                <input type="email" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="mb-2 position-relative">
                <label for="nohp" hidden></label>
                <input type="text" class="form-control" placeholder="no. HP" name="nohp">
            </div>
            <div class="mb-3 position-relative">
                <label for="password" hidden></label>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                <span class="toggle-password">
                    <i class="fas fa-eye-slash"></i>
                </span>
            </div>
            <div class="position-relative">
                <button type="submit" class="btn btn-primary register-btn">Register</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <p class="mb-0">Sudah punya akun? <a class="form-text" href="login" style="color: rgb(0, 208, 255);">Login di sini</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and Font Awesome JS (for icons) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/auth.js"></script>
</body>

</html>
