<?php
namespace App\Models;

use CodeIgniter\Model;

class MarcaModel extends Model{
    protected $table = 'marca';
    protected $primaryKey = 'marcaId';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombreMarca','activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


     

}

?>