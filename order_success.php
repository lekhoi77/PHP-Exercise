<?php
session_start();
if (!isset($_SESSION['order_success'])) {
    header('Location: index.php');
    exit();
}
unset($_SESSION['order_success']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đặt hàng thành công</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .success-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 40px;
            max-width: 600px;
            margin: 50px auto;
        }
        .success-icon {
            color: #28a745;
            font-size: 64px;
            margin-bottom: 20px;
        }
        .success-title {
            color: #28a745;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .success-message {
            color: #6c757d;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .home-button {
            background-color: #007bff;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .home-button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-container text-center">
            <i class="fas fa-check-circle success-icon"></i>
            <h1 class="success-title">Đặt hàng thành công!</h1>
            <p class="success-message">Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ xử lý đơn hàng của bạn và liên hệ với bạn trong thời gian sớm nhất.</p>
            <a href="index.php" class="btn btn-primary home-button">
                <i class="fas fa-home me-2"></i>Quay lại trang chủ
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>