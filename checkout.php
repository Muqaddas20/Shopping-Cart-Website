<?php
session_start();

// Redirect if cart is empty
if (empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
}

$cart = $_SESSION['cart'];
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout - Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light pt-5">
<div class="container">
    <h2 class="mb-4">Checkout</h2>
    <table class="table table-bordered bg-white">
        <thead class="table-secondary">
        <tr>
            <th>Product Name</th>
            <th>Price (PKR)</th>
            <th>Quantity</th>
            <th>Subtotal (PKR)</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cart as $item): 
            $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
            $subtotal = $item['price'] * $quantity;
            $total += $subtotal;
        ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= $item['price'] ?></td>
                <td><?= $quantity ?></td>
                <td><?= $subtotal ?></td>
            </tr>
        <?php endforeach; ?>
        <tr class="table-success fw-bold">
            <td colspan="3" class="text-end">Total</td>
            <td><?= $total ?></td>
        </tr>
        </tbody>
    </table>
    <a href="summary.php" class="btn btn-success">Proceed to Summary</a>
</div>
</body>
</html>
