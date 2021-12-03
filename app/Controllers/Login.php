<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\UsuarioModel;
    
class Login extends BaseController{
        protected $usuarioModel;

        public function __construct() {
            $this->usuarioModel= new UsuarioModel();

            // inicar session ci4
        }

        public function index(){
            $error = session('error');
            $data=[
                'error'=>$error,
            ];
            echo view('templates/header');
            echo view('forms/usuarios/login_view',$data);
            echo view('templates/footer');

        }

        public function login(){
            $usuario = $this->usuarioModel->where('correo',$this->request->getPost('email'))
                                          ->where('clave',md5($this->request->getPost('clave')))
                                            ->first();
            
            unset($usuario['clave']);
            if($usuario){
                $session=session();
                $session->set('usuario',$usuario);
                //var_dump($this->session->get('usuario'));
                return redirect()->to(base_url('/'));
            }else{
                
                return redirect()->to(base_url('/usuario/login'))->with('error','error');
            }
        }


        public function logout(){
            $this->session->destroy();
            return redirect()->to(base_url('/Login'));
        }


                

}

?>