<article class="product-card">
    <img src="<?= e($product['image']) ?>" alt="<?= e($product['name']) ?>" width="200">
    <h3><?= e($product['name']) ?></h3>
    <p class="price"><?= format_price($product['price']) ?></p>
    <a class="btn" href="product.php?id=<?= (int) $product['id'] ?>">Xem chi tiết</a>
    <button type="button" class="btn btn-accent add-to-cart" data-id="<?= (int) $product['id'] ?>">Thêm vào giỏ</button>
</article>
