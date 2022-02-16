<?= $this->extend("admin/template/index"); ?>
<?= $this->section("content"); ?>




<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="modal-form" action="<?= base_url("admin/update/") ?>" method="post" autocomplete="off">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="nama_kategori" name="nama_kategori">
                            <div class="input-group-append">
                                <input type="submit" value="update" class=" btn btn-sm btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Batal</button>
                <a href="<?= base_url("admin/") ?>"></a>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-12 col-md-7 col-lg-5 card shadow">
            <div class="row">
                <div class="col-12">
                    <?php if (session()->getFlashdata("pesan")) : ?>
                        <div class="alert alert-success alert-dismissible">
                            <div class="btn-close" data-bs-dismiss="alert" data-bs-toggle="alert"> </div>
                            <strong><?= session()->getFlashdata("pesan") ?></strong>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12">
                    <form action="<?= base_url("admin/kategori/save") ?>" method="post">
                        <div class="input-group mt-3">
                            <input type="text" class="form-control form-control-sm" name="nama_kategori">
                            <div class="input-group-append">

                                <input type="submit" class="btn btn-sm btn-success" value="tambah">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-hover table-responsive text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $k) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $k["nama_kategori"] ?></td>
                            <td>
                                <button class="btn btn-sm btn-info btn-delete" data-bs-toggle="modal" data-bs-target="#modelId" data-nama="<?= $k["nama_kategori"] ?>" data-id="<?= $k["id_kategori"] ?>"><i class="fa fa-pencil-alt"></i></button>
                                <a class="btn btn-sm btn-danger" href="<?= base_url("admin/kategori/delete/" . $k["id_kategori"]) ?>"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $("[data-id").on("click", (e) => {
            const form = $("#modal-form")
            const action = form.attr("action")
            const {id,nama} = e.currentTarget.dataset
            form.attr("action",  `${document.location.href}/update/${id}`)
            $("#nama_kategori").val(nama)
            // console.log(form.attr("action"))
            // console.log(e)
        })
    })
</script>


<?= $this->endSection(); ?>