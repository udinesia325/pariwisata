<?= $this->extend("template/index"); ?>
<?= $this->section("content"); ?>
<div class="row mt-5 pt-5 justify-content-evenly">
    <?php if(count($makanan)==0): ?>
        <div class="p-5">
            <div class="container">
                <h1 class="display-4 text-center">Keranjang Masih Kosong !</h1>
            </div>
        </div>
    <?php endif; ?>
    <?php foreach ($makanan as $m) : ?>
        <div class="col col-6  col-md-3 mb-3">
            <div class="card">
                <img class="card-img-top" src="<?= base_url("img/".$m['gambar']) ?>" alt="<?= $m['gambar'] ?>">
                <div class="card-body">
                    <h4 class="card-title"><?= $m['nama_makanan'] ?></h4>
                    <div class="row my-2">
                        <div class="col-6">Harga : </div>
                        <div class="col-6"><?= $m['harga'] ?></div>
                        <div class="col-6">Stok : </div>
                        <div class="col-6"><?= $m['stok'] ?></div>
                    </div>
                    <a href="<?= base_url("keranjang/tambah/".$m['id_makanan']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-cart-plus"></i></a>
                    <a href="<?= base_url("transaksi/tambah/".$m['id_makanan']) ?>" class="btn btn-success  btn-sm">beli</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>


