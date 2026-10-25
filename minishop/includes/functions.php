<?php
declare(strict_types=1);
function e($value): string { return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function format_price($amount): string { return number_format((float) $amount, 0, ',', '.') . ' đ'; }
function query_text(string $key): string {
    $value = $_GET[$key] ?? '';
    return is_string($value) ? trim($value) : '';
}
function positive_id(string $value): ?int {
    $id = filter_var($value, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    return $id === false ? null : $id;
}
