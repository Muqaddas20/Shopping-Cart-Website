<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>ShopEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f2f2f2;
        }
        .product-card img {
            height: 180px;
            object-fit: contain;
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
        }
        .logo-text {
            font-weight: bold;
            font-size: 24px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<div class="container-fluid header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="logo-text">ShopEase</div>
        </div>
        <div>
            <a href="login.php" class="btn btn-outline-light btn-sm me-2">Login</a>
            <a href="signup.php" class="btn btn-outline-light btn-sm me-3">Sign Up</a>
            <a href="cart.php" class="btn btn-warning btn-sm">Cart (<?= count($_SESSION['cart'] ?? []) ?>)</a>
        </div>
    </div>
</div>

<div class="container mt-4">
    <h4 class="mb-4">Explore Our Products</h4>
    <div class="row">
        <?php
        $products = [
            ["id" => 1, "name" => "Anklet", "price" => 3500, "img" => "anklet.jpeg"],
            ["id" => 2, "name" => "Earings", "price" => 5500, "img" => "earings.jpeg"],
            ["id" => 3, "name" => "Necklace", "price" => 6200, "img" => "necklace.jpg"],
            ["id" => 4, "name" => "Nose Ring", "price" => 2800, "img" => "nose ring.jpeg"],
            ["id" => 5, "name" => "Pendant", "price" => 2000, "img" => "pendant.jpeg"],
            ["id" => 6, "name" => "Scrunchie", "price" => 4500, "img" => "Scrunchie.jpeg"],
            ["id" => 7, "name" => "Bracelete", "price" => 1800, "img" => "bracelete.jpeg"],
            ["id" => 8, "name" => "Studs", "price" => 2300, "img" => "studs.jpeg"],
            ["id" => 9, "name" => "Bangles", "price" => 900, "img" => "bangles.jpeg"],
            ["id" => 10, "name" => "Chain", "price" => 700, "img" => "chain.jpeg"],
        ];

        foreach ($products as $product) {
            echo '
            <div class="col-md-3 mb-4">
                <div class="card product-card">
                    <img src="images/'.$product['img'].'" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">'.$product['name'].'</h5>
                        <p class="card-text">PKR '.$product['price'].'</p>
                        <form method="post" action="cart.php">
                            <input type="hidden" name="id" value="'.$product['id'].'">
                            <input type="hidden" name="name" value="'.$product['name'].'">
                            <input type="hidden" name="price" value="'.$product['price'].'">
                            <button type="submit" name="add" class="btn btn-success btn-sm">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>
</