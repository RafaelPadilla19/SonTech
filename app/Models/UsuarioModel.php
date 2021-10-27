<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_usuario','apellido_usuario','correo','clave','tipousuario_id','estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>