<?php
$pageTitle = "Products";
require_once __DIR__ . "/components/header.php";
?>

<div class="container mt-5">
    <h1>Our Products</h1>
    <p class="lead">List of available products</p>
    <div class="row" id="product-list">
        <p>Loading products...</p>
    </div>
</div>

<?php require_once __DIR__ . "/components/common-script.php"; ?>

<script>
    $(document).ready(function() {
        fetchProducts();
    });

    function fetchProducts() {
        $.ajax({
            url: "/api/products/get",
            method: "GET",
            dataType: "json",
            success: function(products) {
                let productList = $("#product-list");
                productList.empty();

                if (products.length === 0) {
                    productList.html("<p>No products available.</p>");
                    return;
                }

                let html = "";
                products.forEach(product => {
                    html += `
                    <div class="col-md-3">
                        <div class="card p-2">
                            <h3>${escapeHtml(product.name)}</h3>
                            <p>Price: $${parseFloat(product.price).toFixed(2)}</p>
                        </div>
                    </div>
                `;
                });

                productList.html(html);
            },
            error: function() {
                $("#product-list").html("<p>Failed to load products. Please try again.</p>");
            }
        });
    }

    function escapeHtml(text) {
        return $("<div>").text(text).html();
    }
</script>