<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
use App\Models\TipoUsuarioModel;

class TipoUsuario extends BaseController{
        protected $tipousuarioModel;

        public function __construct() {
            $this->tipousuarioModel= new TipoUsuarioModel();
        }

        public function index($activo=1){
            //ordenar por id de forma decente
            $tipousuarioModel= $this->getTipoUsuarios($activo);
            $guardar = session('guardar');
            $actualizar = session('actualizar');
            $eliminar = session('eliminar');
            $data = [
                'titulo'=>'Tipos de usuario',
                'datos'=>$tipousuarioModel,
                'guardar'=>$guardar,
                'actualizar'=>$actualizar,
                'eliminar'=>$eliminar
            ];
            echo view('templates/header');
            echo view('forms/tipo_usuario/index_view',$data);
            echo view('templates/footer');
        }

        public function eliminados($activo=0){
            //ordenar por id de forma decente
            $tipousuarioModel= $this->getTipoUsuarios($activo);
            
            $data = [
                'titulo'=>'Tipos de usuario Eliminados',
                'datos'=>$tipousuarioModel
            ];
            echo view('templates/header');
            echo view('forms/tipo_usuario/inactivos_view',$data);
            echo view('templates/footer');
        }

        public function getTipoUsuarios($estado){
            $tipousuarioModel=$this->tipousuarioModel->where('estado',$estado)->orderBy('tipousuario_id','DESC')->findAll();
            return $tipousuarioModel;
        }

        public function insertar(){
            $response=$this->tipousuarioModel->save(['nombre_tipo_usuario' => $this->request->getPost('nombre')]);
            if($response){
                return redirect()->to(base_url().'/TipoUsuario')->with('guardar','ok');
            }else{
                return redirect()->to(base_url().'/TipoUsuario')->with('guardar','error');
            }
        }

        public function actualizar(){
            $id= $this->request->getPost('id');
            $response=$this->tipousuarioModel->update($id,[
                'nombre_tipo_usuario' => $this->request->getPost('nombre')
            ]);
         
            return $response;
        }
        
        public function action(){
            if($this->request->getPost('id')==null){
                $response = $this->insertar();
                if($response){
                    return redirect()->to(base_url().'/TipoUsuario')->with('guardar','ok');
                }else{
                    return redirect()->to(base_url().'/TipoUsuario')->with('guardar','error');
                }
            }else{
                $response = $this->actualizar();
                if($response){
                    return redirect()->to(base_url().'/TipoUsuario')->with('actualizar','ok');
                }else{
                    return redirect()->to(base_url().'/TipoUsuario')->with('actualizar','error');
                }
            }
        }

        public function eliminar($id){
            $inactivo=0;
            $response=$this->tipousuarioModel->update($id,[
                'estado' => $inactivo ]);


            if($response){
                return redirect()->to(base_url().'/TipoUsuario')->with('eliminar','ok');
            }else{
                return redirect()->to(base_url().'/TipoUsuario')->with('eliminar','error');
            }
        }

        public function restaurar($id){
            $activo=1;
            $response=$this->tipousuarioModel->update($id,[
                'estado' => $activo ]);

            return redirect()->to(base_url('TipoUsuario'));
        }

    }


?>