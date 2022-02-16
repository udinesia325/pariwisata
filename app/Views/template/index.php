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
 
   <?= $this->include('/template/sidebar'); ?>
   
   <div class="container">
       <?= $this->renderSection('content'); ?>
   </div>
   
    <div class=" bg-danger w-100 mt-5 pt-3 pb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-3">
                <p class="text-white">Sosial media</p>
                <ul>
                    <li class="mt-3"><a href="" ><i class="fab fa-facebook fa-2x text-white"></i></a></li>
                    <li class="mt-3"><a href="" ><i class="fab fa-github fa-2x text-white"></i></a></li>
                    <li class="mt-3"><a href="" ><i class="fab fa-twitter fa-2x text-white"></i></a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3 text-white">
                <p>Developer</p>
                    <ul>
                        <li class="mt-3">API</li>
                        <li class="mt-3">Contribute</li>
                        <li class="mt-3">Become a patreon</li>
                    </ul>
            </div>
        </div>
    </div>



   <!-- (Optional) - Place this js code after initializing bootstrap.min.js or bootstrap.bundle.min.js -->
   <script src="<?= base_url("bootstrap/js/bootstrap.min.js") ?>"></script>
  

</body>
</html>