<?php

namespace App\Models;

use CodeIgniter\Model;

class TempatModel extends Model
{
    protected $table            = 'tempat';
    protected $primaryKey       = 'id_tempat';
  
    protected $allowedFields    = ['nama_tempat','deskripsi','gambar','tipe'];

    public function getTempat($id = null)
    {
        return is_null($id) ?  $this->findAll():  $this->find($id);
    }
    /**
     * @param string
     * pilih antara luar atau dalam negeri
    */
  public function tipe($tipe)
  {
      return $this->db->table('tempat')->where('tipe',$tipe)->get()->getResultArray();
  }
}
