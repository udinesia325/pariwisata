<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{MakananModel, TempatModel, KategoriModel};

class AdminMakanan extends BaseController
{
    public $makanan;
    public $tempat;
    public $kategori;
    public function __construct()
    {
        $this->makanan = new MakananModel();
        $this->tempat = new TempatModel();
        $this->kategori = new KategoriModel();
    }
    public function index()
    {
        $data = [
            'makanan' => $this->makanan->findAll(),

        ];

        return view("admin/makanan/index", $data);
    }
    public function tambah()
    {
        $data = [
            'tempat' => $this->tempat->findAll(),
            'kategori' => $this->kategori->findAll(),
        ];
        return view("admin/makanan/tambah", $data);
    }
    public function simpan()
    {
        $gambar = $this->request->getFile("gambar");
        $dataForm = $this->request->getVar();

        $dataForm["gambar"] = $gambar->getSize() > 0 ? $gambar->getName() : "default.jpg";
        // dd($dataForm);
        $this->makanan->save($dataForm);
        $gambar->getSize() > 0 ? $gambar->move("img") : null;
        session()->setFlashdata('pesan', "Data berhasil ditambahkan!");
        return redirect()->to(base_url("admin/makanan"));
    }
    public function delete($id = null)
    {

        $this->makanan->delete($id);
        session()->setFlashdata("pesan", "berhasil di hapus");
        return redirect()->to(base_url("admin/makanan"));
    }
    public function edit($id)
    {
        $makanan = $this->makanan->find($id);
        $makanan == null ? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Halaman tidak ada ") : null;
        $data = [
            "makanan" => $makanan,
            "kategori" => $this->kategori->findAll(),
            "tempat" => $this->tempat->findAll(),
        ];
        return view("admin/makanan/edit", $data);
    }
    public function update()
    {
        $oldData = $this->makanan->find($this->request->getVar("id_makanan"));
        $dataForm = $this->request->getVar();
        $gambar = $this->request->getFile("gambar");
        $dataForm["gambar"] = ($gambar->getSize() > 0) ? $gambar->getName() : $oldData['gambar'];

        $this->makanan->save($dataForm);
        session()->setFlashdata("pesan", "Data berhasil Di update");
        return redirect()->to(base_url("admin/makanan"));
    }
}
