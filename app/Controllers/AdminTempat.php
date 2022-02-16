<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\TempatModel;
use CodeIgniter\Database\BaseUtils;

class AdminTempat extends BaseController
{
    public $tempat;
    public function __construct()
    {
        $this->tempat = new TempatModel();
    }
    public function index()
    {
        $data["tempat"] = $this->tempat->findAll();
        return view("admin/tempat/index", $data);
    }
    public function tambah()
    {
        return view("admin/tempat/tambah");
    }
    public function save()
    {
        $gambar = $this->request->getFile("gambar");
        $form = $this->request->getVar();


        $form["gambar"] = ($gambar->getSize() > 0) ? $gambar->getName() : "default-tempat.jpg";


        $this->tempat->save($form);
        ($gambar->getSize() > 0) ? $gambar->move("img") : null;
        session()->setFlashdata("pesan", "berhasil menambahkan tempat baru");
        return redirect()->to("admin/tempat");
    }
    public function edit($id)
    {
        $data["tempat"] = $this->tempat->find($id);
        return view("admin/tempat/edit", $data);
    }
    public function update()
    {
        $oldData = $this->tempat->find($this->request->getVar("id_tempat"));
        $dataForm = $this->request->getVar();
        $gambar = $this->request->getFile("gambar");

        $dataForm["gambar"] = ($gambar->getSize() > 0) ? $gambar->getName() : $oldData['gambar'];

        $this->tempat->save($dataForm);
        session()->setFlashdata("pesan", "Data berhasil Di update");
        return redirect()->to(base_url("admin/tempat"));
    }


    public function delete($id)
    {
        $this->tempat->delete($id);
        session()->setFlashdata("pesan", "berhasil dihapus");
        return redirect()->to(base_url("admin/tempat"));
    }
}
