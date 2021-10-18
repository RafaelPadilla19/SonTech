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
            $guardar = session('guardar');
            $actualizar = session('actualizar');
            $eliminar = session('eliminar');
            $data = [
                'titulo'=>'Departamentos',
                'datos'=>$departamentoModel,
                'guardar'=>$guardar,
                'actualizar'=>$actualizar,
                'eliminar'=>$eliminar
            ];
            echo view('templates/header');
            echo view('templates/menu');
            echo view('forms/departamentos/index_view',$data);
            echo view('templates/footer');
        }

        public function eliminados($activo=0){
            //ordenar por id de forma decente
            $departamentoModel= $this->getDepartamentos($activo);
            
            $data = [
                'titulo'=>'Departamentos Eliminados',
                'datos'=>$departamentoModel
            ];
            echo view('templates/header');
            echo view('templates/menu');
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
                return redirect()->to(base_url().'/departamento')->with('guardar','ok');
            }else{
                return redirect()->to(base_url().'/departamento')->with('guardar','error');
            }
        }

        public function actualizar(){
            $id= $this->request->getPost('id');
            $response=$this->departamentoModel->update($id,[
                'nombre_departamento' => $this->request->getPost('nombre')
            ]);
         
            return $response;
        }
        public function action(){
            if($this->request->getPost('id')==null){
                $response = $this->insertar();
                if($response){
                    return redirect()->to(base_url().'/departamento')->with('guardar','ok');
                }else{
                    return redirect()->to(base_url().'/departamento')->with('guardar','error');
                }
            }else{
                $response = $this->actualizar();
                if($response){
                    return redirect()->to(base_url().'/departamento')->with('actualizar','ok');
                }else{
                    return redirect()->to(base_url().'/departamento')->with('actualizar','error');
                }
            }
        }

        public function eliminar($id){
            $inactivo=0;
            $response=$this->departamentoModel->update($id,[
                'estado' => $inactivo ]);


            if($response){
                return redirect()->to(base_url().'/departamento')->with('eliminar','ok');
            }else{
                return redirect()->to(base_url().'/departamento')->with('eliminar','error');
            }
        }
        public function restaurar($id){
            $activo=1;
            $response=$this->departamentoModel->update($id,[
                'estado' => $activo ]);

            return redirect()->to(base_url('departamento'));
        }

    }


?>