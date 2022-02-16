<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table            = 'keranjang';
    protected $allowedFields    = ["id_user","id_makanan"];
    public function isExist($id_user,$id_makanan)
    {
        return $this->db->query("SELECT * FROM keranjang WHERE  id_user='$id_user' and id_makanan = '$id_makanan'")
        ->getResultArray();
    }
    public function deleteById($id_makanan)
    {
        $id_user = session()->get("id_user");
        $this->db->query("DELETE FROM keranjang WHERE id_user = '$id_user' AND id_makanan = '$id_makanan' ");
    }
}
