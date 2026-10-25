<?php
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Giỏ hàng';
require __DIR__ . '/includes/header.php';
?>

<h2>Giỏ hàng</h2>
<p>Bảng thực hành tính tiền với hai sản phẩm mẫu theo Lab 2.5. Số trên menu lưu riêng các lượt “Thêm vào giỏ”; bảng mẫu chưa đồng bộ với danh sách đó.</p>
<div class="table-scroll" tabindex="0" role="region" aria-label="Bảng giỏ hàng mẫu">
<table class="cart-table">
<thead><tr><th scope="col">Sản phẩm</th><th scope="col">Đơn giá</th><th scope="col">Số lượng</th><th scope="col">Thành tiền</th></tr></thead>
<tbody>
<tr data-price="250000"><td>Chuột không dây M1</td><td>250.000 đ</td><td><input type="number" class="qty" min="1" step="1" value="2" aria-label="Số lượng chuột M1"></td><td class="line-total"></td></tr>
<tr data-price="150000"><td>USB 64GB U4</td><td>150.000 đ</td><td><input type="number" class="qty" min="1" step="1" value="3" aria-label="Số lượng USB U4"></td><td class="line-total"></td></tr>
</tbody>
<tfoot><tr><th colspan="3" scope="row">Tổng cộng</th><td id="cart-total"></td></tr></tfoot>
</table></div>
<p><button type="button" class="btn btn-accent" id="checkout">Đặt hàng</button> <button type="button" class="btn" id="clear-cart">Xóa giỏ hàng</button></p>
<p id="cart-message" role="status"></p>
    
<?php require __DIR__ . '/includes/footer.php'; ?>
