<?php
$pageTitle = $pageTitle ?? 'MiniShop';
$currentPage = basename($_SERVER['SCRIPT_NAME'] ?? '');
$links = ['index.php' => 'Trang chủ', 'about.php' => 'Giới thiệu', 'contact.php' => 'Liên hệ', 'cart.php' => 'Giỏ hàng', 'login.php' => 'Đăng nhập', 'register.php' => 'Đăng ký'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?> - MiniShop</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" defer></script>
</head>
<body>
<header class="site-header">
    <h1>MiniShop</h1>
    <nav class="main-nav">
    <?php foreach ($links as $url => $label): ?>
        <a href="<?= e($url) ?>"<?= $currentPage === $url ? ' class="active" aria-current="page"' : '' ?>><?= e($label) ?><?php if ($url === 'cart.php'): ?> (<span id="cart-count">0</span>)<?php endif; ?></a>
    <?php endforeach; ?>
    </nav>
</header>
<main>
