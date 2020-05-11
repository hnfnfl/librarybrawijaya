<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login - Library Brawijaya</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition">
	<header>
		<div class="container-menu-desktop">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					<!-- Logo desktop -->
					<a href="<?php echo site_url('controller/index') ?>" class="logo">
						<img src="<?php echo base_url(); ?>asset/images/logo-library.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="<?php echo site_url('controller/viewProduct') ?>">Katalog Buku</a>
							</li>
							<?php if (isset($_SESSION['status'])) { ?>
								<li>
									<a href="">Menu Buku</a>
									<ul class="sub-menu">
										<?php
											if ($_SESSION['status'] == "user") { ?>
											<li><a href="<?php echo site_url('controller/viewProduct') ?>">Peminjaman</a></li>
										<?php
											} elseif ($_SESSION['status'] == "staff") { ?>
											<li><a href="<?php echo site_url('controller/viewPengembalian') ?>">Pengembalian</a></li>
											<li><a href="<?php echo site_url('controller/viewPenambahan') ?>">Penambahan</a></li>
										<?php
											} ?>
									</ul>
								</li>
							<?php } ?>
							<li>
								<a href="<?php echo site_url('controller/viewContact') ?>">Kontak</a>
							</li>
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<ul class="main-menu">
							<li>
								<?php
								if ($this->session->userdata('nama')) { ?>
									<a href="<?php echo site_url('controller/datauser?nama=' . $_SESSION['nama']) ?>" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
										<?php echo "<p>Hi, $_SESSION[nama]</p>"; ?>
									</a>
							<li>
								<a href="<?php echo site_url('controller/logoutBtn') ?>" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
									<i class="zmdi zmdi-power"></i> Logout
								</a>
							</li>
						<?php
						} else { ?>
							<a href="<?php echo site_url('controller/loginBtn') ?>" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
								<i class="zmdi zmdi-account-box"></i>
								Login/Register
							</a>
						<?php
						} ?>
						</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</header>


	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?php echo base_url(); ?>asset/images/register.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Welcome to LIBRARY.BRAWIJAYA
		</h2>
	</section>

	<section class="section-slide">
		<?php
		if ($data['alert'] == 0) { ?>
		<?php
		} elseif ($data['alert'] == 1) { ?>
			<div class="alert warning">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
				<strong>Perhatian!</strong> Silahkan Login Ulang Setelah Update Data!
			</div>
		<?php } elseif ($data['alert'] == 2) { ?>
			<div class="alert warning-alert">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
				<strong>Error!</strong> Data Username dan Password Tidak Cocok!
			</div>
		<?php } ?>
		<div class="wrap-slick1 ">
			<div class="item-slick2">
				<div class="wrap3">
					<section class="login_box_area p_120">
						<div class="container">
							<div class="row">
								<div class="col-lg-6">
									<div class="login_form_inner">
										<h3>Pengguna Baru ?</h3>
										<div class="create">
											<a class="main_btn " href="<?php echo site_url('controller/regis') ?>">CREATE AN ACCOUNT</a>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="login_form_inner">
										<h3>Log in</h3>
										<form class="row login_form" action="<?php echo site_url('controller/authUser') ?>" method="post" id="login">
											<div class="col-md-12 form-group">
												<input type="text" class="form-control" id="name" name="username" placeholder="Username/NIM" required />
											</div>
											<div class="col-md-12 form-group">
												<input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
											</div>
											<div class="col-md-12 form-group">

											</div>
											<div class="col-md-12 form-group">
												<button type="submit" name="submit" value="submit" class="submit_btn">
													Log In
												</button>
											</div>
										</form>
										<form class="row login_form" action="<?php echo site_url('controller/loginStaff') ?>" method="post" id="login">
											<div class="col-md-12 form-group">
												<span>Log In Staff? </span>
												<button type="submit" name="submit" value="submit" class="click">
													Click Here
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="bg3 p-t-25 p-b-10">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-6 p-b-30">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Feel free to contact us in library.brawijaya@mail.com or
						<br> call (0341) 5648799
					</p>
				</div>

				<div class="col-sm-6 col-lg-6 p-b-30">
					<h4 class="stext-301 cl0 p-b-30">
						Contact Us
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Send
							</button>
						</div>
					</form>
				</div>
			</div>
			<p class="stext-107 cl6 txt-center">
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;
				<script>
					document.write(new Date().getFullYear());
				</script> All rights reserved
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</p>
		</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>asset/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>asset/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>asset/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>asset/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>asset/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>asset/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>asset/vendor/slick/slick.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>asset/vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>asset/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>asset/vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>asset/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>asset/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>asset/js/main.js"></script>

</body>

</html>