<?php
// Chi bat hien thi loi trong bai thuc hanh local.
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Lab 3.1 - PHP đầu tiên';
$shop = 'MiniShop';
$quantity = 2;
$price = 250000;
require __DIR__ . '/includes/header.php';
echo '<h2>' . e('Xin chào ' . $shop) . '</h2>';
echo '<p>Hai sản phẩm có tổng giá: ' . format_price($quantity * $price) . '</p>';
echo '<p>Nhấn Ctrl+U: trình duyệt nhận HTML, không nhận mã PHP nguồn.</p>';
require __DIR__ . '/includes/footer.php';
