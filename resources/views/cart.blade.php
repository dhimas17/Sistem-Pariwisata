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
            <li class="nav-item"><a href="#" class="nav-link">Hello, {{Session::get('username_customer')}}</a></li>
            <li class="nav-item"><a href="/destinasi" class="nav-link">Destinasi</a></li>
            <li class="nav-item"><a href="/logoutCustomer" class="nav-link">Logout</a></li>
	          <li class="nav-item cart"><a href="#" class="nav-link">
              <span class="icon icon-shopping_cart"></span>
              <?php
                $total = 0;
                foreach($cart as $data) $total += $data[1];
              ?>
              @if($total > 0)
              <span class="bag d-flex justify-content-center align-items-center"><small>{{$total}}</small></span>
              @endif
            </a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>

    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading" style="color:white">Destinasi Wisata Pilihan Anda</span>
              <h1 class="mb-4">Malang, Jawa Timur, Indonesia</h1>
              <p class="mb-4 mb-md-5">Malang kini menjadi salah satu kota terbaik di Indonesia yang menawarkan gaya hidup urban modern dengan berpusat pada pertanian dan keindahan alam.</p>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section ftco-cart"></section>
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
                 <tr class='text-center'>
                 <?php
                    $totalharga=0;
                 ?>
                 <br>
                  @for($i=0;$i<count($cart);$i++)
                      <td class="product-remove"><a href="/removefromcart/{{$cart[$i][0]->id}}"><span class="icon-close"></span></a></td>
  						        <td class='product-name'>{{$cart[$i][0]->destinasi}}</td>
                      
                      <?php
                      $harga = $cart[$i][0]->harga;
                      $jumlah =$cart[$i][1];
                      $total = $harga*$jumlah;
                      $totalharga += $total;
                      ?>

  						        <td class='price'>{{$harga}}</td>
  						        <td class='quantity'>{{$jumlah}}</td>
                      <td class='total'>{{$total}}</td>
  						      </tr>
                  @endfor
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
              <h3>Detail Pemesanan</h3>             
    					<hr>
    					<p class="d-flex total-price">  
                <span>Nama</span>
                <span>{{Session::get('username_customer')}}</span>
              </p>
              <p class="d-flex total-price">  
                <span>Total</span>
                <span>Rp {{ $totalharga }}</span>
              </p>
    				</div>
    				<p class="text-center"><a href="pesan" class="btn btn-primary py-3 px-4">Lakukan Pemesanan</a></p>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
