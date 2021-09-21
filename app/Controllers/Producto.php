<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
use App\Models\ProductoModel;

class Producto extends BaseController{
        protected $productoModel;

        public function __construct() {
            $this->productoModel= new ProductoModel();
        }

        public function index(){
            $query = $this->productoModel->select('*');
            $query->join('tipo_producto','tipo_productos.tipoproducto_id=productos.tipoproducto_id');
            $query->join('marcas','marcas.marca_id_marcas=productos.id_marca');
            $query->where('productos.estado',$estado);
            $query = $query->get();
            //$productoModel=$this->productoModel->where('estado',$estado)->findAll();
            $data=[
                'title'=>'Productos',
                'datos'=>$query,
            ];
            var_dump($data);
        }

     
    }


?>