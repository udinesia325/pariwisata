<?= $this->extend("admin/template/index"); ?>
<?= $this->section("content"); ?>

<div class="container">
    <div class="row mt-5 pt-5">
        <div class="col-12 col-md-5 card mx-auto">
            <h3 class="text-center">Edit Makanan</h3>
            <form action="<?= base_url('adminMakanan/update') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <label> Nama Makanan </label>
                    <input type="hidden" name="id_makanan" value="<?= $makanan["id_makanan"] ?>">
                    <input type="text" class="form-control" name="nama_makanan" value="<?= $makanan["nama_makanan"] ?>">
                </div>
                <div class="form-group mb-2">
                    <label> Nama Tempat </label>
                    <select name="id_tempat" class="form-select">
                        <?php foreach ($tempat as $t) : ?>
                            <option value="<?= $t["id_tempat"] ?>" <?= $makanan["id_tempat"] == $t["id_tempat"] ? "selected" : " " ?>><?= $t["nama_tempat"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label> Harga </label>
                    <input type="text" class="form-control" name="harga" value="<?= $makanan["harga"] ?>">
                </div>
                <label> Deskripsi </label>
                <div class="form-group mb-2">
                    <textarea name="deskripsi" S cols="$0" rows="2"><?= $makanan["deskripsi"] ?></textarea>
                </div>
                <div class="form-group mb-2">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label> Kategori </label>
                    <select name="id_kategori" class="form-select">
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k["id_kategori"] ?>" <?= $makanan["id_kategori"] == $k["id_kategori"] ? "selected" : " " ?>><?= $k["nama_kategori"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control">
                </div>
                <div class="form-group my-4">
                    <input type="submit" class="btn btn-primary btn-sm" value="kirim">
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>