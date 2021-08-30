<main class="content">
    <h1 class="m-2 text-capilaze text-muted text-center">
        <?php echo $titulo;?>
    </h1>
    <a href="<?php echo base_url(); ?>/marca/" id="btnNuevo" class="btn btn-success mb-2">Nuevos</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Fehca creacion</th>
                    <th>Ultima modificacion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos as $dato){?>
                <tr>
                    <td><?php echo $dato['marcaId'];?></td>
                    <td><?php echo $dato['nombreMarca'];?></td>
                    <td><?php echo $dato['fecha_alta'];?></td>
                    <td><?php echo $dato['fecha_edit'];?></td>
                    
                    <td>
                        <a href="<?php echo base_url().'/marca/restaurar/'.$dato['marcaId'];?>" class="btn btn-primary">
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