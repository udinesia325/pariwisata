<?= $this->extend("template/index"); ?>
<?= $this->section("content"); ?>

<div class="container">
    <div class="row mt-5 pt-5 mb-5 pb-5">

        <?php if (count($transaksi) == 0) : ?>

            <div class="p-5 bg-light">
                <div class="container text-center">
                    <h1 class="display-3">Transaksi Kosong</h1>
                    <p class="lead">Silahkan beli produk terlebih dahulu ! <a href="<?= base_url("") ?>">Beli produk</a></p>

                </div>
            </div>

        <?php else : ?>
            <div class="col-12">
                <h3>Transaksi</h3>
            </div>
            <div class="col-12 card shadow pt-3" style="min-height: 30vh;">

                <table class="table table-responsive table-hover">
                    <tr>
                        <?php if (session()->getFlashdata("pesan")) : ?>
                            <div class="alert alert-success alert-dismissible">
                                <div class="btn-close" data-bs-dismiss="alert"></div>
                                <strong><?= session()->getFlashdata("pesan") ?></strong>
                            </div>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <thead>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Banyak Barang</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Status</th>
                        </thead>
                    </tr>
                    <tbody>
                        <?php
                        $harga = 0;
                        $no = 1;
                        foreach ($transaksi as $t) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $t["nama_makanan"] ?></td>
                                <td><?= $t["qty"] ?></td>
                                <td><?= $t["harga"] ?></td>
                                <td><?= $t["harga"] * $t["qty"] ?></td>
                                <td><?= $t["status"] ?></td>
                            </tr>
                            <?php $harga += $t["status"] == "belum dibayar" ? $t["harga"] * $t["qty"] : 0; ?>
                        <?php endforeach; ?>
                    </tbody>

                </table>


                <div class="card-footer">
                    <div class="row">
                        <div class="col-4"> <b>Total : <?= $harga ?></b></div>
                        <div class="col-4">
                            <?php if($harga > 0) : ?>
                            <select name="" id="" class="form-select">
                                <option value="transfer">-- Metode Pembayaran --</option>
                                <option value="transfer">Transfer</option>
                                <option value="Dana">Dana</option>
                                <option value="OVO">OVO</option>
                            </select>
                            <?php endif ?>
                        </div>
                        <div class="col-4"> <a href="<?= base_url("transaksi/pembayaran") ?>" class="btn btn-md btn-danger mx-5  <?= $harga == 0 ? "disabled" : "" ?> ">Bayar</a></div>
                    </div>



                </div>
            </div>
        <?php endif; ?>

    </div>
</div>

<?= $this->endSection(); ?>