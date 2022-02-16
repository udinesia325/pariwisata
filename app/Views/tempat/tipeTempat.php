<?= $this->extend("template/index"); ?>
<?= $this->section("content"); ?>
<div class="row mt-3 pt-3">
    <?php if (count($tipeTempat) == 0) : ?>
        <div class="p-5 bg-light">
            <div class="container">
                <h1 class="display-3 text-center">Tempat Belum Tersedia !</h1>

            </div>
        </div>


    <?php endif; ?>

    
    <?php foreach ($tipeTempat as $t) : ?>
        <div class="col-10 col-md-4 col-lg-3">
            <div class="card">
                <img class="card-img-top" src="" alt="<?= $t['gambar'] ?>">
                <div class="card-body">
                    <h4 class="card-title"><?= $t['nama_tempat'] ?></h4>
                    <p class="card-text"><?= $t['deskripsi'] ?></p>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('tempat/detail/' . $t['id_tempat']) ?>" class="btn btn-dark fw-bold">Lihat Kuliner</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>