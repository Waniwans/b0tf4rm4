<?= session()->getFlashdata('error') ? '<p style="color:red;">'.session()->getFlashdata('error').'</p>' : '' ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/LoginStyle.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <div class="logo-container">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo">
        </div>
        <form action="<?= base_url('register-admin') ?>" method="post">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" required value="<?= old('username') ?>">
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required value="<?= old('email') ?>">
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="login-btn">REGISTER ADMIN</button>
            <div class="remember-forgot mt-3">
                <a href="<?= base_url('/login') ?>">Sudah punya akun? Login di sini</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
