<nav class="nav navbar-expand-md navbar-dark bg-danger d-flex">

    <div class="navbar-brand ms-3">
        <h4 class="d-inline">Pariwisata</h4>
        <small><?= strlen(session()->get("username")) > 10 ? substr_replace(session()->get("username"), ' ...', 10, strlen(session()->get("username"))) : "Hai " . session()->get("username");  ?></small>

    </div>
    <div class="menu-section">
        <div class="sub-menu shadow">

            <strong class="ms-2 mt-2">Kategori</strong>
            <ul class="p-3 d-flex justify-content-between">
                <li class="nav-item"><a href="<?= base_url("/") ?>" class="nav-link text-dark fw-bold">Beranda</a></li>
                <li class="nav-item"><a href="<?= base_url("/makanan") ?>" class="nav-link text-dark fw-bold">Semua</a></li>
                <?php foreach ($kategori as $k) : ?>
                    <li class="nav-item"><a class="nav-link text-dark fw-bold" href="<?= base_url("makanan/kategori/" . $k['id_kategori']) ?>"> <?= $k["nama_kategori"] ?> </a></li>
                <?php endforeach; ?>
                <li class="nav-item"><a href="<?= base_url("tempat/luar") ?>" class="nav-link text-dark fw-bold">Luar</a></li>
                <li class="nav-item"><a href="<?= base_url("tempat/dalam") ?>" class="nav-link text-dark fw-bold">Dalam Negeri</a></li>

            </ul>

        </div>
    </div>
    <form action="<?= base_url("makanan/") ?>" method="get" class="form-navbar mx-auto">
        <div class="form-group">
            <input type="text" class="form-control form-control-sm input-search" name="cari" placeholder="Cari Makanan .... atau tekan  ' / ' ">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-search"></i></button>
        </div>
        <a class="fa fa-money-bill-alt nav-link text-white" href="<?= base_url('transaksi/') ?>"></a>

        <a class=" nav-link m-0 text-white" href="<?= base_url('keranjang/') ?>">
            <span class=" position-absolute badge top-10  bg-success text-white p-1 ms-3 fs-6 shadow "><?= session()->get("barang_di_keranjang") > 0 ? session()->get("barang_di_keranjang") : null ?></span>
            <i class="fa fa-cart-plus"></i>
        </a>
        <i class="fa fa-list-ul me-3 text-white menu-icon"></i>
        <i class="fa fa-bars text-white" data-bs-target="#myoffcanvas" data-bs-toggle="offcanvas"></i>

        <div class="form-group account-section">

            <?php if (session()->get("id_user") == null) : ?>
                <a href="<?= base_url("register") ?>" class="btn btn-outline-success btn-sm text-white">Daftar</a>
                <a href="<?= base_url("login") ?>" class="btn btn-light btn-sm">Login</a>
            <?php else : ?>
                <ul class="navbar-nav  mx-3 text-white d-flex fs-5">
                    <li class="nav-item">

                        <div class="login-section text-center ">
                            <i class="fa fa-user-alt"></i><br>
                        </div>
                        <div class="login-menu bg-danger p-3 mt-3">
                            <a href="<?= base_url("login/setting/" . session()->get("id_user")) ?>" class="nav-link">Setting</a>

                            <a href="<?= base_url("logout") ?>" class="nav-link">Logout</a>
                        </div>

                    </li>

                </ul>
            <?php endif; ?>
        </div>
        <!-- <div class="form-group hamburger">
            </div> -->

    </form>

</nav>
<div class="offcanvas offcanvas-start " id="myoffcanvas">
    <div class="offcanvas-content">
        <div class="offcanvas-header bg-danger">
            <h1 class="text-white">Pariwisata</h1>
            <div class="btn-close" data-bs-toggle="offcanvas"></div>
        </div>
        <div class="offcanvas-body">
            <ul class="list-group">
                <li class="list-group-item"><a href="<?= base_url("/") ?>" class="nav-link text-dark fw-bold">Beranda</a></li>
                <li class="list-group-item"><a href="<?= base_url("/makanan") ?>" class="nav-link text-dark fw-bold">Semua</a></li>

                <?php foreach ($kategori as $k) : ?>
                    <li class="list-group-item"><a class="text-decoration-none text-dark fw-bold" href="<?= base_url("makanan/kategori/" . $k['id_kategori']) ?>"> <?= $k["nama_kategori"] ?> </a></li>
                <?php endforeach; ?>
                <li class="list-group-item"><a href="<?= base_url("register") ?>" class="btn btn-success btn-sm text-white">Daftar</a>
                    <?php if (session()->get("id_user") == null) : ?>
                        <a href="<?= base_url("login") ?>" class="btn btn-primary btn-sm">Login</a>
                    <?php else : ?>
                        <a href="<?= base_url("logout") ?>" class="btn btn-danger btn-sm">Logout</a>
                    <?php endif; ?>

                </li>
            </ul>
        </div>
    </div>
</div>

<!-- <nav class="nav navbar-expand-md navbar-dark bg-danger d-flex justify-content-center p-3">

    <ul class="navbar-nav  mt-2 text-white d-flex fs-5">
        <li class="nav-item"><a href="" class="nav-link">Beranda</a></li>
        <li class="nav-item">
            <a href="#" class="nav-link drop">Tempat</a>
            <div class="sub-menu1 bg-danger">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item"><a href="<?= base_url("tempat/luar") ?>" class="nav-link">Luar</a></li>
                    <li class="nav-item"><a href="<?= base_url("tempat/dalam") ?>" class="nav-link">Dalam Negeri</a></li>

                </ul>
            </div>
        </li>
        <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-cart-plus"></i> </a></li>
    </ul>

</nav> -->
<script>
    $(document).ready(() => {
        // $('.login-menu').hide()
        $('.drop').on('click', function() {
            $('.sub-menu1').slideToggle()
        });
        $(".menu-icon").click(function(e) {
            e.preventDefault();
            $(".menu-section .sub-menu").slideToggle();
        });
        $(".login-section").click(function(e) {
            e.preventDefault();
            $(".login-menu").slideToggle();
        });

        $(document).on("keyup", function(e) {
            if (e.key == '/') {
                $(".input-search").focus()
            }
        });
    })
</script>