<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{MakananModel,TempatModel,KategoriModel,KeranjangModel};


class Keranjang extends BaseController
{
    public $makanan;
    public $tempat;
    public $kategori;
    public $keranjang;
    public function __construct() {
        $this->makanan = new MakananModel();
        $this->tempat = new TempatModel();
        $this->kategori = new KategoriModel();
        $this->keranjang = new KeranjangModel();
    }
    public function index()
    {
        //
        // dd($this->makanan->getMakananById(1));
        $data = [
            "tempat"=>$this->tempat->findAll(),
            "kategori"=>$this->kategori->findAll(),
            "makanan"=>$this->makanan->getMakananById(session()->get("id_user"))
        ];

        return view("keranjang/index",$data);
    }
    public function tambah($id_makanan)
    {
        $id_user = session()->get("id_user");
        $data = [
            "id_user"=>$id_user,
            "id_makanan"=>$id_makanan
        ];
        if(count($this->keranjang->isExist($id_user,$id_makanan))== 0){
            $this->keranjang->save($data);
            session()->setFlashdata("pesan","Berhasil Menambahkan Makanan Baru !");
            return redirect()->to(base_url("keranjang"));
            
        }else {
            
            session()->setFlashdata("pesan","Makanan Teresebut Sudah ada !");
            return redirect()->to(base_url("keranjang"));
        }
        
       
    }
    public function delete($id_makanan)
    {
        $this->keranjang->deleteById($id_makanan);
        return redirect()->to(base_url('/keranjang'));
    }
}
