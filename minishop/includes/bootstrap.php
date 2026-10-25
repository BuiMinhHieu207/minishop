<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/../config/db.php';
// Ghi loi ky thuat vao log; khong hien thong tin ket noi len trang.
set_exception_handler(function (Throwable $error): void {
    error_log((string) $error);
    http_response_code(500);
    $pageTitle = 'Không thể tải dữ liệu';
    require __DIR__ . '/header.php';
    echo '<h2>Không thể tải dữ liệu</h2><p>Kiểm tra Apache/MySQL, import database/minishop.sql và cấu hình config/config.php theo README.</p>';
    require __DIR__ . '/footer.php';
});
