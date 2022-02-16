<?php 
 namespace App\Models;
 use \CodeIgniter\Model;

 class MakananModel extends Model{
     protected $table = "makanan";
     protected $primaryKey ="id_makanan";
     protected $allowedFields =["id_tempat","nama_makanan",'harga','deskripsi',"gambar","id_kategori"];
     public function getMakanan($key = null) 
     {
         # code...
         return is_null($key) ? $this->findAll(): $this->db->table("makanan")->like("nama_makanan",$key)->get()->getResultArray();
                                                    
     }
     public function detail($id_tempat)
     {
         return $this->db->table('makanan')->select('*')->where("id_tempat",$id_tempat)->get()->getResultArray();
     }
     public function getMakananById($id_user)
     {
         return $this->db->table("makanan")
                         ->select("*")
                         ->join("keranjang","makanan.id_makanan = keranjang.id_makanan")
                         ->where("id_user",$id_user)
                         ->get()->getResultArray();
     }
 }


?>