<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
use App\Models\TipoProductoModel;

class TipoProducto extends BaseController{
        protected $tipoproductoModel;

        public function __construct() {
            $this->tipoproductoModel= new TipoProductoModel();
        }

        public function index($activo=1){
            //ordenar por id de forma decente
            $tipoproductoModel= $this->getTipoProductos($activo);
            $guardar = session('guardar');
            $actualizar = session('actualizar');
            $eliminar = session('eliminar');
            $data = [
                'titulo'=>'Tipos de producto',
                'datos'=>$tipoproductoModel,
                'guardar'=>$guardar,
                'actualizar'=>$actualizar,
                'eliminar'=>$eliminar
            ];
            echo view('templates/header');
            echo view('templates/menu');
            echo view('forms/tipo_producto/index_view',$data);
            echo view('templates/footer');
        }

        public function eliminados($activo=0){
            //ordenar por id de forma decente
            $tipoproductoModel= $this->getTipoProductos($activo);
            
            $data = [
                'titulo'=>'Tipos de producto Eliminados',
                'datos'=>$tipoproductoModel
            ];
            echo view('templates/header');
            echo view('templates/menu');
            echo view('forms/tipo_producto/inactivos_view',$data);
            echo view('templates/footer');
        }

        public function getTipoProductos($estado){
            $tipoproductoModel=$this->tipoproductoModel->where('estado',$estado)->orderBy('tipoproducto_id','DESC')->findAll();
            return $tipoproductoModel;
        }

        public function insertar(){
            $response=$this->tipoproductoModel->save(['nombre_tipo_producto' => $this->request->getPost('nombre')]);
            if($response){
                return redirect()->to(base_url().'/TipoProducto')->with('guardar','ok');
            }else{
                return redirect()->to(base_url().'/TipoProducto')->with('guardar','error');
            }
        }

        public function actualizar(){
            $id= $this->request->getPost('id');
            $response=$this->tipoproductoModel->update($id,[
                'nombre_tipo_producto' => $this->request->getPost('nombre')
            ]);
         
            return $response;
        }
        
        public function action(){
            if($this->request->getPost('id')==null){
                $response = $this->insertar();
                if($response){
                    return redirect()->to(base_url().'/TipoProducto')->with('guardar','ok');
                }else{
                    return redirect()->to(base_url().'/TipoProducto')->with('guardar','error');
                }
            }else{
                $response = $this->actualizar();
                if($response){
                    return redirect()->to(base_url().'/TipoProducto')->with('actualizar','ok');
                }else{
                    return redirect()->to(base_url().'/TipoProducto')->with('actualizar','error');
                }
            }
        }

        public function eliminar($id){
            $inactivo=0;
            $response=$this->tipoproductoModel->update($id,[
                'estado' => $inactivo ]);


            if($response){
                return redirect()->to(base_url().'/TipoProducto')->with('eliminar','ok');
            }else{
                return redirect()->to(base_url().'/TipoProducto')->with('eliminar','error');
            }
        }

        public function restaurar($id){
            $activo=1;
            $response=$this->tipoproductoModel->update($id,[
                'estado' => $activo ]);

            return redirect()->to(base_url('TipoProducto'));
        }

    }


?>