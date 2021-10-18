<main class="content">
    <h1 class="m-2 text-capilaze text-muted text-center">
        <?php echo $titulo;?>
    </h1>
    <a href="<?php echo base_url(); ?>/Cliente/" id="btnNuevo" class="btn btn-success mb-2">Nuevos</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Municipio</th>
                    <th>Departamento</th>
                    <th>Direccion</th>

                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos as $dato){?>
                <tr>
                    <td><?php echo $dato['cliente_id'];?></td>
                    <td><?php echo $dato['nombre_cliente'];?></td>
                    <td><?php echo $dato['apellido_cliente'];?></td>
                    <td><?php echo $dato['numero_telefono'];?></td>
                    <td><?php echo $dato['correo'];?></td>
                    <td><?php echo $dato['municipio'];?></td>
                    <td><?php echo $dato['nombre_departamento'];?></td>
                    <td><?php echo $dato['direccion'];?></td>
                    <td>
                        <a href="<?php echo base_url().'/Cliente/restaurar/'.$dato['cliente_id'];?>" class="btn btn-primary">
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