<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add to cart logic
if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$id] = [
            'name' => $name,
            'price' => $price,
            'quantity' => 1
        ];
    }
    header("Location: index.php");
    exit();
}

// Remove from cart logic
if (isset($_POST['remove'])) {
    $id = $_POST['id'];
    unset($_SESSION['cart'][$id]);
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart - Shopping Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Your Cart</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $grandTotal = 0;
            foreach ($_SESSION['cart'] as $id => $item):
                $total = $item['price'] * $item['quantity'];
                $grandTotal += $total;
            ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td>PKR <?= $item['price'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>PKR <?= $total ?></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" name="remove" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Grand Total: PKR <?= $grandTotal ?></h4>

    <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
    <a href="index.php" class="btn btn-secondary">Continue Shopping</a>
</div>
</body>
</html>
