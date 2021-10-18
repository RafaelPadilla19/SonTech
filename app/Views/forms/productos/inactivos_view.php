<main class="content">
    <h1 class="m-2 text-capilaze text-muted text-center">
        <?php echo $titulo;?>
    </h1>
    <a href="<?php echo base_url(); ?>/Producto/" id="btnNuevo" class="btn btn-success mb-2">Nuevos</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Descripcion</th>
                    <th style="display: none;">Costo</th>
                    <th>Precio</th>
                    <th style="display: none;">Ganancia</th>
                    <th>Stock</th>
                    <th style="display: none;">Id tipo</th>
                    <th>Tipo</th>
                    <th style="display: none;">Id marca</th>
                    <th>Marca</th>

                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos as $dato){?>
                <tr>
                    <td><?php echo $dato['producto_id'];?></td>
                    <td><?php echo $dato['nombre_producto'];?></td>
                    <td><?php echo $dato['descripcion'];?></td>
                    <td style="display: none;"><?php echo $dato['costo'];?></td>
                    <td><?php echo $dato['precio_unitario'];?></td>
                    <td style="display: none;"><?php echo $dato['ganancia'];?></td>
                    <td><?php echo $dato['cantidad'];?></td>
                    <td style="display: none;"><?php echo $dato['tipoproducto_id'];?></td>
                    <td><?php echo $dato['nombre_tipo_producto'];?></td>
                    <td style="display: none;"><?php echo $dato['marca_id'];?></td>
                    <td><?php echo $dato['nombre_marca'];?></td>
                    <td>
                        <a href="<?php echo base_url().'/Producto/restaurar/'.$dato['producto_id'];?>" class="btn btn-primary">
                        <!--icono de carga-->
                        <i class="fa fa-upload icon-alt"></i>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</main>