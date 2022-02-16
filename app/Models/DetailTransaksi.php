<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksi extends Model
{
    protected $primaryKey       = 'id_dt';
    protected $table            = 'detail_transaksi';
    protected $allowedFields    = ["id_dt","id_transaksi","id_barang","qty"];
   
}
