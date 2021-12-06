
<main class="content">
    <h1 class="m-2 pb-3 text-capilaze text-muted text-center border-bottom">
        <?php echo $titulo;?>
    </h1>


    <!--Buscar-->

    <div class="table-responsive p-2">
        <table class="table table-striped table-hover table-bordered text-center" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fehca creacion</th>
                    <th>Ultima modificacion</th>
                    <th>Ver Factura</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($facturas as $dato){?>
                <tr>
                    <td><?php echo $dato['facturaventa_id'];?></td>
                    
                    <td><?php echo $dato['fecha_alta'];?></td>
                    <td><?php echo $dato['fecha_edit'];?></td>

                    <td>
                      
                        <a href="<?php echo base_url().'/FacturaVenta/imprimirFactura/'.$dato['facturaventa_id'];?>"
                            class="btn btn-primary btn-sm" target="_blank" > 
                            <i class="fa fa-file icon-size"></i>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
   
</main>

<script>
    $(document).ready(function() {
    $('#table').DataTable({
        "language": {
            "url": "<?php echo base_url();?>/public/datatable/DataTables-1.10.25/language/es.json"
        },
        "order": [
            [0, "desc"]
        ]
    });
});
</script>