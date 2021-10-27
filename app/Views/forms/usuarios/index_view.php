<main class="content">
    <h1 class="m-2 pb-3 text-capilaze text-muted text-center border-bottom">
        <?php echo $titulo;?>
    </h1>
    <button id="btnNuevo" class="btn btn-success mb-3 mt-3">Nuevo</button>
    <a href="<?php echo base_url(); ?>/Usuario/eliminados" id="btnNuevo" class="btn btn-info mb-3 mt-3">Ver
        Eliminados</a>

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
        <table class="table table-striped table-hover table-bordered text-center" id="table-usuario">
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
                        <button id="btnEditar" class="btn btn-primary btn-sm btnEditar" name="btnEditar">
                            <i class="fa fa-edit icon-size"></i>
                        </button>
                        <button id="btnVer" class="btn btn-primary btn-sm" name="btnVer">
                            <i class="fa fa-eye icon-size"></i>
                        </button>
                        <a href="<?php echo base_url().'/Usuario/eliminar/'.$dato['usuario_id'];?>"
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="modal-title"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="form-personas" method="post" action='<?php echo base_url();?>/Usuario/action'>
                    <div class="modal-body m-3">
                        <input type="hidden" name="usuario_id" id="id">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Nombre Usuario:</label>
                                <input type="text" name="nombre_usuario" id="nombre" class="form-control" required />
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Apellido Usuario:</label>
                                <input type="text" name="apellido_usuario" id="apellido" class="form-control" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                <label for="recipient-name" class="col-form-label">Correo usuario:</label>
                                <input type="text" min="0" name="correo" class="form-control" id="correo"
                                    required />
                            </div>
                            <div class="col-2">
                                <label for="recipient-name" class="col-form-label">Clave:</label>
                                <input type="password" min="0" name="clave" class="form-control" id="clave"
                                    required />
                            </div>
                            <div class="col-5">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Tipo de Usuario:</label>
                                    <select name="tipousuario_id" id="tipousuario_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        <?php foreach($tipo_usuario as $tipo_usuario){?>
                                        <option value="<?php echo $tipo_usuario['tipousuario_id'];?>">
                                            <?php echo $tipo_usuario['nombre_tipo_usuario'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
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
    $('#table-usuario').DataTable({
        "language": {
            "url": "<?php echo base_url();?>/public/datatable/DataTables-1.10.25/language/es.json"
        },
        "order": [
            [0, "desc"]
        ],
        "bAutoWidth": false,
    });
});

$("#btnNuevo").click(function() {
    $('#form-personas').trigger('reset');
    $("#modal-title").text('Nuevo Cliente');
    $('.modal-header').css('background-color', '#20a745');
    $('#modal_form').modal("show");
});



$(document).on('click', '.btnEditar', function() {
    var fila;
    //llenar los campos
    fila = $(this).closest("tr");
    let id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    apellido = fila.find('td:eq(2)').text();
    correo = fila.find('td:eq(3)').text();
    clave = fila.find('td:eq(4)').text();
    tipousuario_id = fila.find('td:eq(5)').text();
    console.log(departamento_id);

    $("#id").val(id);
   
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#correo").val(correo);
    $("#clave").val(clave);
    $("#tipousuario_id").val(tipousuario_id);

    $("#modal-title").text('Actualizar Usuario');
    $('.modal-header').css('background-color', 'blue');
    //mostrar un div
    $('#modal_form').modal("show");
});
</script>