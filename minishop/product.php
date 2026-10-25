<?php
require_once __DIR__ . '/includes/bootstrap.php';
$id = positive_id(query_text('id'));
$product = false;
if ($id !== null) {
    $statement = db()->prepare('SELECT p.*, c.name AS category_name FROM products p JOIN categories c ON c.id = p.category_id WHERE p.id = :id');
    $statement->execute(['id' => $id]);
    $product = $statement->fetch();
}
if (!$product) {
    http_response_code(404);
    $pageTitle = 'Không tìm thấy sản phẩm';
    require __DIR__ . '/includes/header.php';
    echo '<h2>404 - Không tìm thấy sản phẩm</h2><p>Sản phẩm không tồn tại hoặc mã sản phẩm không hợp lệ.</p><a href="index.php">Về trang chủ</a>';
    require __DIR__ . '/includes/footer.php';
    exit;
}
$pageTitle = $product['name'];
require __DIR__ . '/includes/header.php';
?>
<article class="product-detail">
    <div class="product-image"><img src="<?= e($product['image']) ?>" alt="<?= e($product['name']) ?>" width="400"></div>
    <div class="product-info">
        <h2><?= e($product['name']) ?></h2>
        <p class="price"><?= format_price($product['price']) ?></p>
        <p><?= nl2br(e($product['description'])) ?></p>
        <table><tbody>
            <tr><th scope="row">Danh mục</th><td><a href="index.php?category=<?= (int) $product['category_id'] ?>"><?= e($product['category_name']) ?></a></td></tr>
            <tr><th scope="row">Tồn kho mẫu</th><td><?= (int) $product['stock'] ?></td></tr>
            <tr><th scope="row">Bảo hành</th><td><?= (int) $product['warranty_months'] ?> tháng</td></tr>
        </tbody></table>
        <p><button type="button" class="btn btn-accent add-to-cart" data-id="<?= (int) $product['id'] ?>">Thêm vào giỏ</button></p>
        <p id="add-message" role="status" aria-live="polite"></p>
        <a href="index.php">&laquo; Quay lại danh sách</a>
    </div>
</article>
<?php require __DIR__ . '/includes/footer.php'; ?>
