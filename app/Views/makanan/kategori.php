<?= $this->extend("template/index"); ?>
<?= $this->section("content"); ?>

<div class="row mt-5 pt-5 justify-content-evenly">
    <?php if(count($kategoriMakanan)== 0): ?>
        <h1 class="text-center display-2">Makanan Belum Tersedia </h1>
    <?php endif ;?>
    <?php foreach($kategoriMakanan as $k) : ?>
    <div class="col-6 col-md-3 col-lg-3">
        <div class="card ">
          <img class="card-img-top" src="<?= base_url("img/".$k['gambar']) ?>" alt="<?= $k['gambar'] ?>">
          <div class="card-body">
            <h4 class="card-title"><?= $k['nama_makanan'] ?></h4>
            <p class="card-text"><?= $k['deskripsi'] ?></p>
            <div class="row">
                <div class="col-6">Harga : <?= $k['harga'] ?></div>
                <div class="col-6">
                    <a class="btn btn-warning" href="<?= base_url("keranjang/tambah/".$k['id_makanan']) ?>"><i class="fa fa-cart-plus"></i></a>
                </div>
            </div>
          </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>