'use strict';
// 1. Tien ich - Lab 2.4
function formatPrice(amount) { return amount.toLocaleString('vi-VN') + ' đ'; }
function cartTotal(items) {
    let total = 0;
    for (const item of items) { total += item.price * item.qty; }
    return total;
}
// 2. Luu so luong trong trinh duyet - Lab 2.5
const CART_KEY = 'minishop_cart';
function getCart() {
    try {
        const data = JSON.parse(localStorage.getItem(CART_KEY) || '{}');
        const cart = {};
        if (data && typeof data === 'object' && !Array.isArray(data)) {
            for (const id in data) {
                if (/^[1-9][0-9]*$/.test(id) && Number.isSafeInteger(data[id]) && data[id] > 0) {
                    cart[id] = data[id];
                }
            }
        }
        return cart;
    } catch (error) { return {}; }
}
function saveCart(cart) {
    try { localStorage.setItem(CART_KEY, JSON.stringify(cart)); return true; }
    catch (error) { return false; }
}
function updateCartCount() {
    const cart = getCart();
    let count = 0;
    for (const id in cart) { count += cart[id]; }
    const badge = document.querySelector('#cart-count');
    if (badge) { badge.textContent = count; }
}
function addToCart(id) {
    const cart = getCart();
    cart[id] = (cart[id] || 0) + 1;
    const saved = saveCart(cart);
    updateCartCount();
    const message = document.querySelector('#add-message');
    if (message) { message.textContent = saved ? 'Đã thêm sản phẩm vào giỏ.' : 'Không lưu được giỏ hàng. Hãy cho phép lưu trữ trong trình duyệt.'; }
}
document.querySelectorAll('.add-to-cart').forEach(function (button) {
    button.addEventListener('click', function () { addToCart(button.dataset.id); });
});
updateCartCount();
window.addEventListener('storage', function (event) {
    if (event.key === CART_KEY || event.key === null) { updateCartCount(); }
});
// 3. Bang gio hang mau: tinh thanh tien, tong cong
function updateCartTotals(table) {
    let total = 0;
    table.querySelectorAll('tbody tr').forEach(function (row) {
        const input = row.querySelector('.qty');
        const qty = Number(input.value);
        const price = Number(row.dataset.price);
        const valid = Number.isSafeInteger(qty) && qty >= 1;
        input.setCustomValidity(valid ? '' : 'Số lượng phải là số nguyên từ 1 trở lên.');
        const lineTotal = valid ? price * qty : 0;
        row.querySelector('.line-total').textContent = valid ? formatPrice(lineTotal) : 'Số lượng không hợp lệ';
        total += lineTotal;
    });
    document.querySelector('#cart-total').textContent = formatPrice(total);
}
const cartTable = document.querySelector('.cart-table');
if (cartTable) {
    cartTable.addEventListener('input', function () { updateCartTotals(cartTable); });
    updateCartTotals(cartTable);
}
// 4. Kiem tra hai mat khau
const registerForm = document.querySelector('#register-form');
if (registerForm) {
    registerForm.addEventListener('submit', function (event) {
        const password = document.querySelector('#password');
        const password2 = document.querySelector('#password2');
        const error = document.querySelector('#password-error');
        if (password.value !== password2.value) {
            event.preventDefault();
            error.textContent = 'Hai mật khẩu không khớp nhau.';
            password2.setAttribute('aria-invalid', 'true');
            password2.focus();
        } else {
            error.textContent = '';
            password2.removeAttribute('aria-invalid');
        }
    });
}
// 5. Bai tap ve nha: xoa gio co xac nhan
const clearCart = document.querySelector('#clear-cart');
if (clearCart) {
    clearCart.addEventListener('click', function () {
        if (window.confirm('Xóa toàn bộ giỏ hàng?')) {
            try {
                localStorage.removeItem(CART_KEY);
                updateCartCount();
                document.querySelector('#cart-message').textContent = 'Đã xóa giỏ lưu trên trình duyệt. Hai dòng tính tiền mẫu vẫn được giữ để thực hành.';
            } catch (error) { document.querySelector('#cart-message').textContent = 'Không thể xóa dữ liệu lưu trữ.'; }
        }
    });
}
const contactForm = document.querySelector('#contact-form');
if (contactForm) {
    contactForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const field = document.querySelector('#message');
        const error = document.querySelector('#contact-error');
        const result = document.querySelector('#contact-result');
        result.textContent = '';
        if (field.value.trim().length < 10) {
            error.textContent = 'Nội dung phải có ít nhất 10 ký tự.';
            field.setAttribute('aria-invalid', 'true');
            field.focus();
        } else {
            error.textContent = '';
            field.removeAttribute('aria-invalid');
            result.textContent = 'Dữ liệu hợp lệ. Đây là bản thực hành, chưa gửi tin nhắn đến máy chủ.';
        }
    });
}
// Cac nut chua co backend: thong bao ro trang thai demo
const loginForm = document.querySelector('#login-form');
if (loginForm) {
    loginForm.addEventListener('submit', function (event) {
        event.preventDefault();
        document.querySelector('#login-message').textContent = 'Form hợp lệ. Chức năng xác thực tài khoản sẽ thực hiện ở phần PHP.';
    });
}
const checkout = document.querySelector('#checkout');
if (checkout) {
    checkout.addEventListener('click', function () {
        const inputs = cartTable.querySelectorAll('.qty');
        for (const input of inputs) { if (!input.reportValidity()) { return; } }
        document.querySelector('#cart-message').textContent = 'Đây là giỏ mẫu Buổi 2, chưa tạo đơn hàng thật. Phần đặt hàng thuộc buổi PHP.';
    });
}
