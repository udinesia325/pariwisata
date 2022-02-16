<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.min.css") ?>">
</head>

<body>
    <div class="container pt-5">
        <div class="row pt-5">
            <div class="col-10 col-md-5 col-lg-3 mx-auto border rounded px-2 py-4 shadow">
                <h1 class="text-center"> Daftar</h1>
               <p class="text-danger">
                  
               </p>
                <form action="<?= base_url("admin/admin_register_process") ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="user" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="user" name="fullname">
                    </div>
                    <div class="form-group">
                        <label for="user" class="form-label">Username</label>
                        <input type="text" class="form-control" id="user" name="username">
                    </div>
                    <div class="form-group">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass" name="password">
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Sudah punya akun ? <a class="text-primary fw-bold" href="<?= base_url("admin/login") ?>">login</a></label>
                        <input type="submit" class="form-control btn btn-primary fw-bold">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>