<?= $this->extend("template/index"); ?>
<?= $this->section("content"); ?>
<div class="row mt-5 pt-5">
    <?php foreach ($tempat as $t) : ?>
        <div class="col-10 col-sm-10 col-md-4 col-lg-3">
            <div class="card">
                <img class="card-img-top" src="" alt="<?= $t['gambar'] ?>">
                <div class="card-body">
                    <h4 class="card-title"><?= $t['nama_tempat'] ?></h4>
                    <p class="card-text"><?= $t['deskripsi'] ?></p>
                    <a href="<?= base_url('tempat/detail/'.$t['id_tempat']) ?>">Lihat -&raquo;</a>
                </div>
            </div>

        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>