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
    @if(\Session::has('alert'))
    <div style="position:absolute;right:15px;top:15px;max-width:400px">
      <div class="ui negative message alert" style="display:none">
        {{Session::get('alert')}}
      </div>
    </div>
    @endif
  	
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="#">Sistem Pariwisata<small>Malang</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
              {{@csrf_field()}}
            <li class="nav-item"><a href="#" class="nav-link">Hello, {{Session::get('username_admin')}}</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Destinasi</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="/tambahDestinasi">Tambah Destinasi</a>
                <a class="dropdown-item" href="/updateDestinasi">Update Destinasi</a>
                <a class="dropdown-item" href="/hapusDestinasi">Hapus Destinasi</a>
              </div>
            </li>
            <li class="nav-item"><a href="/logoutAdmin" class="nav-link">Logout</a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>

		<section class="ftco-section ftco-cart">
			<div class="container">
              <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                  <span class="subheading">List Booking</span>
                  <h2 class="mb-4">Destinasi Wisata</h2>
                  <p>Data dibawah merupakan data destinasi wisata yang dipesan oleh customer.</p>
                </div>
               </div>
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>ID Customer</th>
						        <th>Nama Destinasi</th>
						        <th>Jumlah Pesanan</th>
						        <th>Total Harga</th>
						      </tr>
                </thead>
                <tbody>
                  <tr class='text-center'>             
                  @for($i=0;$i<count($cart);$i++)  						        
                    <?php
                    $harga = $cart[$i]->harga;
                    $jumlah =$cart[$i]->jumlah;
                    $total =$cart[$i]->harga*$cart[$i]->jumlah;
                    ?>

                    <td class='Customer'>{{$cart[$i]->id_customer}}</td>
  						      <td class='Destinasi'>{{$cart[$i]->destinasi}}</td>
  						      <td class='Quantity'>{{$jumlah}}</td>
                    <td class='Total'>{{$total}}</td>
  						    </tr>
                  @endfor

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
    <script src="js/main.js"></script>
  </body>
</html>
