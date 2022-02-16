<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{KategoriModel};

class AdminKategori extends BaseController
{
    public $kategori;
    public function __construct()
    {
        $this->kategori = new KategoriModel();
    }
    public function index()
    {
        $data["kategori"] = $this->kategori->findAll();
        return view("admin/kategori/index", $data);
    }

    public function save()
    {
        $this->kategori->save($this->request->getVar());
        session()->setFlashdata("pesan", "berhasil ditambahkan");
        return redirect()->to(base_url("admin/kategori"));
    }
  
    public function update($id)
    {
        $dataForm = $this->request->getVar();
        $dataForm["id_kategori"] = $id;
        $this->kategori->save($dataForm);
        session()->setFlashdata("pesan", "Data berhasil Di update");
        return redirect()->to(base_url("admin/kategori"));
    }


    public function delete($id)
    {
        $this->kategori->delete($id);
        session()->setFlashdata("pesan", "berhasil dihapus");
        return redirect()->to(base_url("admin/kategori"));
    }
}
