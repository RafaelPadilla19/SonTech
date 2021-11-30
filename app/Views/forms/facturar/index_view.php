<main class="content">
    <h1 class="pb-3 text-capilaze text-muted text-center border-bottom">
        <?php echo $titulo;?>
    </h1>
    <div class="container">
        <div class="row mb-4">
            <div class="col-4">
                <label for="recipient-name" class="col-form-label">Cliente:</label>
                <input type="text" name="cliente_id"  class="form-control" list="my-list">
                <datalist id="my-list">
                    <option value="1">juan</option>
                    <option value="2">pedro</option>
                    <option value="3">maria</option>
                    <!--option coon maria en value pero guarde el id-->
                    
                </datalist>
            </div>
            <div class="col-4">
                <label for="recipient-name" class="col-form-label">Usario:</label>
                <input type="text" name="usuario_id"  class="form-control" list="my-lista">
                <datalist id="my-lista">
                    <option value="1">user</option>
                    <option value="2">user</option>
                    <option value="3">user</option>
                </datalist>
            </div>
            <div class="col-4">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" value="09-09-2019" id="fecha"
                    ng-model="factura_venta.fecha" required>
            </div>
        </div>
        <div class="row mb-4">
            <div class="mb-3 col-4">
                <label for="recipient-name" class="col-form-label">Subtotal:</label>
                <input type="number" class="form-control" id="cifra-presupuestada" ng-model="factura_venta.subtotal">
            </div>
            <div class="mb-3 col-4">
                <label for="recipient-name" class="col-form-label">IVA:</label>
                <input type="number" class="form-control" id="cifra-presupuestada" ng-model="factura_venta.iva">
            </div>
            <div class="mb-3 col-4">
                <label for="recipient-name" class="col-form-label">Total:</label>
                <input type="number" class="form-control" id="cifra-presupuestada" ng-model="factura_venta.total">
            </div>
        </div>
        <div class="col">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="recipient-name" class="col-form-label">Descripción de factura:</label>
                    <textarea class="form-control" placeholder="Ingrese una descripcion de la factura" name="descripcion" id="descripcion" required></textarea>
                </div>
            </div>
        </div>
    </div>


</main>