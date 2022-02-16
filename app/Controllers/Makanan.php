<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{MakananModel,TempatModel,KategoriModel,KeranjangModel};
class Makanan extends BaseController
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
        $key = $this->request->getVar("cari");
        $data = [
            "makanan"=>$this->makanan->getMakanan($key),
            "tempat"=>$this->tempat->findAll(),
            "kategori"=>$this->kategori->findAll(),
        ];
        // dd($data['makanan']);
        return view("makanan/index",$data);
    }
    public function kategori($id_kategori)
    {
        $data = [
            "kategori"=>$this->kategori->findAll(),
            "kategoriMakanan"=>$this->makanan->db->query("select * from makanan where id_kategori = '$id_kategori'")->getResultArray()
        ];
        return view("makanan/kategori",$data);
    }       
    public function beli($id_makanan)
    {
        $old = $this->makanan->find($id_makanan);
        $oldStok = $this->makanan->find($id_makanan)["stok"];
        $buyStok = $this->request->getVar("stok");
        if ($oldStok - $buyStok < 0 ){
            session()->setFlashdata("pesan","pesanan melebihi stok");
            return redirect()->to(base_url("keranjang"));

        }else{
            $totalStok = $oldStok - $buyStok;
            // kurangi stok
            $this->makanan->db->query("update makanan set stok ='$totalStok' where id_makanan = '$id_makanan'");
            // hapus di keranjang
            $this->keranjang->deleteById($id_makanan);
            $harga = $old["harga"] * $buyStok;
            session()->setFlashdata("pesan","anda membeli $buyStok barang dengan harga Rp. $harga");

            return redirect()->to(base_url('keranjang'));
        }
    }
}
