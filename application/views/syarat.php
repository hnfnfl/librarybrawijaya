<!DOCTYPE html>
<html lang="en">

<head>
	<title>Library Brawijaya</title>
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

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?php echo base_url(); ?>asset/images/syarat.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Syarat & Ketentuan
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-70 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<a href="<?php echo site_url('controller/regis') ?>">
					<i class="zmdi zmdi-long-arrow-left"></i>
					KEMBALI
				</a>
				<div class="size-2101 bor10 p-lr-50 p-t-30 p-b-30 p-lr-50-lg w-full-md">
					<ul>
						<li class="list-syarat">
							<strong>Persyaratan</strong>
							<ol>
								<li>Mahasiswa, dan umum. Warga Negara Indonesia (WNI/WNA), berdomisili di dalam maupun luar negeri.</li>
								<li>Mengisi formulir pendaftaran yang telah disediakan di ruang keanggotaan Lt. 1 Perpustakaan Universitas Brawijaya - Kota Malang</li>
								<li>Menunjukkan tanda pengenal asli dan masih berlaku :
									<ol>
										<li>i. WNI : Kartu Tanda Penduduk atau KK bagi yang belum mempunyai KTP.</li>
										<li>ii. WNA : Kitas - Mengisi formulir pendaftaran dengan lengkap dan benar.</li>
									</ol>
								</li>
								<li>Kartu anggota dapat digunakan untuk Layanan Terbuka Perpustakaan Universitas Brawijaya, kecuali bagi yang berdomisili di luar Malang.</li>
							</ol>
						</li>
						<br>
						<li class="list-syarat">
							<strong>Tata Tertib</strong>
							<ol>
								<li>Kartu anggota harus dibawa setiap kali berkunjung.</li>
								<li>Tidak dapat dipinjamkan kepada orang lain.</li>
								<li>Kartu anggota Perpustakaan berlaku seumur hidup.</li>
								<li>Jika kartu hilang, penggantian kartu wajib menyertakan surat keterangan hilang dari kepolisian.</li>
							</ol>
						</li>
						<br>
						<li class="list-syarat">
							<strong>Kartu Anggota</strong>
							<ol>
								<li>Pembuatan kartu anggota dilakukan sendiri ke Perpustakaan Universitas Brawijaya.</li>
								<li>Pengisian formulir dan pendaftaran keanggotaan.</li>
								<li>Pengambilan foto anggota di tempat pendaftaran.</li>
								<li>Pemrosesan kartu anggota dapat ditunggu (langsung jadi).</li>
								<li>Perpanjangan masa berlaku Kartu Anggota Lama, sama seperti proses pembuatan Kartu Anggota Baru, dengan cara menyerahkan Kartu Anggota Lama.</li>
								<li>Pembuatan kartu anggota tidak dipungut biaya ( GRATIS ).</li>
							</ol>
						</li>
					</ul>
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
	<script src="<?php echo base_url(); ?>asset/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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