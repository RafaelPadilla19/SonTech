<?php
namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model{
    protected $table = 'clientes';
    protected $primaryKey = 'cliente_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_cliente','apellido_cliente','numero_telefono','correo','municipio','departamento_id','direccion','estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>