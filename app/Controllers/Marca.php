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
            $guardar = session('guardar');
            $actualizar = session('actualizar');
            $eliminar = session('eliminar');
            $data = [
                'titulo'=>'Marcas',
                'datos'=>$marcaModel,
                'guardar'=>$guardar,
                'actualizar'=>$actualizar,
                'eliminar'=>$eliminar
            ];
            echo view('templates/header');
            echo view('templates/menu');
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
            echo view('templates/menu');
            echo view('forms/marcas/inactivos_view',$data);
            echo view('templates/footer');
        }

        public function getMarcas($estado){
            $marcaModel=$this->marcaModel->where('estado',$estado)->orderBy('marca_id','DESC')->findAll();
            return $marcaModel;
        }

        public function insertar(){
            $response=$this->marcaModel->save(['nombre_marca' => $this->request->getPost('nombre')]);
            return $response;
        }

        public function actualizar(){
            $id= $this->request->getPost('id');
            $response=$this->marcaModel->update($id,[
                'nombre_marca' => $this->request->getPost('nombre')
            ]);
         
            return $response;
        }
        
        public function action(){
            if($this->request->getPost('id')==null){
                $response = $this->insertar();
                if($response){
                    return redirect()->to(base_url().'/marca')->with('guardar','ok');
                }else{
                    return redirect()->to(base_url().'/marca')->with('guardar','error');
                }
            }else{
                $response = $this->actualizar();
                if($response){
                    return redirect()->to(base_url().'/marca')->with('actualizar','ok');
                }else{
                    return redirect()->to(base_url().'/marca')->with('actualizar','error');
                }
            }
        }

        public function eliminar($id){
            $inactivo=0;
            $response=$this->marcaModel->update($id,[
                'estado' => $inactivo ]);


            if($response){
                return redirect()->to(base_url().'/marca')->with('eliminar','ok');
            }else{
                return redirect()->to(base_url().'/marca')->with('eliminar','error');
            }
        }

        public function restaurar($id){
            $activo=1;
            $response=$this->marcaModel->update($id,[
                'estado' => $activo ]);

            return redirect()->to(base_url('marca'));
        }

       
        
        
    }


?>