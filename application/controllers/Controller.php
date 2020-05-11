<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends CI_Controller
{
	///////////////DO NOT CHANGE THIS///////////////
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
		$this->load->library('session');
	}
	///////////////DO NOT CHANGE THIS///////////////


	////////////////////////START OF VIEW FUNCTION////////////////////////
	//load view halaman utama(index)
	public function index()
	{
		$this->session->unset_userdata('pesanTransaksi1');
		$posts = $this->Model->get_posts();
		$data['posts'] = $posts;
		$this->load->view('index', $data);
		$this->load->helper('url');
	}

	//load view halaman login/regis
	public function loginBtn()
	{
		$data = array(
			"alert" => "0"
		);
		$send['data'] = $data;
		$this->load->view('user', $send);
		$this->load->helper('url');
	}

	//load  view halaman registrasi
	public function regis()
	{
		$data = array(
			"alert" => "0"
		);
		$send['data'] = $data;
		$this->load->view('register', $send);
		$this->load->helper('url');
	}

	///load view alert///
	public function viewAlert()
	{
		$data = array(
			"alert" => "1"
		);
		$send['data'] = $data;
		$this->load->view('register', $send);
		$this->load->helper('url');
	}
	public function viewWarning()
	{
		$data = array(
			"alert" => "2"
		);
		$send['data'] = $data;
		$this->load->view('register', $send);
		$this->load->helper('url');
	}
	public function viewSuccess()
	{
		$data = array(
			"alert" => "3"
		);
		$send['data'] = $data;
		$this->load->view('user', $send);
		$this->load->helper('url');
	}
	///end of load view alert///

	//load view halaman product
	public function viewProduct()
	{
		$posts = $this->Model->get_posts();
		$data['posts'] = $posts;
		$warning = array(
			"alert" => "0"
		);
		$send['data'] = $warning;
		$merge = $data + $send;
		$this->load->view('product', $merge);
		$this->load->helper('url');
	}

	//load view halaman peminjaman
	public function viewPeminjaman()
	{
		$this->load->view('peminjaman');
		$this->load->helper('url');
	}

	//load view halaman pengembalian
	public function viewPengembalian()
	{
		$this->load->view('pengembalian');
		$this->load->helper('url');
	}

	//load view halaman penambhan
	public function viewPenambahan()
	{
		$this->load->view('penambahan');
		$this->load->helper('url');
	}

	//load view halaman contact
	public function viewContact()
	{
		$this->load->view('contact');
		$this->load->helper('url');
	}


	//load view login staff
	public function loginStaff()
	{
		$this->load->view('login_staff');
		$this->load->helper('url');
	}

	//load view persyaratan
	public function viewSyarat()
	{
		$this->load->helper('url');
		$this->load->view('syarat');
	}

	//load view pesan sukses
	public function viewSukses()
	{
		unset($_SESSION['id_transaksi']);
		$this->load->helper('url');
		$this->load->view('sukses');
	}

	////////////////////////END OF LOAD VIEW FUNCTION////////////////////////



	////////////////////////START OF BACKEND FUNCTION////////////////////////
	//fungsi logout user
	public function logoutBtn()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	//fungsi otentikasi user
	public function authUser()
	{
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cek = $this->Model->cekUser($username, $password);

			if ($cek != NULL) {
				foreach ($cek->result() as $row) {
					$nama = $row->namaLengkap;
					$nim = $row->nim;
				}
				if ($cek != NULL) {
					$this->session->set_userdata('nama', $nama);
					$this->session->set_userdata('nim', $nim);
					$this->session->set_userdata('status', 'user');
					redirect(base_url());
				} else {
					redirect(site_url('controller/loginBtn'));
				}
			} else {
				$data = array(
					"alert" => "2"
				);
				$send['data'] = $data;
				$this->load->view('user', $send);
			}
		} else {
			$this->load->view('user');
		}
	}

	//fungsi otentikasi user staff
	public function authStaff()
	{
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cekStaff = $this->Model->cekStaff($username, $password);

			foreach ($cekStaff->result() as $row) {
				$nama = $row->username;
			}
			if ($cekStaff != null) {
				$this->session->set_userdata('nama', $nama);
				$this->session->set_userdata('status', 'staff');
				redirect(base_url());
			} else {
				redirect(site_url('controller/loginBtn'));
			}
		} else {
			$this->load->view('user');
		}
	}

	//fungsi tambah user baru
	public function registrasi()
	{
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$password = $this->input->post('password');
		$confirmpass = $this->input->post('confirmpass');

		$cek = $this->Model->userAda($username);
		foreach ($cek->result() as $row) {
			$nim = $row->nim;
		}

		if ($nim == $username) {
			redirect(site_url('controller/viewAlert'));
		} else {
			if ($password == $confirmpass) {
				$this->Model->sendData($username, $nama, $email, $alamat, $telp, $password);
				$this->session->set_flashdata('pesanRegistrasi1', 'Selamat Bergabung di LIBRARY.BRAWIJAYA');
				$this->session->set_flashdata('pesanRegistrasi2', 'Terima kasih!');
				redirect(site_url('controller/viewSukses'));
			} else {
				redirect(site_url('controller/viewWarning'));
			}
		}
	}

	//fungsi tambah buku baru
	public function tambahBuku()
	{
		$this->load->helper('cookie');
		$kode_buku = $this->input->post('kode_buku');
		$judul = $this->input->post('judul');
		$kategori = $this->input->post('kategori');
		$penerbit = $this->input->post('penerbit');
		$penulis = $this->input->post('penulis');
		$cover_buku = $this->input->post('cover_buku');
		$password = $this->input->post('password');
		$passStaff = $this->input->post('passStaff');

		$cek = $this->Model->userAdaStaff($username);
		foreach ($cek->result() as $row) {
			$username = $row->username;
		}

		if ($username != $username) {
			redirect(site_url('controller/loginBtn'));
		} else {
			if ($password == $confirmpass) {
				$data = $this->Model->addBuku($kode_buku, $judul, $kategori, $penerbit, $penulis, $cover_buku);
				$this->session->set_flashdata('pesanPenambahan1', 'Penambahan Buku Berhasil');
				$this->session->set_flashdata('pesanPenambahan2', 'Silahkan mengecek pada bagian katalog, Terima kasih!');
				redirect(site_url('controller/viewSukses'));
			} else {
				$this->session->set_flashdata('pesan', 'Penambahan Buku Gagal');
				redirect(site_url('controller/viewPenambahan'));
			}
		}
	}

	//fungsi mengembalikan buku baru
	public function kembaliBuku()
	{
		$this->load->helper('cookie');
		$id_transaksi = $this->input->post('id_transaksi');

		$cek = $this->Model->userAdaStaff($username);
		foreach ($cek->result() as $row) {
			$username = $row->username;
		}

		if ($username != $username) {
			redirect(site_url('controller/loginBtn'));
		} else {
			if ($password == $confirmpass) {
				$data = $this->Model->returnBuku($id_transaksi);
				$this->session->set_flashdata('pesanPengembalian1', 'Pengembalian Buku Berhasil');
				$this->session->set_flashdata('pesanPengembalian2', 'Silahkan mengecek pada bagian katalog, Terima kasih!');
				redirect(site_url('controller/viewSukses'));
			} else {
				$this->session->set_flashdata('pesan', 'Pengembalian Buku Gagal');
				redirect(site_url('controller/viewPenambahan'));
			}
		}
		unset($_SESSION['some_name']);
	}
	//method untuk peminjaman buku agar data judul dan kode langsung ada tanpa menulis dulu
	public function userPeminjaman()
	{
		$posts = $this->Model->get_pinjam($_GET['judul']);
		$this->session->set_userdata('judul', $_GET['judul']);
		$data['posts'] = $posts;
		$this->load->view('peminjaman', $data);
		$this->load->helper('url');
	}

	//method untuk pengembalian buku agar data kode dan user langsung ada tanpa menulis dulu
	public function cekDataTransaksi()
	{
		$posts = $this->Model->get_pengembalian($_GET['id_transaksi']);
		$this->session->set_userdata('id_transaksi', $_GET['id_transaksi']);
		$data['posts'] = $posts;
		$this->load->view('pengembalian', $data);
		$this->load->helper('url');
	}


	//method untuk mencatat proses transaksi peminjamana buku
	public function transaksi()
	{
		$this->load->helper('cookie');
		$username = 'Rifky';
		$kode_buku = $this->input->post('kode_buku');
		$nim = $this->input->post('nim');
		$tanggal_pinjam = $this->input->post('tanggal_pinjam');
		$tanggal_kembali = $this->input->post('tanggal_kembali');
		$denda = 0;
		$data = $this->Model->transaksi('Rifky', $kode_buku, $nim, $tanggal_pinjam, $tanggal_kembali, $denda, 'true');
		$this->session->set_flashdata('pesanTransaksi1', 'Transaksi Peminjaman Buku Berhasil');
		$this->session->set_flashdata('pesanTransaksi2', 'Silahkan melanjutkan pada petugas, Terima Kasih !');
		redirect(site_url('controller/viewSukses'));
	}


	//fungsi untuk melakukan pencarian buku
	public function cariBuku()
	{
		$this->load->helper('url');
		if (isset($_GET['cari'])) {
			$judul = $_GET['cari'];
			$data2 = array("jdl" => "$judul");
			$posts = $this->Model->cari($judul);
			if ($posts != NULL) {
				$data['posts'] = $posts;
				$send['data'] = $data2;
				$merge = $data + $send;
				$this->load->view('product_search', $merge);
			} else {
				$data = array(
					"alert" => "1"
				);
				$send['data'] = $data;
				$this->load->view('product', $send);
			}
		}
	}

	//fungsi untuk melakukan filter kategori
	public function filterBuku()
	{
		$this->load->helper('url');
		if (isset($_GET['kategori'])) {
			$kategori = $_GET['kategori'];
			$data2 = array("jdl" => "$kategori");
			$posts = $this->Model->filter($kategori);
			if ($posts != NULL) {
				$data['posts'] = $posts;
				$send['data'] = $data2;
				$merge = $data + $send;
				$this->load->view('product_search', $merge);
			} else {
				$data = array(
					"alert" => "1"
				);
				$send['data'] = $data;
				$this->load->view('product', $send);
			}
		}
	}

	//fungsi untuk mengambil data user
	public function datauser()
	{
		$this->load->helper('url');
		$datauser = $this->Model->getData($_GET['nama']);
		$data['data'] = $datauser;
		$this->load->view('profile', $data);
	}

	//update data user
	public function updatedata()
	{
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$password = $this->input->post('password');
		$this->load->helper('url');

		if ($username == null) {
			$username = 'kosong';
		}
		if ($nama == null) {
			$nama = 'kosong';
		}
		if ($email == null) {
			$email = 'kosong';
		}
		if ($alamat == null) {
			$alamat = 'kosong';
		}
		if ($telp == null) {
			$telp = '1234';
		}
		if ($password == null) {
			$password = 'kosong';
		}

		$this->Model->update($username, $nama, $email, $alamat, $telp, $password);
		$data = array(
			"alert" => "1"
		);
		$send['data'] = $data;
		$this->load->view('user', $send);
	}
}
////////////////////////END OF BACKEND FUNCTION////////////////////////
