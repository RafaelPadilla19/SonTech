<?php
namespace App\Models;

use CodeIgniter\Model;

class FacturaVentaModel extends Model{
    protected $table = 'factura_venta';
    protected $primaryKey = 'facturaventa_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['descricion_factura','cliente_id','usuario_id','subtotal','IVA','total'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>