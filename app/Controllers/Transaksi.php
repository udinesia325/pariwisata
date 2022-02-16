<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{MakananModel, KeranjangModel, TransaksiModel, KategoriModel, DetailTransaksi};

class Transaksi extends BaseController
{
    public $makanan;
    public $keranjang;
    public $kategori;
    public $transaksi;
    public $detail;
    public function __construct()
    {
        $this->makanan = new MakananModel();
        $this->kategori = new KategoriModel();
        $this->keranjang = new KeranjangModel();
        $this->transaksi = new TransaksiModel();
        $this->detail = new DetailTransaksi();
    }
    public function index()
    {
        //
        $allData =  $this->transaksi->db->table("transaksi")->select("*")
            ->join("detail_transaksi", "detail_transaksi.id_transaksi = transaksi.id_transaksi")
            ->join("makanan", "makanan.id_makanan = detail_transaksi.id_barang")
            ->where("id_user", session()->get("id_user"))
            ->get()->getResultArray();
        $data = [
            "kategori" => $this->kategori->findAll(),
            "transaksi" => $allData
        ];
        // dd($data["transaksi"]);/
        return view("transaksi/index", $data);
    }
    public function tambah($id_makanan)
    {
        $oldStok = $this->makanan->find($id_makanan)["stok"];

        $beliStok = $oldStok - 1;
        if ($oldStok - 1 >= 0) {

            $this->makanan->db->query("update makanan set stok = '$beliStok' where id_makanan = '$id_makanan'");
            $dataTransaksi = [
                "id_user" => session()->get("id_user"),
                "id_makanan" => $id_makanan,
                "stok_beli" => 1
            ];
            $this->transaksi->save($dataTransaksi);
            session()->setFlashdata("pesan", "berhasil di tambahkan di Transaksi");
            return redirect()->to(base_url(""));
        } else {
            session()->setFlashdata("pesan", "Stok habis");
            return redirect()->to(base_url(""));
        }
    }
    public function beli()
    {
        $stok = $this->request->getVar('stok');
        $id_user = session()->get("id_user");
        $id_makanan = $this->request->getVar("id_makanan");
        d($id_makanan);
        d($stok);
        // $this->makanan->updateBatch($);
        for ($i = 0; $i < count($stok); $i++) {

            $idmkn = $id_makanan[$i];
            $oldStok = $this->makanan->find($idmkn)["stok"];
            $stoki = $stok[$i];
            $sisaStok = $oldStok - $stoki;
            if ($sisaStok >= 0) {
                // $this->makanan->db->query("update makanan set stok = '$sisaStok' where id_makanan = '$idmkn'");
                $dataTransaksi = [
                    "id_user" => $id_user,
                    "id_makanan" => $idmkn,
                    "stok_beli" => $stoki
                ];
                $this->keranjang->db->query("delete from keranjang where id_makanan = '$idmkn' and id_user = '$id_user'");
            }
            // $this->makanan->update($idmkn,["stok"=>$stok[$i]]);
            // $data=[[]
            //     'stok'          =>$stok[$i]
            // ];
            // $this->makanan->updateBatch($id)
            
        }
        dd($dataTransaksi);
        $this->transaksi->save($dataTransaksi);
        return redirect()->to("transaksi");
    }
    public function tambahTransaksi()
    {
        $data = count($this->transaksi->findAll());
        $stok = $this->request->getVar('stok');
        $harga = $this->request->getVar('harga');
        $id_user = session()->get("id_user");
        $id_makanan = $this->request->getVar("id_makanan");
        $kode = $data;
        if ($data > 0) {
            $kode += 1;
        } else {
            $kode = 1;
        }
        $result = 0;
        for ($i = 0; $i < count($stok); $i++) {
            $totalHarga = $harga[$i] * $stok[$i];
            $result += $totalHarga;
            $data = [
                "id_transaksi" => $kode,
                "id_barang" => $id_makanan[$i],
                "qty" => $stok[$i]
            ];
            $this->detail->save($data);
        }
        $data = [
            "id_transaksi" => $kode,
            "id_user" => session()->get("id_user"),
            "total" => $result
        ];
        // d($data);
        $this->transaksi->insert($data);
        $this->keranjang->db->query("DELETE FROM keranjang WHERE id_user = '$id_user'");
        return redirect()->to(base_url("transaksi"));
    }
    public function pembayaran()
    {
        $id_user = session()->get("id_user");
        $this->transaksi->db->query("UPDATE transaksi SET status = 'menunggu konfirmasi' WHERE id_user = '$id_user' AND status = 'belum dibayar'");
        session()->setFlashdata("pesan", "Pembayaran sedang menunggu konfirmasi admin silahkan hubungi no wa : 08285720498");
        return redirect()->to(base_url("transaksi"));
    }
}