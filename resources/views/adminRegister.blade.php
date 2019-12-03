<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Visit Malang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="/">Sistem Pariwisata<small>Malang</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="/adminLogin" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            <br>
            <br>
            <br>
              <span class="subheading" style="color:white">Admin Register</span>
              <h1 class="mb-4">Isi data dibawah dengan jujur</h1>
              <p class="mb-4 mb-md-5">Kepercayaan diperoleh bukan dengan banyaknya perkataan melaikan kesesuaian antara perkataan dan perbuatan.</p>
              <form action="/registerAdmin" method="post">
                  <label>
                    <a class = "p-3 px-xl-4 py-xl-3">Username</a>
                    <br>
                    <input type="text" name="username" required autofocus>
                  </label>
                  <br>
                  <label>
                    <a class = "p-3 px-xl-4 py-xl-3">Password</a>
                    <br>
                    <input type="password" name="password" required>
                  </label>
                  <br>
                  <label>
                    <a class = "p-3 px-xl-4 py-xl-3">E-Mail</a>
                    <br>
                    <input type="text" name="email" required>
                  </label>
                  <br>
                   <label>
                    <a class = "p-3 px-xl-4 py-xl-3">Telepon</a>
                    <br>
                    <input type="text" name="telepon" required>
                  </label>
                  <br>
                  <label>
                  {{@csrf_field()}}
                  <input type="submit" value="Register" class="btn btn-primary btn-white btn-outline-white p-6 px-xl-7 py-xl-6">
                  </label>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <?php
    echo $_Session["alert"] ?? '';
    ?>  
    @if(session()->has('alert'))
      <script>
        alert('{{session()->get("alert")}}');
      </script>
    @endif

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
