<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pariwisata</title>
    <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.min.css")  ?>">
    <link rel="stylesheet" href="<?= base_url("css/style.css") ?>">
    <link rel="stylesheet" href="<?= base_url("fa/css/all.min.css") ?>">
    <script src="<?= base_url("jquery.min.js") ?>"></script>
</head>

<body>


    <nav class="navbar navbar-expand-xl navbar-light bg-primary ">
        <a class="navbar-brand ms-3 text-white" href="#">Admin Pariwisata</a>
        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 ">
            <li class="nav-item active">

                <a class="nav-link text-white fw-bold" href="#"> Hai <?= strtoupper(session()->get("username")) ?> </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white fw-bold" href="<?= base_url("admin/makanan") ?>">Beranda </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white fw-bold" href="<?= base_url("admin/tempat") ?>">Tempat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white fw-bold" href="<?= base_url("admin/transaksi") ?>">Transaksi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white fw-bold" href="<?= base_url("admin/kategori") ?>">Kategori</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="<?= base_url("admin/logout") ?>">Logout</a>             
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="<?= base_url("admin/register") ?>">Register</a>             
            </li>
        </ul>
    </nav>
    <?= $this->renderSection("content"); ?>



    <script src="<?= base_url("bootstrap/js/bootstrap.min.js") ?>"></script>


</body>

</html>