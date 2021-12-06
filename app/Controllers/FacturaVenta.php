<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\FacturaVentaModel;
    use App\Controllers\DetalleFacturaVenta;

class FacturaVenta extends BaseController{
        protected $facturaVentaModel;

        public function __construct() {
            
            $this->facturaVentaModel= new FacturaVentaModel();

        }

        public function index(){
            //ordenar por id de forma decente
           $data=[
            'titulo'=>'Facturar Venta',
           ];
            echo view('templates/header');
            echo view('templates/menu');
            echo view('forms/facturar/index_view',$data);
            echo view('templates/footer');
        }

        public function buscarFactura(){
            $data=[
                'titulo'=>'Facturas',
                'facturas'=> $this->getFacturas(),
            ];
            echo view('templates/header');
            echo view('templates/menu');
            echo view('forms/facturar/buscar_factuta_view',$data);
            echo view('templates/footer');
        }

        public function getFacturas(){
            $facturaVentaModel=$this->facturaVentaModel->orderBy('facturaventa_id','DESC')->findAll();
            return $facturaVentaModel;
        }

        public function insertFactura(){
            //recibir datos del por POST ajax
            $dt = file_get_contents("php://input");
            $data = json_decode($dt);
            $facturaVentaModel=$this->facturaVentaModel->insert($data);
            //retornar el id
            echo $facturaVentaModel;

        }

        public function imprimirFactura($id){
            $detalleFacturaVenta=new DetalleFacturaVenta();
            $db=db_connect();
            //obtener consulta de la factura
            $detalles=$db->query("SELECT detallefactura_venta.*, productos.precio_unitario,productos.descripcion, productos.nombre_producto from detallefactura_venta, productos WHERE detallefactura_venta.producto_id=productos.producto_id and detallefactura_venta.facturaventa_id=$id
            ")->getResultArray();
            $facturaVentaModel=$db->query("SELECT factura_venta.*,usuarios.nombre_usuario, usuarios.apellido_usuario FROM factura_venta, usuarios WHERE factura_venta.usuario_id=usuarios.usuario_id and facturaventa_id=$id")->getRow();


            $data=[
                'titulo'=>'Factura de Venta',
                'facturaVentaModel'=>$facturaVentaModel,
                'detalles'=>$detalles,
            ];
            echo view('templates/header');
            echo view('forms/facturar/factura_view',$data);
        }
        

       
        
        
    }


?>