<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\ClienteModel;
    use App\Controllers\Departamento;
    
class Cliente extends BaseController{
        protected $clienteModel;

        public function __construct() {
            $this->clienteModel= new ClienteModel();
        }

        public function index($estado=1) {

            $query = $this->getClientes($estado);
            $departamentos= new Departamento();

            $guardar = session('guardar');
            $actualizar = session('actualizar');
            $eliminar = session('eliminar');

            $data = [
                'titulo' => 'Clientes',
                'datos' => $query,
                'departamentos' => $departamentos->getDepartamentos(1),
                'guardar' => $guardar,
                'actualizar' => $actualizar,
                'eliminar' => $eliminar
            ];
            echo view('templates/header');
            echo view('templates/menu');
            echo view('forms/clientes/index_view',$data);
            echo view('templates/footer');
        }

        public function eliminados($activo=0){
            //ordenar por id de forma decente
            $clienteModel= $this->getClientes($activo);
            
            $data = [
                'titulo'=>'Clientes Eliminados',
                'datos'=>$clienteModel
            ];
            echo view('templates/header');
            echo view('templates/menu');
            echo view('forms/clientes/inactivos_view',$data);
            echo view('templates/footer');
        }

        public function getClientes($estado) {  
            $query = $this->clienteModel->select('*');
            $query->join('departamentos','departamentos.departamento_id=clientes.departamento_id');
            $query->where('clientes.estado',$estado);
            $query = $query->findAll();
            return $query;
        }

        public function getClientoJson(){
            $query = $this->clienteModel->select('*');
            $query = $query->findAll();
            echo json_encode($query);
        }
        public function insertar(){
            $response=$this->clienteModel->save([
                'nombre_cliente' => $this->request->getPost('nombre_cliente'),
                'apellido_cliente'=>$this->request->getPost('apellido_cliente'),
                'numero_telefono'=>$this->request->getPost('numero_telefono'),
                'correo'=>$this->request->getPost('correo'),
                'municipio'=>$this->request->getPost('municipio'),
                'departamento_id'=>$this->request->getPost('departamento_id'),
                'direccion'=>$this->request->getPost('direccion')
            ]);
            return $response;
        }
        public function actualizar(){
            $response=$this->clienteModel->update($this->request->getPost('cliente_id'),[
                'nombre_cliente' => $this->request->getPost('nombre_cliente'),
                'apellido_cliente'=>$this->request->getPost('apellido_cliente'),
                'numero_telefono'=>$this->request->getPost('numero_telefono'),
                'correo'=>$this->request->getPost('correo'),
                'municipio'=>$this->request->getPost('municipio'),
                'departamento_id'=>$this->request->getPost('departamento_id'),
                'direccion'=>$this->request->getPost('direccion')
            ]);
            return $response;
        }


        public function action(){
            if($this->request->getPost('cliente_id')==null){
                $response = $this->insertar();
                if($response){
                    return redirect()->to(base_url().'/Cliente')->with('guardar','ok');
                }else{
                    return redirect()->to(base_url().'/Cliente')->with('guardar','error');
                }
            }else{
                $response = $this->actualizar();
                if($response){
                    return redirect()->to(base_url().'/Cliente')->with('actualizar','ok');
                }else{
                    return redirect()->to(base_url().'/Cliente')->with('actualizar','error');
                }
            }
        }

        public function eliminar($id){
            $inactivo=0;
            $response=$this->clienteModel->update($id,[
                'estado' => $inactivo ]);


            if($response){
                return redirect()->to(base_url().'/Cliente')->with('eliminar','ok');
            }else{
                return redirect()->to(base_url().'/Cliente')->with('eliminar','error');
            }
        }

        public function restaurar($id){
            $activo=1;
            $response=$this->clienteModel->update($id,[
                'estado' => $activo ]);

            return redirect()->to(base_url('Cliente'));
        }
                

}

?>