<?php
namespace App\Models;

use CodeIgniter\Model;

class TipoProductoModel extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'producto_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_producto','descripcion','costo','precio_unitario','ganancia','cantidad','tipoproducto_id','marca_id','estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>