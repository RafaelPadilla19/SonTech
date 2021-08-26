<main class="content">
    <h1 class="m-2 text-capilaze text-muted text-center">
        <?php echo $titulo;?>
    </h1>
    <button id="btnNuevo" class="btn btn-success mb-2">Nuevo</button>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Fehca creacion</th>
                    <th>Ultima modificacion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos as $dato){?>
                <tr>
                    <td><?php echo $dato['marcaId'];?></td>
                    <td><?php echo $dato['nombreMarca'];?></td>
                    <td><?php echo $dato['fecha_alta'];?></td>
                    <td><?php echo $dato['fecha_edit'];?></td>
                    <td><?php echo $dato['estado'];?></td>
                    <td>
                        <button id="btnEdit" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modal_form">
                            <i class="fa fa-edit icon-size"></i>
                        </button>
                        <a href="#" class="btn btn-danger btn-sm">
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
                <form id="form-personas" method="post">
                    <div class="modal-body m-3">

                        <div class="mb-3">
                            <label for="recipient-name"  class="col-form-label">Marca:</label>
                            <input type="text" id="nombre" class="form-control" id="nombre" />
                        </div>
                        <div class="mb-3">
                            <label for="pais-input" class="col-form-label">Estado:</label>
                            <select id="estado" class="form-select">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END  modal -->
</main>

<script>
$("#btnNuevo").click(function() {
    $('#form-personas').trigger('reset');
    $("#modal-title").text('Nueva Marca');
    $('.modal-header').css('background-color', '#20a745');
    $('#modal_form').modal("show");
});


var fila;
$("#btnEdit").click(function() {
    //llenar los campos
    fila=$(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    estado = fila.find('td:eq(4)').text();

    $("#nombre").val(nombre);
    $("#estado").val(estado);


    //$('#form-personas').trigger('reset');
    $("#modal-title").text('Actualizar Marca');
    $('.modal-header').css('background-color', 'blue');
    $('#modal_form').modal("show");
});
</script>