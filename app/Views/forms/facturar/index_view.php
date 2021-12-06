<main class="content" ng-app="app" ng-controller="app-controller">
    <h1 class="pb-3 text-capilaze text-muted text-center border-bottom">
        <?php echo $titulo;?>
    </h1>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="row mb-4">
                    <div class="col-6">
                        <label for="recipient-name" class="col-form-label">Cliente:</label>
                        <input type="text"  ng-model="factura_venta.cliente_id" class="form-control" list="my-list">
                        <datalist id="my-list">
                        <option ng-repeat="c in clientes track by $index"
                                            value="{{c.cliente_id}}">{{c.nombre_cliente}}{{" "+c.apellido_cliente}}</option>
                            <!--option coon maria en value pero guarde el id-->

                        </datalist>
                    </div>
                    <div class="col-6">
                        <label for="recipient-name" class="col-form-label">Usario:</label>
                        <input type="text" ng-model="factura_venta.usuario_id" class="form-control" list="my-lista">
                        <datalist id="my-lista">
                        <option ng-repeat="c in usuarios track by $index"
                                            value="{{c.usuario_id}}">{{c.nombre_usuario}}{{" "+c.apellido_usuario}}</option>
                    
                        </datalist>
                    </div>

                </div>
                <div class="row mb-4">
                    <div class="mb-3 col-4">
                        <label for="recipient-name" class="col-form-label">Subtotal:</label>
                        <input type="text" class="form-control" id="cifra-presupuestada"
                            ng-model="factura_venta.subtotal" readonly>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="recipient-name" class="col-form-label">IVA:</label>
                        <input type="text" class="form-control" id="cifra-presupuestada" ng-model="factura_venta.IVA"
                            readonly>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="recipient-name" class="col-form-label">Total:</label>
                        <input type="text" class="form-control" id="cifra-presupuestada"
                            ng-model="factura_venta.total" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-23">
                        <label for="recipient-name" class="col-form-label">Descripción de factura:</label>
                        <textarea class="form-control" placeholder="Ingrese una descripcion de la factura"
                            name="descripcion" id="descripcion" ng-model="factura_venta.descricion_factura" required></textarea>
                    </div>


                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <button type="button" class="btn btn-success" ng-click="facturar()">Facturar</button>
                    </div>
                    <div class="col-9">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@fat">Agregar Producto</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in productosVenta track by $index">
                                <td>{{$index+1}}</td>
                                <td>{{item.nombre_producto}}</td>
                                <td>{{item.cantidad}}</td>
                                <td>${{item.precio}}</td>
                                <td>${{item.total}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger" ng-click="eliminarProducto($index)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!--inicio modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-7">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Producto:</label>

                                    <input type="text" class="form-control" list="productoid"
                                        ng-model="producto.producto_id" ng-change="selectProducto()">
                                    <datalist id="productoid">
                                        <option ng-repeat="producto in productos track by $index"
                                            value="{{producto.producto_id}}">{{producto.nombre_producto}}</option>

                                    </datalist>

                                </div>

                            </div>
                            <div class="col-5">
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Cantidad:</label>
                                    <input type="number"  name="cantidad" class="form-control" ng-change="total()" ng-model="producto.cantidad" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Precio Unit:</label>
                                    <input type="text" class="form-control" ng-model="producto.precio" readonly>

                                </div>

                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Total $:</label>
                                    <input type="text" class="form-control" ng-model="producto.total" readonly>
                                </div>
                            </div>
                        </div>



                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" ng-click="guardarPruducto()">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!--fin modal-->


</main>

<script>
angular.module("app", []).controller("app-controller", function($scope, $http, $compile) {

    $scope.clientes = [];
    $scope.usuarios = [];
    $scope.factura_venta = {};
    $scope.productos = [];
    $scope.productosVenta = [];
    $scope.detallefactura_ventas = [];
    $scope.detallefactura_venta = {};
    $scope.producto = {};
    $scope.producto.cantidad = 1;
    $scope.producto.total = 0;
    $scope.producto.precio = 0;
    $scope.idFactura = 0;


    $scope.getClientes = function() {
        $http({
            method: 'GET',
            url: '<?php echo base_url(); ?>/Cliente/getClientoJson',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(function successCallback(response) {
            $scope.clientes = response.data;
            console.log($scope.clientes);
        }, function errorCallback(response) {
            console.log(response);
        });
    }

    $scope.getUsuarios = function() {
        $http({
            method: 'GET',
            url: '<?php echo base_url(); ?>/Usuario/getUsuariosJson',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(function successCallback(response) {
            $scope.usuarios = response.data;
            console.log($scope.usuarios);
        }, function errorCallback(response) {
            console.log(response);
        });
    }

    $scope.getUsuarios();

    $scope.getClientes();

    $scope.getProductos = function() {
        $http({
            method: "GET",
            url: "<?php echo base_url(); ?>/Producto/getProductosJson",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        }).then(function mySuccess(response) {
            $scope.productos = response.data;
            console.log($scope.productos);
        }, function myError(response) {
            console.log(response.statusText);
        });
    };


    $scope.getProductos();

    $scope.selectProducto = function() {
        //retornar el objeto completo
        if ($scope.producto.producto_id != "") {
            let productoSelect = $scope.productos.find(function(element) {
                return element.producto_id == $scope.producto.producto_id;
            });
            //$scope.producto.total = productoRes.precio;
            console.log(productoSelect);
            $scope.producto.precio = parseFloat(productoSelect.precio_unitario);
            $scope.producto.total = (parseFloat(productoSelect.precio_unitario) * parseFloat($scope.producto.cantidad).toFixed(2));
            
            $scope.producto.nombre_producto = productoSelect.nombre_producto;

        }else{
            $scope.producto.precio = 0;

        }


    }

    $scope.total=function(){

        if($scope.producto.cantidad!=''){
            $scope.producto.total = (parseFloat($scope.producto.precio) * parseFloat($scope.producto.cantidad)).toFixed(2);
        }
        //validar si un input number esta vacio
    }

    $scope.guardarPruducto= function()
        {
            $scope.productosVenta=[...$scope.productosVenta,angular.copy($scope.producto)];
            
            //nuevo objeto para agregar al detalle
            let detallefactura_ventaObj = {
                producto_id: $scope.producto.producto_id,
                cantidad: $scope.producto.cantidad,
                precio_total: $scope.producto.total
            };
            
            $scope.detallefactura_ventas=[...$scope.detallefactura_ventas,detallefactura_ventaObj];
            console.log($scope.detallefactura_ventas);
            //cerrar modal
            $('#exampleModal').modal('hide');
            //limpiar modal

            //sumar los precio_total de los productos agregados
            $scope.factura_venta.subtotal= $scope.detallefactura_ventas.reduce((total,producto)=>{
                return total+parseFloat(producto.precio_total);
            },0);

            $scope.factura_venta.IVA= ($scope.factura_venta.subtotal*0.13).toFixed(2);
            $scope.factura_venta.total= ( parseFloat($scope.factura_venta.subtotal)+ parseFloat($scope.factura_venta.IVA)).toFixed(2);
            $scope.producto={};
            $scope.producto.cantidad=1;
            $scope.producto.total=0;
        }

        $scope.eliminarProducto=function(index){
            $scope.productosVenta.splice(index,1);
            $scope.detallefactura_ventas.splice(index,1);
            $scope.factura_venta.subtotal= $scope.detallefactura_ventas.reduce((total,producto)=>{
                return total+parseFloat(producto.precio_total);
            },0);
            $scope.factura_venta.IVA= ($scope.factura_venta.subtotal*0.13).toFixed(2);
            $scope.factura_venta.total= ( parseFloat($scope.factura_venta.subtotal)+ parseFloat($scope.factura_venta.IVA)).toFixed(2);
            

            console.log($scope.detallefactura_ventas);
            console.log($scope.productosVenta);
        }
        
        $scope.facturar=function(){
            console.log($scope.factura_venta);
            console.log($scope.detallefactura_ventas);

            $http({
                method: "POST",
                url: "<?php echo base_url(); ?>/FacturaVenta/insertFactura",
                data: $scope.factura_venta,
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            }).then(function mySuccess(response) {

                $scope.idFactura = response.data;

                for(let i=0; i<$scope.detallefactura_ventas.length;i++){
                    $scope.detallefactura_ventas[i].facturaventa_id=response.data;
                    $http({
                        method: "POST",
                        url: "<?php echo base_url(); ?>/DetalleFacturaVenta/insertDetalleFactura",
                        data: $scope.detallefactura_ventas[i],
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    });
                }

            }).then((res)=>{
                alert('Factura registrada correctamente');
                
                window.open('<?php echo base_url(); ?>/FacturaVenta/imprimirFactura/'+$scope.idFactura,'_blank');
                location.href="<?php echo base_url(); ?>/FacturaVenta/index";
            });

        }

});
</script>