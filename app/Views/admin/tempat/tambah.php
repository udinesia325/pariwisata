<?= $this->extend("admin/template/index"); ?>
<?= $this->section("content"); ?>

<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-12 col-md-10 col-lg-6 card shadow">
            <h1 class="text-center mx-3">Tambah Tempat</h1>
            <form action="<?= base_url("admin/tempat/save") ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label  class="form-label">Nama tempat</label>
                    <input type="text" class="form-control" name="nama_tempat">
                </div>
                <div class="form-group mb-3">
                    <label  class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label  class="form-label">Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                </div>
                <div class="form-group mb-3">
                    <select name="tipe" class="form-control">
                        <option value="luar">Luar negeri</option>
                        <option value="dalam">Dalam negeri</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <input type="submit" class="btn btn-primary btn-sm" value="kirim">
                    <a href="<?= base_url("admin/tempat") ?>" class="btn btn-warning btn-sm">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>