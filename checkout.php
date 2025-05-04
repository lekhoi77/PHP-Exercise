<?php
session_start();
include 'config.php';

if (empty($_SESSION['cart'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
    
    // Tính tổng tiền
    $total = 0;
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $sql = "SELECT price FROM products WHERE id = $product_id";
        $result = $conn->query($sql);
        $product = $result->fetch_assoc();
        $total += $product['price'] * $quantity;
    }

    // Lưu đơn hàng
    $sql = "INSERT INTO orders (customer_name, customer_email, customer_phone, customer_address, total_amount) 
            VALUES ('$customer_name', '$customer_email', '$customer_phone', '$customer_address', $total)";
    
    if ($conn->query($sql)) {
        // Xóa giỏ hàng
        unset($_SESSION['cart']);
        $_SESSION['order_success'] = true;
        header('Location: order_success.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Thanh toán</h1>
        <form method="post" class="mt-4">
            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="customer_email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="tel" name="customer_phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <textarea name="customer_address" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Đặt hàng</button>
        </form>
    </div>
</body>
</html>