<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>public/bootstrap/css/bootstrap.min.css">
    <title>Factura</title>
    <style>
        /** ocultar los botones al imprimir**/
        @media print {
            .ocultar * {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container pt-5">
        <div class="text-center">
            <h3 class="">Factura Sontech</h3>
            <h4 class="">Sonsonate</h4>
            <h4 class="">Gracias por su preferencia</h4>
            <h3 class="pt-3">CUENTA</h3>
        </div>
        <div class="text-start">
            <h4>Cajero: <?php echo $facturaVentaModel->nombre_usuario." ".$facturaVentaModel->apellido_usuario;?></h4>
            <h4>Identificador Venta: <?php echo $facturaVentaModel->facturaventa_id ?></h4>
        </div>
        <hr>
        <?php foreach($detalles as $item) {?>
        <div class="row">
            <div class="col-6 text-start">
                <h4>Producto:</h4>
                <h4>Cantidad: </h4>
                <h4>Precio: </h4>
                <h4>Descripcion: </h4>
            </div>
            <div class="col-6 text-end">
                <h4><?php echo $item["nombre_producto"] ?></h4>
                <h4><?php echo $item["cantidad"] ?></h4>
                <h4>$<?php echo $item["precio_unitario"] ?></h4>
                <h4><?php echo $item["descripcion"] ?></h4>
            </div>
        </div>
        <hr>
        <?php }?>
        <hr>
        <div class="row">
            <div class="col-6 text-start">
                <h4>IVA:</h4>
                <h4>Subtotal: </h4>
            </div>
            <div class="col-6 text-end">
                <h4>$<?php echo $facturaVentaModel->IVA ?></h4>
                <h4>$<?php echo $facturaVentaModel->subtotal ?></h4>
            </div>
        </div>
        <hr>
        <div class="row fw-bold">
            <div class="col-6 text-start">
                <h4>Total:</h4>
            </div>
            <div class="col-6 text-end">
                <h4>$<?php echo $facturaVentaModel->total ?></h4>
            </div>
        </div>
        <hr>
        <div class="text-start">
        <h4>Fecha de facturacion: <?php echo $facturaVentaModel->fecha_alta ?></h4>
        </div>
    </div>
    <div class="ocultar d-flex justify-content-center my-3">
        <button id="imprimir" name="imprimir" class="btn btn-primary mb-3">Imprimir</button>
    </div>
    <script>
    //imprimir
    document.getElementById('imprimir').onclick = function() {
    window.print();
    }
</script>
</body>

</html>