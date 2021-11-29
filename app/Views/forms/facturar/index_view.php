<main class="content">
    <h1 class="pb-3 text-capilaze text-muted text-center border-bottom">
        <?php echo $titulo;?>
    </h1>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <label for="recipient-name" class="col-form-label">Cliente:</label>
                <input type="text" name="cliente_id"  class="form-control" list="my-list">
                <datalist id="my-list">
                    <option value="1">juan</option>
                    <option value="2">pedro</option>
                    <option value="3">maria</option>
                    <!--option coon maria en value pero guarde el id-->
                    
                </datalist>
            </div>
        </div>
    </div>


</main>