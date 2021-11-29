<?php
namespace App\Models;

use CodeIgniter\Model;

class DetalleFacturaVentaModel extends Model{
    protected $table = 'detallefactura_venta';
    protected $primaryKey = 'detallefactura_venta_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['producto_id','facturaventa_id','cantidad','precio_total'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>