<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
use App\Models\MarcaModel;

class Marca extends BaseController{
        protected $marcaModel;

        public function __construct() {
            $this->marcaModel= new MarcaModel();
        }

        public function index($activo=1){
            $marcaModel= $this->marcaModel->where('estado',$activo)->findAll();

            $data = [
                'titulo'=>'Marcas',
                'datos'=>$marcaModel
            ];
            echo view('templates/header');
            echo view('forms/marcas/index_view',$data);
            echo view('templates/footer');
        }

        public function getMarca(){
            $marca = $this->marcaModel->getMarca();
            echo json_encode($marca);
        }
    }


?>