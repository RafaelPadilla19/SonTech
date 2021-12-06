<?php
    //var_dump($productos);
   
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>/public/bootstrap/css/bootstrap.min.css">
    <title>Reporte de inventarios</title>
</head>
<body>
    <style>
        /** ocultar los botones al imprimir**/
        @media print {
            .ocultar * {
                display: none;
            }
        }
    </style>
    <div class="container pt-5">
        <div class="text-center mb-4">
            <h5>SONTECH</h5>
            <h6>Reporte de Inventarios</h6>
        </div>
        <table class="table table-sm table-bordered border-primary text-center" style="font-size:12px;">
                <thead class="table-secondary border-primary">
                    <tr class="align-middle">
                        <th>Numero</th>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th style="display: none;">Costo</th>
                        <th>Precio</th>
                        <th style="display: none;">Ganancia</th>
                        <th>Stock</th>
                        <th style="display: none;">Id tipo</th>
                        <th>Tipo</th>
                        <th style="display: none;">Id marca</th>
                        <th style="display: none;">Marca</th>
                        <!-- <th>Estado</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productos as $index=>$dato ){?>
                        <tr>
                            <td><?php echo $index+1;?></td>
                            <td><?php echo $dato['nombre_producto'];?></td>
                            <td><?php echo $dato['descripcion'];?></td>
                            <td style="display: none;"><?php echo $dato['costo'];?></td>
                            <td><?php echo $dato['precio_unitario'];?></td>
                            <td style="display: none;"><?php echo $dato['ganancia'];?></td>
                            <td><?php echo $dato['cantidad'];?></td>
                            <td style="display: none;"><?php echo $dato['tipoproducto_id'];?></td>
                            <td><?php echo $dato['nombre_tipo_producto'];?></td>
                            <td style="display: none;"><?php echo $dato['marca_id'];?></td>
                            <td style="display: none;"><?php echo $dato['nombre_marca'];?></td>
                            <!-- <td><?php echo $dato['estado'];?></td> -->
                        </tr>
                    <?php }?>
                </tbody>
        </table>
    </div>

    <div class="ocultar d-flex justify-content-center my-3">
        <button id="imprimir" name="imprimir" class="btn btn-primary me-3">Imprimir</button>
    </div>
</body>
</html>
<script>
    //imprimir
    document.getElementById('imprimir').onclick = function() {
    window.print();
    }
</script>