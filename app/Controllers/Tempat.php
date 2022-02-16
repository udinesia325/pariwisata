<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{TempatModel,MakananModel,KategoriModel};


class Tempat extends BaseController
{
    public $tempat;
    public $kategori;
    public $makanan;

    public function __construct()
    {
        $this->tempat = new TempatModel();
        $this->makanan = new MakananModel();
        $this->kategori = new KategoriModel();
    }

    public function index($id = null)
    {
        //

        $data = [
            "tempat" => $this->tempat->findAll()
        ];
        return view('tempat/index', $data);
    }
    public function detail($id)
    {
        $data = [
            "detail"=>$this->tempat->find($id),
            'tempat'=>$this->tempat->findAll(),
            'kategori'=>$this->kategori->findAll(),
            'makanan'=>$this->makanan->detail($id)
        ];     
        return view('tempat/detail',$data);
    }
    //untuk tempat luar negeri
    public function luar()
    {
        $data = [
            'kategori'=>$this->kategori->findAll(),
            'tempat'=>$this->tempat->findAll(),
            'tipeTempat'=>$this->tempat->tipe('luar')
        ];
        return view('tempat/tipeTempat',$data);
    }
    public function dalam()
    {
        $data = [
            'kategori'=>$this->kategori->findAll(),
            'tempat'=>$this->tempat->findAll(),
            'tipeTempat'=>$this->tempat->tipe('dalam')
        ];
        return view('tempat/tipeTempat',$data);
    }
}
