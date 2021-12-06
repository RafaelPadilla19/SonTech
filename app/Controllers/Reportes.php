<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\FacturaVentaModel;
    use App\Controllers\Producto;

class Reportes extends BaseController{
        protected $facturaVentaModel;
        protected $detalleFacturaVenta;
        protected $producto;
        


        public function __construct() {
            
            $this->facturaVentaModel= new FacturaVentaModel();
            $this->detalleFacturaVenta= new DetalleFacturaVenta();
            $this->producto= new Producto();
            
        }

        public function inventario(){
            $data = [
                'title' => 'Reportes',
                'productos' => $this->producto->getProductos(1),
            ];
            echo view('forms/reportes/reporte_inventario_view', $data);
        }

        public function getTotalMes(){
            $db= \Config\Database::connect();
            $query = $db->query("SELECT SUM(total) as TotalMes FROM factura_venta WHERE MONTH(fecha_alta) = MONTH(CURRENT_DATE())");
            $facturas = $query->getRow();
            echo $facturas->TotalMes;
        }

        public function cantidadVendidadMes(){
            $db= \Config\Database::connect();
            $query = $db->query("SELECT SUM(cantidad) as Cantidad FROM detallefactura_venta WHERE MONTH(fecha_alta) = MONTH(CURRENT_DATE())");
            $facturas = $query->getRow();
            echo $facturas->Cantidad;
        }

        public function gananciasSemanal(){
            $db= \Config\Database::connect();
            $query = $db->query("SELECT SUM(productos.ganancia * detallefactura_venta.cantidad) as GananciaSemanal FROM productos ,detallefactura_venta WHERE WEEK(detallefactura_venta.fecha_alta,1) = WEEK(CURRENT_DATE(),1) AND productos.producto_id=detallefactura_venta.producto_id
            ");

            $facturas = $query->getRow();
            if($facturas->GananciaSemanal == NULL){
                echo 0;
            }else{
                echo $facturas->GananciaSemanal;
            }

        }

        public function gananciasMensual(){
            $db= \Config\Database::connect();
            $query = $db->query("SELECT SUM(productos.ganancia * detallefactura_venta.cantidad) as GananciaMensual FROM productos ,detallefactura_venta WHERE MONTH(detallefactura_venta.fecha_alta) = MONTH(CURRENT_DATE()) AND productos.producto_id=detallefactura_venta.producto_id
            ");
            $facturas = $query->getRow();
            echo $facturas->GananciaMensual;
        }

        public function IngresoPorMes($mes){
            $db= \Config\Database::connect();
            $query = $db->query("SELECT SUM(total) as TotalMes FROM factura_venta WHERE MONTH(fecha_alta) = $mes and Year(fecha_alta) = Year(CURRENT_DATE())");
            $facturas = $query->getRow();
            if($facturas->TotalMes == NULL){
                echo 0;
            }else{
                echo $facturas->TotalMes;
            }
        }


        
    }


?>