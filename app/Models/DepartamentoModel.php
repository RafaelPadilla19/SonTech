<?php
namespace App\Models;

use CodeIgniter\Model;

class DepartamentoModel extends Model{
    protected $table = 'departamentos';
    protected $primaryKey = 'departamento_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_departamento','estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>