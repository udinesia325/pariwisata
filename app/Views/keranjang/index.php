<?= $this->extend("template/index"); ?>
<?= $this->section('content'); ?>
<style>
    .input-polos {
        border: none;
        background-color: white;
    }

    .input-polos:focus {
        outline: none;
    }
</style>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <p><?= session()->getFlashdata("pesan") ?></p>
    </div>
<?php endif; ?>
<!-- modal -->
<!-- Button trigger modal -->

<?php if (count($makanan) == 0) : ?>
    <div class="p-5 my-5">
        <div class="container">
            <h1 class="display-4 text-center">Keranjang Masih Kosong !</h1>
        </div>
    </div>
<?php else : ?>

    <form action="<?= base_url("transaksi/tambahTransaksi") ?>" method="post">
        <div class="row mt-5 pt-5">

            <div class="col-12">
                <div class="row">
                    <div class="col-5">Barang</div>
                    <div class="col-3">Harga</div>
                    <div class="col-2">Jumlah</div>
                    <div class="col-2">Total</div>
                </div>
            </div>
            <?php $hargaSemua = 0;
            foreach ($makanan as $m) : ?>
                <!-- untuk disimpan di database -->
                <input type="hidden" value="<?= $m["id_makanan"] ?>" name="id_makanan[]">
                <div class="col-12 my-2">
                    <div class="row">
                        <div class="col-5">
                            <img src="<?= base_url("img/" . $m["gambar"]) ?>" alt="<?= $m["gambar"] ?>">
                            <p>Stok tersedia : <?= $m["stok"] ?></p>
                        </div>
                        <div class="col-3"><input type="number" readonly name="harga[]" value="<?= $m["harga"] ?>" class="input-polos"></div>
                        <div class="col-2"><input type="number" name="stok[]" data-harga="<?= $m["harga"] ?>" class="form-control harga" value="1" min="1" max="<?= $m["stok"] ?>"></div>
                        <div class="col-2"><span class="total"><?= format_number($m["harga"]) ?></span></div>
                    </div>
                </div>
                <?php $hargaSemua += $m["harga"] ?>

            <?php endforeach; ?>
            <?php if (count($makanan) != 0) : ?>
                <div class="col-12 text-end">
                    <p class="fw-bold">Total Pembayaran : Rp. <span id="hargaSemua"><?= format_number($hargaSemua) ?></span></p>
                    <input type="submit" value="checkout" class="btn btn-sm btn-danger my-3">

                </div>
            <?php endif; ?>

        </div>
    </form>
<?php endif; ?>
<script>
    $(document).ready(function() {
        document.querySelectorAll(".harga").forEach((element) => {
            element.addEventListener("input", (e) => {
                // setiap stok di tambah ubah juga harga di sampingnya
                const spanHarga = e.target.parentElement.nextElementSibling
                // ubah isi di html nya
                const totalHarga = e.target.dataset.harga * e.target.value
                e.target.parentElement.nextElementSibling.firstChild.innerHTML = totalHarga.toLocaleString('ar-Ar')
                //ini untuk total semua harga
                let hargaSemua = document.getElementById("hargaSemua")
                let temp = 0;
                document.querySelectorAll(".harga").forEach(element => {
                    //ambil semua input dan kalkulasi semua dataset
                    temp += element.dataset.harga * element.value
                })
                hargaSemua.innerHTML = temp.toLocaleString("ar-AR")
            })
        })
    })
</script>

<?= $this->endSection(); ?>
<!-- <div class="col col-12 col-sm-12 col-md-4 col-lg-3">
<input type="hidden" value="= $m["id_makanan"] ?>" name="id_makanan[]">
<div class="card">
    <img class="card-img-top" src="holder.js/100x180/" alt="= $m['gambar'] ?>">
    <div class="card-body">
        <h4 class="card-title">= $m['nama_makanan'] ?></h4>
        <p class="card-text">= $m['deskripsi'] ?></p>
        <div class="row my-2">
            <div class="col-6">Harga : </div>
            <div class="col-6"><input type="number" readonly name="harga[]" value="= $m["harga"] ?>" class="form-control"></div>
            <div class="col-6">Stok : = $m["stok"] ?></div>
            <div class="col-6"><input type="number" name="stok[]" class="form-control" value="1" min="1" max="= $m["stok"] ?>" class="harga"></div>
        </div>
        <a href="= base_url("keranjang/delete/" . $m['id_makanan']) ?>" class="btn btn-danger btn-delete"><i class="fa fa-trash-alt"></i></a>
        <a href="= base_url("transaksi/tambah/" . $m['id_makanan']) ?>" class="btn btn-success">Beli</a>
    </div>
</div>

</div> -->