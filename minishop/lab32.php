<?php
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Lab 3.2 - Mảng và foreach';
$products = require __DIR__ . '/labs/products-array.php';
require __DIR__ . '/includes/header.php';
?>
<h2>Lab 3.2: sáu sản phẩm từ mảng PHP</h2>
<p>Trang trung gian trước khi chuyển sang PDO. Trang chủ chính lấy dữ liệu từ MySQL.</p>
<p id="add-message" role="status"></p><div class="product-list">
<?php foreach ($products as $product) { require __DIR__ . '/includes/product-card.php'; } ?>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
