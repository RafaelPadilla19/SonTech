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
            //ordenar por id de forma decente
            $marcaModel= $this->getMarcas($activo);

            $data = [
                'titulo'=>'Marcas',
                'datos'=>$marcaModel
            ];
            echo view('templates/header');
            echo view('forms/marcas/index_view',$data);
            echo view('templates/footer');
        }

        public function eliminados($activo=0){
            //ordenar por id de forma decente
            $marcaModel= $this->getMarcas($activo);

            $data = [
                'titulo'=>'Marcas Eliminadas',
                'datos'=>$marcaModel
            ];
            echo view('templates/header');
            echo view('forms/marcas/inactivos_view',$data);
            echo view('templates/footer');
        }

        public function getMarcas($estado){
            $marcaModel=$this->marcaModel->where('estado',$estado)->orderBy('marca_id','DESC')->findAll();
            return $marcaModel;
        }

        public function insertar(){
            $response=$this->marcaModel->save(['nombre_marca' => $this->request->getPost('nombre')]);
            if($response){
                return 'guardado';
            }else{
                return 'error';
            }
        }

        public function actualizar(){
            $id= $this->request->getPost('id');
            $response=$this->marcaModel->update($id,[
                'nombre_marca' => $this->request->getPost('nombre')
            ]);
         
            if($response){
                return 'actualizado';
            }else{
                return 'error';
            }
        }

        public function eliminar($id){
            $inactivo=0;
            $response=$this->marcaModel->update($id,[
                'estado' => $inactivo ]);


            if($response){
                $state= 'eliminado';
            }else{
                $state= 'error';
            }

            $marcaModel= $this->getMarcas(1);
            $data = [
                'titulo'=>'Marcas',
                'datos'=>$marcaModel,
                'state'=>$state
            ];
            echo view('templates/header');
            echo view('forms/marcas/index_view',$data);
            echo view('templates/footer');

        }
        public function restaurar($id){
            $activo=1;
            $response=$this->marcaModel->update($id,[
                'estado' => $activo ]);

            return redirect()->to(base_url('marca'));
        }

        public function transacion($activo=1){
            $response='';
            if($this->request->getPost('id')==null){
                $response=$this->insertar();
            }else{
                $response=$this->actualizar();
            }
            $marcaModel=$this->getMarcas($activo);

            $data = [
                'titulo'=>'Marcas',
                'datos'=>$marcaModel,
                'response'=>$response
            ];
            echo view('templates/header');
            echo view('forms/marcas/index_view',$data);
            echo view('templates/footer');

        }

    }


?>