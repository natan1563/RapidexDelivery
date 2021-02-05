<!-- Objeto Produto -->
<?php

require_once '../App/Controllers/Products.php';

use Products\Products;

$resources = Products::listProducts();

//Products::createProduct('Bobó de camarão', ['Camarão, azeite, arroz, pirão, pimenta']);
?>

<!-- Head -->
<?php require_once '../App/template/head.php'; ?>

<body class="bg-warning">
    <!-- Menu -->
    <?php require_once '../App/template/header.php'; ?>

    <div class="mt-3 w-75 py-4 border border-danger rounded mx-auto mt-1 bg-danger container">
        <div class="row row-cols-1 row-cols-md-2 g-4">

        <?php foreach($resources as $resource):  $ingredients = explode(',', $resource->data->ingredients[0]); ?>
            <div class="col">
                <div class="card mt-2">
                    
                    <div class="card-body">
                        <h5 class="card-title"><?=$resource->data->name?></h5>
                        <p class="card-text"><?=$resource->data->description?></p>
                        <ul>
                        <?php foreach($ingredients as $ingredient): ?>
                            
                            <li><?=$ingredient?></li>

                        <?php endforeach?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        </div>
    </div>
</body>
<!-- Body -->
<?php require_once '../App/template/footer.php'; ?>