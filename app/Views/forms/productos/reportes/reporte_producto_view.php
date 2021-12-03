<style>
    /** ocultar los botones al imprimir**/
    @media print {
        .ocultar * {
            display: none;
        }
    }
</style>
<main class="content">
    <h1 class="m-2 text-center mb-4 fs-1 fw-bold">
        Reporte de Productos
    </h1>
    <h2 class="mb-4 text-center">El siguiente reporte muestra los detalles de <span class="text-muted fw-bold"><?php echo $producto['nombre_producto'];?></span> el cual cuanta con <span class="text-muted fw-bold"><?php echo $producto['cantidad'];?></span> existencias y con las siguiente informacion</h2>

    <table class="table table-striped table-hover table-bordered text-center fs-4 mb-4">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Costo</th>
                <th scope="col">Precio Unitario</th>
                <th scope="col">Ganancia</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Tipo de producto</th>
                <th scope="col">Marca</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $producto['nombre_producto'];?></td>
                <td><?php echo $producto['descripcion'];?></td>
                <td><?php echo $producto['costo'];?></td>
                <td><?php echo $producto['precio_unitario'];?></td>
                <td><?php echo $producto['ganancia'];?></td>
                <td><?php echo $producto['cantidad'];?></td>
                <td><?php echo $producto['nombre_tipo_producto'];?></td>
                <td><?php echo $producto['nombre_marca'];?></td>
            </tr>
        </tbody>
    </table>    
    <?php
        $cantidad = $producto['cantidad'];
        if($cantidad >= 10){
        echo' <h3 class="text-center mb-4">Observación: El producto <span class="badge bg-primary">Cuenta con lo nesesario</span>
        </h3>';    
        }else if($cantidad <= 9){
            echo '<h3 class="text-center mb-4">Observación: El producto <span class="badge bg-warning">Necesita abastecimiento</span>
            </h3>';
        }
    ?>
    <div class="ocultar d-flex justify-content-center my-3">
        <button id="imprimir" name="imprimir" class="btn btn-success me-3">Imprimir</button>
    </div>
<script>
    //imprimir
    document.getElementById('imprimir').onclick = function() {
    window.print();
    }
</script>
