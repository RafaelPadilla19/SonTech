<?php
namespace App\Models;

use CodeIgniter\Model;

class TipoUsuarioModel extends Model{
    protected $table = 'tipo_usuario';
    protected $primaryKey = 'tipousuario_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_tipo_usuario','estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>