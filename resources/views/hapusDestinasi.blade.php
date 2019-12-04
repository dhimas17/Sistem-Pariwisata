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
	      <a class="navbar-brand" href="#">Sistem Pariwisata<small>Malang</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="#" class="nav-link">Hello, {{Session::get('username_admin')}}</a></li>
            <li class="nav-item"><a href="/listPesanan" class="nav-link">List</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Destinasi</a>
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

    <section class="ftco-menu mb-5 pb-5">
    	<div class="container">
           <div class="row justify-content-center mb-5">
             <div class="col-md-7 heading-section text-center ftco-animate">
               <span class="subheading">Cart</span>
               <h2 class="mb-4">Destinasi Wisata Pilihanmu</h2>
               <p>Pastikan data destinasi sudah sesuai dengan tujuan liburan anda.</p>
             </div>
            </div>
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 d-flex align-items-center">
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">
		              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                    <div class="row">
                    @for($i=0;$i<count($destinasi);$i++)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
                          <a href="" class="menu-img img mb-4" style="background-image: url({{asset($destinasi[$i]->gambar)}});"></a>
													<div class="text">
													  <h3><a href="#">{{$destinasi[$i]->destinasi}}</a></h3>
													  <p>{{$destinasi[$i]->deskripsi}}</p>
		              					<p class="price"><span>Rp {{$destinasi[$i]->harga}}</span></p>
														{{ csrf_field() }}
														<p><a href="/hapus/{{$destinasi[$i]->id}}" class="btn btn-primary btn-outline-primary">Hapus Destinasi</a></p>
													</div>
		              			</div>
		              		</div>
                      @endfor
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
    <script src="js/main.js"></script>
  </body>
</html>
