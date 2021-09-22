<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\ProductoModel;
    use App\Controllers\TipoProducto;
    use App\Controllers\Marca;
    
class Producto extends BaseController{
        protected $productoModel;

        public function __construct() {
            $this->productoModel= new ProductoModel();
        }

        public function index($estado=1) {

            $query = $this->getProductos($estado);
            $marcas= new Marca();
            $tipoProductos= new TipoProducto();


            $guardar = session('guardar');
            $actualizar = session('actualizar');
            $eliminar = session('eliminar');

           // $query=$this->productoModel->where('estado',$estado)->findAll();
            $data = [
                'titulo' => 'Productos',
                'datos' => $query,
                'marcas' => $marcas->getMarcas(1),
                'tipoProductos' => $tipoProductos->getTipoProductos(1),
                'guardar' => $guardar,
                'actualizar' => $actualizar,
                'eliminar' => $eliminar
            ];
            echo view('templates/header');
            echo view('forms/productos/index_view',$data);
            echo view('templates/footer');
        }

        public function eliminados($activo=0){
            //ordenar por id de forma decente
            $productoModel= $this->getProductos($activo);
            
            $data = [
                'titulo'=>'Producto Eliminados',
                'datos'=>$productoModel
            ];
            echo view('templates/header');
            echo view('forms/productos/inactivos_view',$data);
            echo view('templates/footer');
        }

        public function getProductos($estado) {  
            $query = $this->productoModel->select('*');
            $query->join('tipo_productos','tipo_productos.tipoproducto_id=productos.tipoproducto_id');
            $query->join('marcas','marcas.marca_id=productos.marca_id');
            $query->where('productos.estado',$estado);
            $query = $query->findAll();
            return $query;
        }
        public function insertar(){
            $response=$this->productoModel->save([
                'nombre_producto' => $this->request->getPost('nombre_producto'),
                'descripcion'=>$this->request->getPost('descripcion'),
                'costo'=>$this->request->getPost('costo'),
                'precio_unitario'=>$this->request->getPost('precio_unitario'),
                'ganancia'=>$this->request->getPost('ganancia'),
                'cantidad'=>$this->request->getPost('cantidad'),
                'tipoproducto_id'=>$this->request->getPost('tipoproducto_id'),
                'marca_id'=>$this->request->getPost('marca_id')
            ]);
            return $response;
        }
        public function actualizar(){
            $response=$this->productoModel->update($this->request->getPost('producto_id'),[
                'nombre_producto' => $this->request->getPost('nombre_producto'),
                'descripcion'=>$this->request->getPost('descripcion'),
                'costo'=>$this->request->getPost('costo'),
                'precio_unitario'=>$this->request->getPost('precio_unitario'),
                'ganancia'=>$this->request->getPost('ganancia'),
                'cantidad'=>$this->request->getPost('cantidad'),
                'tipoproducto_id'=>$this->request->getPost('tipoproducto_id'),
                'marca_id'=>$this->request->getPost('marca_id')
            ]);
            return $response;
        }


        public function action(){
            if($this->request->getPost('producto_id')==null){
                $response = $this->insertar();
                if($response){
                    return redirect()->to(base_url().'/Producto')->with('guardar','ok');
                }else{
                    return redirect()->to(base_url().'/Producto')->with('guardar','error');
                }
            }else{
                $response = $this->actualizar();
                if($response){
                    return redirect()->to(base_url().'/Producto')->with('actualizar','ok');
                }else{
                    return redirect()->to(base_url().'/Producto')->with('actualizar','error');
                }
            }
        }

        public function eliminar($id){
            $inactivo=0;
            $response=$this->productoModel->update($id,[
                'estado' => $inactivo ]);


            if($response){
                return redirect()->to(base_url().'/Producto')->with('eliminar','ok');
            }else{
                return redirect()->to(base_url().'/Producto')->with('eliminar','error');
            }
        }

        public function restaurar($id){
            $activo=1;
            $response=$this->productoModel->update($id,[
                'estado' => $activo ]);

            return redirect()->to(base_url('Producto'));
        }
                

}

?>