<!DOCTYPE html>
<html lang="en">

<head>
	<title>Product - Library Brawijaya</title>
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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/mdc.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/mdc.min.css">
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


	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?php echo base_url(); ?>asset/images/books01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Welcome to LIBRARY.BRAWIJAYA
		</h2>
	</section>

	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140 p-t-50">
		<div class="container">
			<?php
			if ($data['alert'] == 0) { ?>
			<?php
			} elseif ($data['alert'] == 1) { ?>
				<div class="alert warning">
					<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
					<strong>Maaf!</strong> Buku Yang Anda Cari Tidak Ada!
				</div>
			<?php
			} ?>
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						Semua Kategori
					</button>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<form action="<?php echo site_url('controller/cariBuku'); ?>" method="get">
						<div class="bor8 dis-flex p-l-15">
							<input type="text" class="mtext-107 cl2 size-114 plh2 p-r-15" name="cari" placeholder="Search" id="search_bar">
							<button type="submit" name="cari_btn" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" id="search_btn">
								<i class="zmdi zmdi-search zmdi-hc-2x mdc-text-light-blue"></i>
							</button>
						</div>
					</form>
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Kategori
							</div>

							<ul>
								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=filosofi'); ?>" class="filter-link stext-106 trans-04">
										Filosofi
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=hukum'); ?>" class="filter-link stext-106 trans-04">
										Hukum
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=ilmu'); ?>" class="filter-link stext-106 trans-04">
										Ilmu Sosial
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=kamus'); ?>" class="filter-link stext-106 trans-04">
										Kamus
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=masak'); ?>" class="filter-link stext-106 trans-04">
										Buku Masak
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=medis'); ?>" class="filter-link stext-106 trans-04">
										Medis
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								''
							</div>
							<ul>
								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=novel'); ?>" class="filter-link stext-106 trans-04">
										Novel
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=pendidikan'); ?>" class="filter-link stext-106 trans-04">
										Pendidikan
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=pertanian'); ?>" class="filter-link stext-106 trans-04">
										Pertanian
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=politik'); ?>" class="filter-link stext-106 trans-04">
										Politik
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=psikologi'); ?>" class="filter-link stext-106 trans-04">
										Psikologi
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=religi'); ?>" class="filter-link stext-106 trans-04">
										Religi
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								''
							</div>
							<ul>
								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=romance'); ?>" class="filter-link stext-106 trans-04">
										Romance
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=sains'); ?>" class="filter-link stext-106 trans-04">
										Sains & Teknologi
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=sejarah'); ?>" class="filter-link stext-106 trans-04">
										Sejarah
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=seni'); ?>" class="filter-link stext-106 trans-04">
										Seni & Desain
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=Teknik'); ?>" class="filter-link stext-106 trans-04">
										Teknik
									</a>
								</li>

								<li class="p-b-6">
									<a href="<?php echo site_url('controller/filterBuku?kategori=travel'); ?>" class="filter-link stext-106 trans-04">
										Travel
									</a>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>

			<div class="row isotope-grid">
				<?php
				if ($data['alert'] == 1) { } else {
					foreach ($posts as $post) : ?>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="<?php echo $post->cover_buku ?>" alt="IMG-PRODUCT" class="fit-img">
									<a href="<?php echo site_url('controller/userPeminjaman?judul=' . $post->judul); ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
										Pinjam
									</a>
								</div>
								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="<?php echo site_url('controller/userPeminjaman?judul=' . $post->judul); ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $post->judul ?>
										</a>
										<span class="stext-105 cl3">
											<?php echo $post->kategori ?>
										</span>
									</div>
								</div>
							</div>
						</div>
				<?php endforeach;
				} ?>
			</div>

			<!-- Load more
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div> -->
		</div>
	</div>

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
	<script>
		var input = document.getElementById("search_bar");
		input.addEventListener("keyup", function(event) {
			if (event.keyCode === 13) {
				event.preventDefault();
				document.getElementById("search_btn").click();
			}
		});
	</script>
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
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
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