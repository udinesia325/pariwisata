<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{MakananModel, TransaksiModel};


class AdminTransaksi extends BaseController
{
    public $transaksi;
    public $makanan;
    public function __construct()
    {
        $this->transaksi  = new TransaksiModel();
        $this->makanan  = new MakananModel();
    }
    public function index()
    {
        //
        $data['transaksi'] = $this->transaksi->db->table("transaksi")
            ->select("*")
            ->join("login_user", "transaksi.id_user = login_user.id_user")
            ->get()->getResultArray();

        // dd($data["transaksi"]);

        return view("admin/transaksi/index", $data);
    }
    public function konfirmasi($id_transaksi)
    {
        $this->transaksi->db->query("UPDATE transaksi SET status = 'dikonfrmasi' WHERE id_transaksi = '$id_transaksi'");
        $oldMakanan = $this->makanan->findAll();

        $all = $this->transaksi->db->table("transaksi")->select("*")
            ->join("detail_transaksi", "detail_transaksi.id_transaksi = transaksi.id_transaksi")
            ->where("transaksi.id_transaksi", $id_transaksi)
            ->get()->getResultArray();
        for ($i = 0; $i < count($all); $i++) {
            $id_barang = $all[$i]["id_barang"];
            $makanan = $this->makanan->find($id_barang);
            $stok = $makanan["stok"];
            $sisaStok = $stok - $all[$i]["qty"];
            $this->makanan->db->query("UPDATE makanan SET stok = $sisaStok WHERE id_makanan = '$id_barang'");
        }
        // return;
        session()->setFlashdata("pesan", "berhasil dikonfirmasi");
        return redirect()->to(base_url("admin/transaksi"));
    }
}
