<main class="content">
    <h1 class="m-2 pb-3 text-capilaze text-muted text-center border-bottom">
        <?php echo $titulo;?>
    </h1>
    <button id="btnNuevo" class="btn btn-success mb-3 mt-3">Nuevo</button>
    <a href="<?php echo base_url(); ?>/Producto/eliminados" id="btnNuevo" class="btn btn-info mb-3 mt-3">Ver
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
        <table class="table table-striped table-hover table-bordered text-center" id="table-tipoproducto">
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
                        <button id="btnEditar" class="btn btn-primary btn-sm btnEditar" name="btnEditar">
                            <i class="fa fa-edit icon-size"></i>
                        </button>
                        <button id="btnVer" class="btn btn-primary btn-sm" name="btnVer">
                            <i class="fa fa-eye icon-size"></i>
                        </button>
                        <a href="<?php echo base_url().'/Producto/eliminar/'.$dato['producto_id'];?>"
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
                <form id="form-personas" method="post" action='<?php echo base_url();?>/Producto/action'>
                    <div class="modal-body m-3">
                        <input type="hidden" name="producto_id" id="id">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">Producto:</label>
                                <input type="text" name="nombre_producto" id="nombre" class="form-control" required />
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Descripcion:</label>
                                    <input type="text" name="descripcion" class="form-control" id="descripcion"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="recipient-name" class="col-form-label">Costo:</label>
                                <input type="text" name="costo" class="form-control" id="costo" required />
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Precio:</label>
                                    <input type="text" name="precio_unitario" class="form-control" id="precio"
                                        required />
                                </div>

                            </div>
                            <div class="col-4">
                                <label for="recipient-name" class="col-form-label">Ganancia:</label>
                                <input type="text" name="ganancia" class="form-control" id="ganancia" readonly />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                <label for="recipient-name" class="col-form-label">Cantidad:</label>
                                <input type="number" min="0" name="cantidad" class="form-control" id="cantidad"
                                    required />
                            </div>
                            <div class="col-5">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Tipo Producto:</label>
                                    <select name="tipoproducto_id" id="tipoproducto_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        <?php foreach($tipoProductos as $tipoproducto){?>
                                        <option value="<?php echo $tipoproducto['tipoproducto_id'];?>">
                                            <?php echo $tipoproducto['nombre_tipo_producto'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Marca:</label>
                                    <select name="marca_id" id="marca_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        <?php foreach($marcas as $marca){?>
                                        <option value="<?php echo $marca['marca_id'];?>">
                                            <?php echo $marca['nombre_marca'];?></option>
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
var costoInput = document.getElementById('costo');
var precioInput = document.getElementById('precio');
var gananciaInput = document.getElementById('ganancia');

costoInput.oninput = function() {


    var costo = costoInput.value;
    var precio = precioInput.value;
    var ganancia = precio - costo;
    if (ganancia < 0) {
        ganancia = 0;
    }

    gananciaInput.value = ganancia;

}
precioInput.oninput = function() {

    var costo = costoInput.value;
    var precio = precioInput.value;
    var ganancia = precio - costo;
    if (ganancia < 0) {
        ganancia = 0;
    }

    gananciaInput.value = ganancia;


}

$(document).ready(function() {
    $('#table-tipoproducto').DataTable({
        "language": {
            "url": "<?php echo base_url();?>/datatable/DataTables-1.10.25/language/es.json"
        },
        "order": [
            [0, "desc"]
        ]
    });
});

$("#btnNuevo").click(function() {
    $('#form-personas').trigger('reset');
    $("#modal-title").text('Nuevo Producto');
    $('.modal-header').css('background-color', '#20a745');
    //ocultar un div
    /// $("#estado-select").hide();
    $('#modal_form').modal("show");
});



$(document).on('click', '.btnEditar', function() {
    var fila;
    //llenar los campos
    fila = $(this).closest("tr");
    let id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(2)').text();
    costo = fila.find('td:eq(3)').text();
    precio = fila.find('td:eq(4)').text();
    ganancia = fila.find('td:eq(5)').text();
    cantidad = fila.find('td:eq(6)').text();
    tipoproducto_id = fila.find('td:eq(7)').text();
    marca_id = fila.find('td:eq(9)').text();
    //estado = fila.find('td:eq(4)').text();
    console.log(marca_id);
    console.log(tipoproducto_id);

    $("#id").val(id);
    
    $("#nombre").val(nombre);
    $("#descripcion").val(descripcion);
    $("#costo").val(costo);
    $("#precio").val(precio);
    $("#ganancia").val(ganancia);
    $("#cantidad").val(cantidad);
    $("#tipoproducto_id").val(tipoproducto_id);
    $("#marca_id").val(marca_id);
    //$("#estado").val(estado);

    //$('#form-personas').trigger('reset');
    $("#modal-title").text('Actualizar Producto');
    $('.modal-header').css('background-color', 'blue');
    //mostrar un div
    // $("#estado-select").show();
    $('#modal_form').modal("show");
});
</script>