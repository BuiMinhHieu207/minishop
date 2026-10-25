<?php
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Sản phẩm';
$q = query_text('q');
$categoryRaw = query_text('category');
$categoryId = $categoryRaw !== '' ? positive_id($categoryRaw) : null;
$filterError = '';
if (isset($_GET['q']) && !is_string($_GET['q'])) { $filterError = 'Từ khóa không hợp lệ.'; }
if (isset($_GET['category']) && (!is_string($_GET['category']) || ($categoryRaw !== '' && $categoryId === null))) { $filterError = 'Mã danh mục không hợp lệ.'; }
if (strlen($q) > 400) { $filterError = 'Từ khóa quá dài (tối đa 400 byte).'; }
$pdo = db();
$categories = $pdo->query('SELECT id, name FROM categories ORDER BY id')->fetchAll();
$sql = 'SELECT id, name, price, image FROM products WHERE 1=1';
$params = [];
if ($categoryId !== null) { $sql .= ' AND category_id = :category'; $params['category'] = $categoryId; }
if ($q !== '') {
    // Escape ky tu LIKE de tim tu khoa theo dung noi dung nguoi dung nhap.
    $sql .= " AND name LIKE :keyword ESCAPE '!'";
    $params['keyword'] = '%' . strtr($q, ['!' => '!!', '%' => '!%', '_' => '!_']) . '%';
}
$sql .= ' ORDER BY id';
$products = [];
if ($filterError === '') {
    $statement = $pdo->prepare($sql);
    $statement->execute($params);
    $products = $statement->fetchAll();
} else { http_response_code(400); }
require __DIR__ . '/includes/header.php';
?>
<h2>Sản phẩm MiniShop</h2>
<form action="index.php" method="get" class="catalog-filter">
    <div><label for="q">Tìm sản phẩm</label><input type="search" id="q" name="q" value="<?= e($q) ?>" placeholder="Nhập tên sản phẩm"></div>
    <div><label for="category">Danh mục</label><select name="category" id="category"><option value="">Tất cả danh mục</option>
    <?php foreach ($categories as $category): ?>
        <option value="<?= (int) $category['id'] ?>"<?= $categoryId === (int) $category['id'] ? ' selected' : '' ?>><?= e($category['name']) ?></option>
    <?php endforeach; ?>
    </select></div>
    <button class="btn" type="submit">Tìm kiếm</button><a href="index.php">Xóa bộ lọc</a>
</form>
<?php if ($filterError !== ''): ?><p class="error"><?= e($filterError) ?></p><?php else: ?>
<p>Tìm thấy <?= count($products) ?> sản phẩm.</p>
<?php endif; ?>
<p id="add-message" role="status" aria-live="polite"></p>
<?php if (!$products && $filterError === ''): ?><p>Không tìm thấy sản phẩm phù hợp. Hãy thử từ khóa hoặc danh mục khác.</p><?php endif; ?>
<div class="product-list">
<?php foreach ($products as $product) { require __DIR__ . '/includes/product-card.php'; } ?>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
