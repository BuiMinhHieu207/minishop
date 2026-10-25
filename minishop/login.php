<?php
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Đăng nhập';
require __DIR__ . '/includes/header.php';
?>

<h2>Đăng nhập</h2>
<p>Giao diện thực hành Buổi 2, chưa xác thực tài khoản. Chỉ dùng dữ liệu giả.</p>
<form class="form" id="login-form" action="login.php" method="post">
<p><label for="login-email">Email</label><br><input type="email" name="email" id="login-email" required></p>
<p><label for="login-password">Mật khẩu</label><br><input type="password" name="password" id="login-password" required minlength="6"></p>
<p><input type="checkbox" id="remember" name="remember" value="1"><label for="remember">Ghi nhớ đăng nhập</label></p>
<p><button class="btn" type="submit">Đăng nhập</button></p>
<p><a href="register.php">Chưa có tài khoản? Đăng ký</a></p>
<p id="login-message" role="status"></p>
</form>
    
<?php require __DIR__ . '/includes/footer.php'; ?>
