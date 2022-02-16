<?= $this->extend("template/index"); ?>
<?= $this->section("content"); ?>
    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3"><?= strtoupper($tempatFocus["nama_tempat"])  ?></h1>
            <img src="" alt="<?= $tempatFocus["gambar"] ?>">
            <hr>
            <p class="lead"><?= $tempatFocus["deskripsi"] ?></p>
        </div>
    </div>
<?= $this->endSection(); ?>