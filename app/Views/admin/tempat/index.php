<?= $this->extend("admin/template/index"); ?>
<?= $this->section("content"); ?>

<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-10 card shadow">
            <div class="row">
                <div class="col-6"><a class="btn btn-primary btn-sm m-2" href="<?= base_url("admin/tempat/tambah") ?>">+Tambah</a></div>
                <div class="col-6">
                    <?php if(session()->getFlashdata("pesan")): ?>

                        <div class="alert alert-success alert-dismissible">
                            <div class="btn-close" data-bs-toggle="alert" data-bs-dismiss="alert"></div>
                            <strong><?= session()->getFlashdata("pesan") ?></strong>
                        </div>
                        <?php endif; ?>
                </div>
            </div>
            <table class="table responsive table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tempat</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($tempat as $t) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $t["nama_tempat"] ?></td>
                            <td><?= $t["deskripsi"] ?></td>
                            <td><?= $t["gambar"] ?></td>
                            <td><?= $t["tipe"] ?></td>
                            <td>
                                <a href="<?= base_url("admin/tempat/edit/".$t["id_tempat"]) ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></a>
                                <a href="<?= base_url("admin/tempat/delete/".$t["id_tempat"]) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>