<a class="btn btn-success float-xl-right" href="index.php?controller=ProductsController&action=add"><i class="fa-solid fa-plus"></i></a>
<div class="card-columns">
    <?php
    foreach ($products as $product) {
        echo '<div class="col-md-4 mb-3">';
        echo '<div class="card" style="width: 18rem;">';
        echo '<div class="card-body">';
        echo '<img src="' . $product['img_url'] . '" class="card-img-top" alt="...">';
        echo '<h5 class="card-title">' . $product['nombre'] . '</h5>';
        echo '<p class="card-text">$' . $product['precio'] . '</p>';
        echo '<a href="./index.php?controller=ProductsController&action=edit&id=' . $product['id_producto'] . '" class="btn btn-primary">Editar</a> ';
        echo '<a href="./index.php?controller=ProductsController&action=delete&id=' . $product['id_producto'] . '" class="btn btn-danger">Eliminar</a>';
        echo '</div>'; // card-body
        echo '</div>'; // card
        echo '</div>'; // col
    }
    ?>
</div>
