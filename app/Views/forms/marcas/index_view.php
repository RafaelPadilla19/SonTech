<main class="content">
    <h1 class="m-2 pb-3 text-capilaze text-muted text-center border-bottom">
        <?php echo $titulo;?>
    </h1>
    <button id="btnNuevo" class="btn btn-success mb-3 mt-3">Nuevo</button>
    <a href="<?php echo base_url(); ?>/marca/eliminados" id="btnNuevo" class="btn btn-info mb-3 mt-3">Ver Eliminados</a>

    <!--Buscar-->

    <!--alert se agrego correctamente-->
    <?php if(isset($guardar)):?>
    <?php if($guardar=='ok'):?>
    <div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
        <strong>Guardado!</strong> El registro se guardo exitosamente !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif;?>
    <?php endif;?>

    <!--alert se actualizo correctamente-->
    <?php if(isset($actualizar)):?>
    <?php if($actualizar=='ok'):?>
    <div class="alert alert-primary alert-message alert-dismissible fade show" role="alert">
        <strong>Actualizado!</strong> El registro se actualizo exitosamente !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif;?>
    <?php endif;?>

    <!--alert se elimino correctamente-->
    <?php if(isset($eliminar)):?>
    <?php if($eliminar=='ok'):?>
    <div class="alert alert-danger alert-message alert-dismissible fade show" role="alert">
        <strong>El registro se dio de baja!</strong> El registro se dio de baja exitosamente!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif;?>
    <?php endif;?>


    <div class="table-responsive p-2">
        <table class="table table-striped table-hover table-bordered text-center" id="table-marca">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Fehca creacion</th>
                    <th>Ultima modificacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos as $dato){?>
                <tr>
                    <td><?php echo $dato['marca_id'];?></td>
                    <td><?php echo $dato['nombre_marca'];?></td>
                    <td><?php echo $dato['fecha_alta'];?></td>
                    <td><?php echo $dato['fecha_edit'];?></td>

                    <td>
                        <button id="btnEditar" class="btn btn-primary btn-sm btnEditar" name="btnEditar">
                            <i class="fa fa-edit icon-size"></i>
                        </button>
                        <a href="<?php echo base_url().'/marca/eliminar/'.$dato['marca_id'];?>"
                            class="btn btn-danger btn-sm">
                            <i class="fa fa-trash icon-size"></i>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <!-- BEGIN  modal -->
    <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="modal-title"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="form-personas" method="post" action='<?php echo base_url();?>/marca/action'>
                    <div class="modal-body m-3">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Marca:</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" required />
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END  modal -->
</main>

<script>
    
$(document).ready(function() {
    $('#table-marca').DataTable({
        "language": {
            "url": "<?php echo base_url();?>/public/datatable/DataTables-1.10.25/language/es.json"
        },
        "order": [
            [0, "desc"]
        ]
    });
});

$("#btnNuevo").click(function() {
    $('#form-personas').trigger('reset');
    $("#modal-title").text('Nueva Marca');
    $('.modal-header').css('background-color', '#20a745');
    //ocultar un div
    /// $("#estado-select").hide();
    $('#modal_form').modal("show");
});


var fila;
$(document).on('click', '.btnEditar', function() {
    //llenar los campos
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    //estado = fila.find('td:eq(4)').text();


    $("#id").val(id);
    $("#nombre").val(nombre);
    //$("#estado").val(estado);

    //$('#form-personas').trigger('reset');
    $("#modal-title").text('Actualizar Marca');
    $('.modal-header').css('background-color', 'blue');
    //mostrar un div
    // $("#estado-select").show();
    $('#modal_form').modal("show");
});
</script>