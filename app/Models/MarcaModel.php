<?php
namespace App\Models;

use CodeIgniter\Model;

class MarcaModel extends Model{
    protected $table = 'marcas';
    protected $primaryKey = 'marca_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_marca','estado_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>