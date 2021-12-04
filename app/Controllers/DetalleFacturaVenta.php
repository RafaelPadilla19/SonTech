<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\DetalleFacturaVentaModel;

class DetalleFacturaVenta extends BaseController{
        protected $detalle;

        public function __construct() {
            
            $this->detalle= new DetalleFacturaVentaModel();

        }

        public function getFacturaDetalles(){
            $detalleR=$this->detalle->orderBy('detallefactura_venta_id','DESC')->findAll();
            return $detalleR;
        }
        
        public function getFacturaDetalle($id){
            $detalles=$this->detalle->where('facturaventa_id',$id)->findAll();
            return $detalles;
        }


       public function insertDetalleFactura(){
            $dt = file_get_contents("php://input");
            $data = json_decode($dt);
            $detalle = $this->detalle->insert($data);
            echo $detalle;

       }

       
        
        
    }


?>