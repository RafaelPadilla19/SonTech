<main class="content">
    <h1 class="m-2 text-center mb-4 fs-1 fw-bold">
        Reporte de Productos
    </h1>
    <h2 class="mb-4 text-center">El siguiente reporte muestra los detalles de <span class="text-muted fw-bold"><?php echo $producto['nombre_producto'];?></span> el cual cuanta con <span class="text-muted fw-bold"><?php echo $producto['cantidad'];?></span> existencias y con las siguiente informacion</h2>

    <table class="table table-striped table-hover table-bordered text-center fs-4 mb-4">
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
    <input class="btn btn-success fs-4 mb-3 mt-3" type=button value=Imprimir onclick="print()">

