<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{TempatModel,MakananModel,KategoriModel};

class Client extends BaseController
{
    public $tempat;
    public $makanan;
    public $kategori;
    public function __construct() {
        $this->tempat = new TempatModel();
        $this->makanan = new MakananModel();
        $this->kategori = new KategoriModel();
    }
    public function index()
    {
        //
        $data =[
            'tempat'=>$this->tempat->findAll(),
            'makanan'=>$this->makanan->findAll(),
            "kategori"=>$this->kategori->findAll()
        ];
       
        return view('client/index',$data);
    }
    public function tempat($id = null)
    {
        $data =[
            "tempat"=>$this->tempat->findAll(),
            "tempatFocus"=>$this->tempat->find($id)
        ];
        return view("client/tempat",$data);
    }
    public function keranjang($id)
    {
        if (session()->get("userId") == null) {
            return redirect()->to(base_url("/"));
        }
    }
}
