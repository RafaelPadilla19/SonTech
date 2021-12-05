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
    <div class="container pt-5">
        <div class="text-center mb-4">
            <h5>SONTECH</h5>
            <h6>Reporte de Inventarios</h6>
        </div>
        <table class="table table-sm table-bordered border-primary text-center" style="font-size:12px;">
                <thead class="table-secondary border-primary">
                    <tr class="align-middle">
                        <th class="col-1">Id</th>
                        <th class="col-2">Nombre</th>
                        <th class="col-2">Descripcion</th>
                        <th class="col-1">Costo</th>
                        <th class="col-1">Precio Unitario</th>
                        <th class="col-1">Ganancia</th>
                        <th class="col-1">Cantidad</th>
                        <th class="col-1">Tipo</th>
                        <th class="col-1">Marca</th>
                        <th class="col-1">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Samsung A201</td>
                        <td>Telefono de ultima generacion</td>
                        <td>150.00</td>
                        <td>200.00</td>
                        <td>50.00</td>
                        <td>10</td>
                        <td>Smartphone</td>
                        <td>Samsung</td>
                        <td>Activo</td>
                    </tr>
                </tbody>
        </table>
    </div>
</body>
</html>