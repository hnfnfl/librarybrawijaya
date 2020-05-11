<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{
    ///////////////DO NOT CHANGE THIS///////////////
    function __construct()
    {
        parent::__construct();
    }

    function read()
    {
        return;
    }

    public function get_posts()
    {
        $this->load->database();
        $query = $this->db->query('SELECT judul, kategori, cover_buku FROM buku');
        return $query->result();
    }

    public function get_pinjam($judul)
    {
        $this->load->database();
        $query = $this->db->query("SELECT kode_buku, judul FROM buku WHERE judul = '$judul'");
        return $query->result();
    }

    public function get_pengembalian($id_transaksi)
    {
        $this->load->database();
        $query = $this->db->query("SELECT t.id_transaksi, u.nim, u.namaLengkap, b.kode_buku, b.judul FROM transaksi t join buku b on t.kode_buku = b.kode_buku join datauser u on t.nim = u.NIM WHERE id_transaksi = '$id_transaksi'");
        return $query->result();
    }


    ///////////////DO NOT CHANGE THIS///////////////

    //fungsi untuk cek user apakah ada
    function cekUser($username, $password)
    {
        $this->load->database();
        $cek = $this->db->query("SELECT nim, namaLengkap, password FROM datauser WHERE NIM = '$username' AND password = '$password'");
        if ($cek->num_rows() > 0) {
            return $cek;
        } else {
            return 0;
        }
    }

    //Cek Staff
    function cekStaff($username, $password)
    {
        $this->load->database();
        $cekStaff = $this->db->query("SELECT username, password FROM datastaff WHERE username = '$username' AND password = '$password'");
        if ($cekStaff->num_rows() > 0) {
            return $cekStaff;
        } else {
            return 0;
        }
    }

    function userAda($username)
    {
        $this->load->database();
        $cek = $this->db->query("SELECT nim, password FROM datauser WHERE NIM = '$username'");
        if ($cek->num_rows() > 0) {
            return $cek;
        } else {
            return $cek;
        }
    }

    function userAdaStaff($username)
    {
        $this->load->database();
        $cekStaff2 = $this->db->query("SELECT username, password FROM datastaff WHERE username = '$username'");
        if ($cekStaff2->num_rows() > 0) {
            return $cekStaff2;
        } else {
            return $cekStaff2;
        }
    }

    //fungsi tambah user baru
    function sendData($username, $nama, $email, $alamat, $telp, $password)
    {
        $this->load->database();
        $send = $this->db->query("INSERT INTO datauser VALUES  ('$username', '$nama', '$email', '$alamat', '$telp','$password')");
    }

    //fungsi tambah buku baru
    function addBuku($kode_buku, $judul, $kategori, $penerbit, $penulis, $cover_buku)
    {
        $this->load->database();
        $send = $this->db->query("INSERT INTO buku VALUES  ('$kode_buku', '$judul', '$kategori', '$penerbit', '$penulis', '$cover_buku')");
    }

    //fungsi kembalikan buku 
    function returnBuku($id_transaksi)
    {
        $this->load->database();
        $send = $this->db->query("UPDATE `transaksi` SET `status_peminjaman`='false' WHERE id_transaksi = $id_transaksi");
    }


    //fungsi transaksi peminjaman
    function transaksi($username, $kode_buku, $nim, $tanggal_pinjam, $tanggal_kembali, $denda, $status_peminjaman)
    {
        $this->load->database();
        $send = $this->db->query("INSERT INTO transaksi (username, kode_buku, nim, tanggal_pinjam, tanggal_kembali, denda, status_peminjaman) VALUES  ('$username', '$kode_buku', '$nim', '$tanggal_pinjam', '$tanggal_kembali', '$denda', '$status_peminjaman')");
    }

    //fungsi cari buku
    function cari($judul)
    {
        $this->load->database();
        $query = $this->db->query("SELECT judul, kategori, cover_buku FROM buku WHERE LOWER(judul) LIKE ('%$judul%')");
        if ($query != NULL) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    //filter kategori buku
    function filter($kategori)
    {
        $this->load->database();
        $query = $this->db->query("SELECT judul, kategori, cover_buku FROM buku WHERE LOWER(kategori) LIKE ('%$kategori%')");
        if ($query != NULL) {
            return $query->result();
        } else {
            echo "database kosong";
        }
    }

    //get semua data user
    function getData($nama)
    {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM datauser WHERE namaLengkap = '$nama'");
        return $query->result();
    }

    function update($username, $nama, $email, $alamat, $telp, $password)
    {
        $this->load->database();
        $query = $this->db->query("UPDATE datauser SET NIM = '$username', namaLengkap = '$nama', email = '$email',
                                alamat = '$alamat', noTelp = '$telp', password = '$password' WHERE NIM = '$username'");
    }
}
