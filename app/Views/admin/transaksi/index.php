<?= $this->extend("admin/template/index"); ?>
<?= $this->section("content"); ?>

<div class="container">
    <h3>Transaksi</h3>
    <div class="row mt-5 pt-5">
        <div class="col-12">
            <table class="table table-responsive table-hover">
                <?php if (session()->getFlashdata("pesan")) : ?>
                    <tr>
                        <div class="alert alert-success alert-dismissible">
                            <div class="btn-close" data-bs-dismiss="alert"></div>
                            <strong><?= session()->getFlashdata("pesan") ?></strong>
                        </div>
                    </tr>
                <?php endif; ?>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Harga Total</th>
                        <th>Status</th>
                        <th>Checkout pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($transaksi as $t) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $t["username"] ?></td>
                            <td><?= $t["total"] ?></td>
                            <td><?= $t["status"] ?></td>
                            <td><?= $t["created_at"] ?></td>
                            <td>
                                <?php if ($t["status"] == "menunggu konfirmasi") : ?>
                                    <a href="<?= base_url("admin/transaksi/konfirmasi/" . $t["id_transaksi"]) ?>" class="btn btn-sm btn-outline-success">Konfirmasi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>