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
            echo view('templates/menu');
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
            echo view('templates/menu');
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
            $nombre="default";
            $file='';

            //validar si viene algun archivo con get file

            if(($this->request->getFile('imagen')!='')){
                $file = $this->request->getFile('imagen');
                $nombre=$this->guardarImagen($file);
            }
                
            

            $response=$this->productoModel->save([
                'nombre_producto' => $this->request->getPost('nombre_producto'),
                'descripcion'=>$this->request->getPost('descripcion'),
                'costo'=>$this->request->getPost('costo'),
                'precio_unitario'=>$this->request->getPost('precio_unitario'),
                'ganancia'=>$this->request->getPost('ganancia'),
                'cantidad'=>$this->request->getPost('cantidad'),
                'tipoproducto_id'=>$this->request->getPost('tipoproducto_id'),
                'marca_id'=>$this->request->getPost('marca_id'),
                'imagen'=>$nombre,
            ]);
            return $response;
        }
        public function actualizar(){
            //inicializar file
            $file='';
            $name="";
            $producto=$this->productoModel->find($this->request->getPost('producto_id'));
            if($this->request->getFile('imagen')!=''){
                $file = $this->request->getFile('imagen');
                $name= $this->actualizarImagen($file,$producto['imagen']);
            }else{
                $name=$producto["imagen"];
            }
            

            $response=$this->productoModel->update($this->request->getPost('producto_id'),[
                'nombre_producto' => $this->request->getPost('nombre_producto'),
                'descripcion'=>$this->request->getPost('descripcion'),
                'costo'=>$this->request->getPost('costo'),
                'precio_unitario'=>$this->request->getPost('precio_unitario'),
                'ganancia'=>$this->request->getPost('ganancia'),
                'cantidad'=>$this->request->getPost('cantidad'),
                'tipoproducto_id'=>$this->request->getPost('tipoproducto_id'),
                'marca_id'=>$this->request->getPost('marca_id'),
                'imagen'=>$name
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

        public function reporteProducto($id){
            $query = $this->productoModel->select('*');
            $query->join('tipo_productos','tipo_productos.tipoproducto_id=productos.tipoproducto_id');
            $query->join('marcas','marcas.marca_id=productos.marca_id');
            $query->where('productos.producto_id',$id);
            $query = $query->find($id);
            $data = [
                'producto' => $query
            ];

            echo view('templates/header');
            echo view('forms/productos/reportes/reporte_producto_view',$data);
            echo view('templates/footer');
            
        }

        public function guardarImagen($file){
            $nombre = md5(date('YmdHis'));
            $file->move('uploads/',$nombre);
            return $nombre;
        
        }

        public function actualizarImagen($file,$nombre){
            //eliminar imagen que no se llame default
            if($nombre!='default'){
                unlink('uploads/'.$nombre);
                $nombre=$this->guardarImagen($file);
            }else{
                $nombre=$this->guardarImagen($file);
                
            }
            return $nombre;
           
        }
                

}

?>