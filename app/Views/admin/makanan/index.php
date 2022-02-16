<?= $this->extend("admin/template/index"); ?>
<?= $this->section("content"); ?>

<div class="container p-5">

    <div class="card">
        <div class="row my-2">

            <div class="col-3 ">
                <a href="<?= base_url("admin/makanan/tambah") ?>" class="btn btn-primary d-inline btn-sm ms-3">Tambah</a>
            </div>

            <div class="col-9">
                <?php if(session()->getFlashdata("pesan")): ?>

                    <div class="alert alert-success alert-dismissible">
                        <div class="btn-close" data-bs-dismiss="alert" data-bs-toggle="alert"></div>
                        <strong><?= session()->getFlashdata("pesan") ?></strong>
                    </div>
                    <?php endif; ?>
            </div>
        </div>
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Makanan</th>
                    <th>Harga Deskripsi</th>
                    <th>Gambar</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($makanan as $m) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $m["nama_makanan"] ?></td>
                        <td><?= $m["harga"] ?></td>
                        <td><?= $m["gambar"] ?></td>
                        <td><?= $m["id_kategori"] ?></td>
                        <td><?= $m["stok"] ?></td>
                        <td>
                            <a href="<?= base_url("admin/makanan/edit/".$m["id_makanan"]) ?>"  class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></a>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus')" href="<?= base_url("admin/makanan/delete/".$m["id_makanan"]) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?= $this->endSection(); ?>