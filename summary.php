<?php
session_start();

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Summary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light pt-5">
<div class="container">
    <h2 class="mb-4">Order Summary</h2>
    <?php if (empty($cart)): ?>
        <div class="alert alert-warning">No items in your cart.</div>
    <?php else: ?>
        <ul class="list-group mb-4">
            <?php foreach ($cart as $item): 
                $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
                $subtotal = $item['price'] * $quantity;
                $total += $subtotal;
            ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= htmlspecialchars($item['name']) ?> (x<?= $quantity ?>)
                    <span>PKR <?= $subtotal ?></span>
                </li>
            <?php endforeach; ?>
            <li class="list-group-item d-flex justify-content-between align-items-center fw-bold bg-light">
                Total
                <span>PKR <?= $total ?></span>
            </li>
        </ul>
        <div class="alert alert-success">
            ✅ Your order is ready. Thank you for shopping with us!
        </div>
        <a href="index.php" class="btn btn-primary">Continue Shopping</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    <?php endif; ?>
</div>
</body>
</html>
