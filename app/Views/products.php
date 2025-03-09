<?php
$pageTitle = "Products";
require_once __DIR__ . "/components/header.php";
?>

<div class="container mt-5">
    <h1>Our Products</h1>
    <p class="lead">List of available products</p>
    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-3">
                    <div class="card p-2">
                        <h3><?= htmlspecialchars($product['name']) ?></h3>
                        <p>Price: $<?= number_format($product['price'], 2) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <p>No products available.</p>
        <?php endif; ?>
    </div>
</div>