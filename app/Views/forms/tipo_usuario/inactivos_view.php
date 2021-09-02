<main class="content">
    <h1 class="m-2 text-capilaze text-muted text-center">
        <?php echo $titulo;?>
    </h1>
    <a href="<?php echo base_url(); ?>/TipoUsuario/" id="btnNuevo" class="btn btn-success mb-2">Nuevos</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de usuario</th>
                    <th>Fecha creacion</th>
                    <th>Ultima modificacion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos as $dato){?>
                <tr>
                    <td><?php echo $dato['tipousuario_id'];?></td>
                    <td><?php echo $dato['nombre_tipo_usuario'];?></td>
                    <td><?php echo $dato['fecha_alta'];?></td>
                    <td><?php echo $dato['fecha_edit'];?></td>
                    
                    <td>
                        <a href="<?php echo base_url().'/TipoUsuario/restaurar/'.$dato['tipousuario_id'];?>" class="btn btn-primary">
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