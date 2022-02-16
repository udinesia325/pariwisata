<?= $this->extend("template/index"); ?>
<?= $this->section("content"); ?>

<div class="p-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 card shadow p-4 ">
                <div class="row">
                    <div class="col-3">
                        <p>Nama :</p>
                        <p>Username :</p>
                        <p>Password :</p>

                    </div>
                    <div class="col-3">
                        <p><?= $user[0]['fullname'] ?></p>
                        <p><?= $user[0]['username'] ?></p>
                        <p><?= $user[0]['password'] ?></p>

                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6 card shadow p-4 ">
                <h3>Ubah User</h3>
                <form action="<?= base_url("login/update") ?>">
                    <div class="form-group">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <input type="hidden" class="form-control" name="id_user" value="<?= $user[0]['id_user'] ?>">
                        <input type="text" class="form-control" name="fullname" value="<?= $user[0]['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $user[0]['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="<?= $user[0]['password'] ?>">
                    </div>
                    <div class="form-group mt-2">
                        
                        <input type="submit" value="Kirim" class="btn btn-success">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>