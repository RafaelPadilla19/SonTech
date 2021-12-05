<?php
    //var_dump($facturaVentaModel);
    //echo "<br/>";
    //var_dump($detalles);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>public/bootstrap/css/bootstrap.min.css">
    <title>Document</title>
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
            <h4>Cajero: </h4>
            <h4>Venta: </h4>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 text-start">
                <h4>Producto:</h4>
                <h4>Cantidad: </h4>
                <h4>Precio: </h4>
                <h4>Descripcion: </h4>               
            </div>
            <div class="col-6 text-end">
                <h4>Smartphone</h4>
                <h4>1</h4>
                <h4>$ 799.99</h4>
                <h4>Huawei p30, 128 gb</h4>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 text-start">
                <h4>IVA:</h4>
                <h4>Subtotal: </h4>
            </div>
            <div class="col-6 text-end">
                <h4>$ 104.00</h4>
                <h4>$ 799.99</h4>
            </div>
        </div>
        <hr>
        <div class="row fw-bold">
            <div class="col-6 text-start">
                <h4>Total:</h4>
            </div>
            <div class="col-6 text-end">
                <h4>$ 903.99</h4>
            </div>
        </div>
        <hr>
        <div class="text-start">
            <h4>Fecha: 2021-12-04 08:43:41</h4>
        </div>
    </div>
</body>
</html>