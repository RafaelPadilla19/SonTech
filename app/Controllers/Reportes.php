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

        public function ingresoPorMes(){
            $ingreso= $this->facturaVentaModel->where('fecha_factura', '>=', date('Y-m-01'))->where('fecha_factura', '<=', date('Y-m-t'))->get();
            echo $ingreso;
        }
       
        

       
        
        
    }


?>