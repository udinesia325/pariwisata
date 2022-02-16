<?= $this->extend("template/index"); ?>
<?= $this->section("content"); ?>

<div class="p-5 bg-light mt-5">
    <div class="container">
        <h1 class="display-3"></h1>
        <p class="lead"><?= $detail['nama_tempat'] ?></p>
        <img src="" alt="<?= $detail['gambar'] ?>" class="img-fluid">
        <hr class="my-2">
        <p><?= $detail['deskripsi'] ?></p>

    </div>
</div>
<div class="row mt-3 pt-3">
<?php if (count($makanan) == 0) : ?>
        <div class="p-5 bg-light">
            <div class="container">
                <h1 class="display-3 text-center">Kuliner Belum Tersedia !</h1>
               
            </div>
        </div>


    <?php endif; ?>
    <?php foreach ($makanan as $m) : ?>
        <div class="col-10 col-md-4 col-lg-3">
            <div class="card">
                <img class="card-img-top" src="" alt="<?= $m['gambar'] ?>">
                <div class="card-body">
                    <h4 class="card-title"><?= $m['nama_makanan'] ?></h4>
                    <p class="card-text"><?= $m['deskripsi'] ?></p>
                    <div class="row">
                        <div class="col-6">Harga : <b><?= $m['harga'] ?></b></div>
                        <div class="col-6"><a href="<?= base_url('keranjang/tambah/' . $m['id_makanan']) ?>" class="btn btn-dark">+ keranjang</a></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>