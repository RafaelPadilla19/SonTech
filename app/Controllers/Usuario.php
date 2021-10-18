<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\UsuarioModel;
    use App\Controllers\TipoUsuario;
    
class Usuario extends BaseController{
        protected $usuarioModel;

        public function __construct() {
            $this->usuarioModel= new UsuarioModel();
        }

        public function index($estado=1) {

            $query = $this->getUsuarios($estado);
            $tipoUsuarios= new TipoUsuario();

            $guardar = session('guardar');
            $actualizar = session('actualizar');
            $eliminar = session('eliminar');

            $data = [
                'titulo' => 'Usuarios',
                'datos' => $query,
                'tipo_usuario' => $tipoUsuarios->getTipoUsuarios(1),
                'guardar' => $guardar,
                'actualizar' => $actualizar,
                'eliminar' => $eliminar
            ];
            echo view('templates/header');
            echo view('templates/menu');
            echo view('forms/usuarios/index_view',$data);
            echo view('templates/footer');
        }

        public function eliminados($activo=0){
            //ordenar por id de forma decente
            $usuarioModel= $this->getUsuarios($activo);
            
            $data = [
                'titulo'=>'Usuarios Eliminados',
                'datos'=>$usuarioModel
            ];
            echo view('templates/header');
            echo view('templates/menu');
            echo view('forms/usuarios/inactivos_view',$data);
            echo view('templates/footer');
        }

        public function getUsuarios($estado) {  
            $query = $this->usuarioModel->select('*');
            $query->join('tipo_usuario','tipo_usuario.tipousuario_id=usuarios.tipousuario_id');
            $query->where('usuarios.estado',$estado);
            $query = $query->findAll();
            return $query;
        }

        public function insertar(){
            $response=$this->usuarioModel->save([
                'nombre_usuario' => $this->request->getPost('nombre_usuario'),
                'apellido_usuario'=>$this->request->getPost('apellido_usuario'),
                'correo'=>$this->request->getPost('correo'),
                'clave'=>md5($this->request->getPost('clave')),
                'tipousuario_id'=>$this->request->getPost('tipousuario_id')
            ]);
            return $response;
        }
        public function actualizar(){
            $response=$this->usuarioModel->update($this->request->getPost('usuario_id'),[
                'nombre_usuario' => $this->request->getPost('nombre_usuario'),
                'apellido_usuario'=>$this->request->getPost('apellido_usuario'),
                'correo'=>$this->request->getPost('correo'),
                'clave'=>$this->request->getPost('clave'),
                'tipousuario_id'=>$this->request->getPost('tipousuario_id')
            ]);
            return $response;
        }


        public function action(){
            if($this->request->getPost('usuario_id')==null){
                $response = $this->insertar();
                if($response){
                    return redirect()->to(base_url().'/Usuario')->with('guardar','ok');
                }else{
                    return redirect()->to(base_url().'/Usuario')->with('guardar','error');
                }
            }else{
                $response = $this->actualizar();
                if($response){
                    return redirect()->to(base_url().'/Usuario')->with('actualizar','ok');
                }else{
                    return redirect()->to(base_url().'/Usuario')->with('actualizar','error');
                }
            }
        }

        public function eliminar($id){
            $inactivo=0;
            $response=$this->usuarioModel->update($id,[
                'estado' => $inactivo ]);


            if($response){
                return redirect()->to(base_url().'/Usuario')->with('eliminar','ok');
            }else{
                return redirect()->to(base_url().'/Usuario')->with('eliminar','error');
            }
        }

        public function restaurar($id){
            $activo=1;
            $response=$this->usuarioModel->update($id,[
                'estado' => $activo ]);

            return redirect()->to(base_url('Usuario'));
        }
                

}

?>