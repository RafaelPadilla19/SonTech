<?php
namespace App\Models;

use CodeIgniter\Model;

class TipoProductoModel extends Model{
    protected $table = 'tipo_productos';
    protected $primaryKey = 'tipoproducto_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_tipo_producto','estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>