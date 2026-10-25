<?php
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Liên hệ';
require __DIR__ . '/includes/header.php';
?>

<h2>Liên hệ MiniShop</h2>
<form class="form" id="contact-form" action="contact.php" method="post">
<p><label for="contact-name">Họ và tên</label><br><input type="text" name="fullname" id="contact-name" required minlength="2"></p>
<p><label for="contact-email">Email</label><br><input type="email" name="email" id="contact-email" required></p>
<p><label for="subject">Tiêu đề</label><br><input type="text" name="subject" id="subject" required></p>
<p><label for="message">Nội dung</label><br><textarea name="message" id="message" rows="5" required aria-describedby="contact-error"></textarea><span class="error" id="contact-error" role="alert"></span></p>
<p><button type="submit" class="btn">Gửi</button></p>
<p id="contact-result" role="status"></p>
</form>
    
<?php require __DIR__ . '/includes/footer.php'; ?>
