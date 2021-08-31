<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
use App\Models\DepartamentoModel;

class Departamento extends BaseController{
        protected $departamentoModel;

        public function __construct() {
            $this->departamentoModel= new DepartamentoModel();
        }

        public function index($activo=1){
            //ordenar por id de forma decente
            $departamentoModel= $this->getDepartamentos($activo);

            $data = [
                'titulo'=>'Departamentos',
                'datos'=>$departamentoModel
            ];
            echo view('templates/header');
            echo view('forms/departamentos/index_view',$data);
            echo view('templates/footer');
        }

        public function eliminados($activo=0){
            //ordenar por id de forma decente
            $departamentoModel= $this->getDepartamentos($activo);

            $data = [
                'titulo'=>'Departamentos eliminados',
                'datos'=>$departamentoModel
            ];
            echo view('templates/header');
            echo view('forms/departamentos/inactivos_view',$data);
            echo view('templates/footer');
        }

        public function getDepartamentos($estado){
            $departamentoModel=$this->departamentoModel->where('estado',$estado)->orderBy('departamento_id','DESC')->findAll();
            return $departamentoModel;
        }

        public function insertar(){
            $response=$this->departamentoModel->save(['nombre_departamento' => $this->request->getPost('nombre')]);
            if($response){
                return 'guardado';
            }else{
                return 'error';
            }
        }

        public function actualizar(){
            $id= $this->request->getPost('id');
            $response=$this->departamentoModel->update($id,[
                'nombre_departamento' => $this->request->getPost('nombre')
            ]);
         
            if($response){
                return 'actualizado';
            }else{
                return 'error';
            }
        }

        public function eliminar($id){
            $inactivo=0;
            $response=$this->departamentoModel->update($id,[
                'estado' => $inactivo ]);


            if($response){
                $state= 'eliminado';
            }else{
                $state= 'error';
            }

            $departamentoModel= $this->getDepartamentos(1);
            $data = [
                'titulo'=>'Departamentos',
                'datos'=>$departamentoModel,
                'state'=>$state
            ];
            echo view('templates/header');
            echo view('forms/departamentos/index_view',$data);
            echo view('templates/footer');

        }
        public function restaurar($id){
            $activo=1;
            $response=$this->departamentoModel->update($id,[
                'estado' => $activo ]);

            return redirect()->to(base_url('departamento'));
        }

        public function transacion($activo=1){
            $response='';
            if($this->request->getPost('id')==null){
                $response=$this->insertar();
            }else{
                $response=$this->actualizar();
            }
            $departamentoModel=$this->getDepartamentos($activo);

            $data = [
                'titulo'=>'Departamentos',
                'datos'=>$departamentoModel,
                'response'=>$response
            ];
            echo view('templates/header');
            echo view('forms/departamentos/index_view',$data);
            echo view('templates/footer');

        }

    }


?>