<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\MarcaModel;

class FacturaVenta extends BaseController{
        protected $marcaModel;

        public function __construct() {
            
            $this->marcaModel= new MarcaModel();

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


        public function getFacturas(){
            $marcaModel=$this->marcaModel->orderBy('facturaventa_id','DESC')->findAll();
            return $marcaModel;
        }
        

       
        
        
    }


?>