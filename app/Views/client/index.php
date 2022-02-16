<?= $this->extend('template/index'); ?>
<?= $this->section("content"); ?>
<div class="row mt-5 justify-content-evenly">
  <div class="p-5 bg-light">
    <img src="<?= base_url("img/sate.jfif") ?>" alt="banner" class="banner-img">
  </div>
  <?php foreach ($makanan as $m) : ?>

    <div class="col  col-6 col-md-3 mb-3">
      <div class="card">
        <img src="<?= base_url("img/" . $m['gambar']) ?>" alt="<?= $m["gambar"] ?>" class="card-img-top">
        <div class="card-body">
          <h3 class="card-title"><?= $m["nama_makanan"] ?></h3>
          <p class="card-text">
            <b>Harga : <?=format_number($m["harga"]) ?></b>
            <hr>
            <a href="<?= base_url("keranjang/tambah/" . $m["id_makanan"]) ?>" class="btn btn-warning btn-sm">
              <fa class="fa fa-cart-plus"></fa>
            </a>
            <a href="<?= base_url("transaksi/tambah/" . $m["id_makanan"]) ?>" class="btn btn-success btn-sm">Beli</a>
          </p>

        </div>
      </div>
    </div>


  <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>