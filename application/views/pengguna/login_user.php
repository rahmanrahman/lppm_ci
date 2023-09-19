<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/plugins')?>/ikip.png">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/plugins')?>/ikip.png">
  <title>
    Login
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?php echo base_url('assets/plugins')?>/landing/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins')?>/landing/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?php echo base_url('assets/plugins')?>/landing/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?php echo base_url('assets/plugins')?>/landing/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <!-- End Navbar -->
  <main class="main-content ">
    <div class="page-header align-items-start min-vh-100 img-fluid w-100"
      style="background-image: url('<?php echo base_url('assets/foto')?>/gedung.png'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-12"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-0 text-center mx-auto"><br>
            <h1 class="text-white mb-2 mt-5">Log in</h1>
            <h1 class="text-white mb-2 mt-5">LITABMAS IKIP Siliwangi</h1><br><br>
          </div>
        </div>
        <div class="justify-content-center">
          <div class="col-lg-6 mx-auto">
            <div class="card z-index-0">
              <div class="card-body">
                <form role="form" action="<?php echo base_url('Login/validasi_pengguna'); ?>" method="post">
                  <div class="mb-4">
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="username">
                  </div>
                  <div class="mb-4">
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container position-relative">
    </div>
  </main>

  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/plugins')?>/landing/js/core/popper.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/landing/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/landing/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?php echo base_url('assets/plugins')?>/landing/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('assets/plugins')?>/landing/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>