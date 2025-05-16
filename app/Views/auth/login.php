<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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

        <!-- Flashdata error message -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" style="color: red; text-align: center; margin-bottom: 15px;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
            <form method="post" action="<?= base_url('login') ?>">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" name="remember"> Ingat Saya</label>
                <a href="#">Lupa Password?</a>
            </div>
            <button type="submit" class="login-btn">LOGIN</button>
        </form>
    </div>
</div>
</body>
</html>
