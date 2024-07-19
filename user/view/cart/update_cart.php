<?php
session_start();

if(isset($_POST['product_id']) && isset($_POST['cart_index']) && isset($_POST['new_quantity'])) {
    $productId = $_POST['product_id'];
    $cartIndex = $_POST['cart_index'];
    $newQuantity = $_POST['new_quantity'];

    // Thực hiện cập nhật số lượng sản phẩm trong giỏ hàng
    $_SESSION['mycart'][$cartIndex][4] = $newQuantity;

    // Phản hồi về thành công
    echo "Cập nhật thành công!";
} else {
    // Nếu không có dữ liệu gửi đến
    echo "Không có dữ liệu được gửi!";
}
?>