<main class="content">
    <h1 class="m-2 text-capilaze text-muted text-center">
        <?php echo $titulo;?>
    </h1>
    <a href="<?php echo base_url(); ?>/Usuario/" id="btnNuevo" class="btn btn-success mb-2">Nuevos</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th style="display: none;">Clave</th>
                    <th style="display: none;">Tipo Usuario</th>

                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos as $dato){?>
                <tr>
                    <td><?php echo $dato['usuario_id'];?></td>
                    <td><?php echo $dato['nombre_usuario'];?></td>
                    <td><?php echo $dato['apellido_usuario'];?></td>
                    <td><?php echo $dato['correo'];?></td>
                    <td style="display: none;"><?php echo $dato['clave'];?></td>
                    <td style="display: none;"><?php echo $dato['tipousuario_id'];?></td>
                    <td>
                        <a href="<?php echo base_url().'/Usuario/restaurar/'.$dato['usuario_id'];?>" class="btn btn-primary">
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