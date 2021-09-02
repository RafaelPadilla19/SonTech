<?php

    namespace App\Controllers;

    use App\Controllers\BaseController;
use App\Models\ProductoModel;

class Producto extends BaseController{
        protected $productoModel;

        public function __construct() {
            $this->productoModel= new ProductoModel();
        }

        public function index($estado=1) {
            $query = $this->productoModel->select('*');
            $query->join('tipo_productos','tipo_productos.tipoproducto_id=productos.tipoproducto_id');
            $query->join('marcas','marcas.marca_id=productos.marca_id');
            $query->where('productos.estado',$estado);
            $query = $query->findAll();

           // $query=$this->productoModel->where('estado',$estado)->findAll();
            $data = [
                'title' => 'Productos',
                'datos' => $query,
            ];
            
        }
        

}