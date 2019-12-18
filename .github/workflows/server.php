<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "perpus";
$con = mysqli_connect($server, $username, $password) or die("<h1>Koneksi Mysqli Error : </h1>" .mysqli_connect_error());
mysqli_select_db($con, $database) or die("<h1>Koneksi Ke Database Error : </h1>" .mysqli_error($con));

@$operasi = $_GET['operasi'];

switch ($operasi) {

    //Data ADMIN 

    case "view":

     $query_tampil_admin = mysqli_query($con, "SELECT * FROM admin") or die (mysqli_error($con));
        $data_array = array();
    
     while ($data = mysqli_fetch_assoc($query_tampil_admin)) {
                $data_array[]=$data;
        }
        echo json_encode($data_array);

    break;

    case "insert":
    @$nama_admin = $_GET['nama_admin'];
    @$username = $_GET['username'];
    @$password = $_GET['password'];

    $query_insert_data = mysqli_query($con, "INSERT INTO admin (nama_admin,username,password) VALUES ('$nama_admin','$username','$password')");

    if ($query_insert_data) {
        echo "Data Berhasil Di Simpan";
    }
    else{
        echo "Maaf Insert Ke Dalam Database Error" .mysqli_error($con);
    }

    break;

    case "get_admin_by_id":
    @$id =(int)$_GET['id_admin'];
    $query_tampil_admin = mysqli_query($con, "SELECT * FROM admin WHERE id='$id'") or die (mysqli_error($con));
    $data_array = array();
    $data_array = mysqli_fetch_assoc($query_tampil_admin);
    echo "[" .json_encode ($data_array) . "]";
    break;

    case "update":
    @$nama_admin = $_GET['nama_admin'];
    @$username = $_GET['username'];
    @$password = $_GET['password'];
    @$id = $_GET['id_admin'];

    $query_update_kategori = mysqli_query($con, "UPDATE admin SET nama_admin='$nama_admin', username='$username', password='$password' WHERE id='$id'");

    if ($query_update_admin) {
        echo "Update Data Berhasil";
    }
    else {
        echo mysqli_error($con);
    }
    break;

    case "delete":
    @$id = $_GET['id_admin'];
    $query_delete_admin = mysqli_query($con, "DELETE FROM admin WHERE id='$id'");
    if ($query_delete_admin) {
        echo "Data Berhasil Di Hapus";
    }
    else {
        echo mysqli_error($con);
    }
    break;

    

    //Tutup Data ADMIN
    //--------------------------------------------<>------------------------------------------------
    //Data Buku 

    case "view":

        $query_tampil_buku = mysqli_query($con, "SELECT * FROM buku") or die (mysqli_error($con));
        $data_array = array();
        
        while ($data = mysqli_fetch_assoc($query_tampil_buku)) {
            $data_array[]=$data;
        }
        echo json_encode($data_array);
    
    break;

    case "insert":
        @$judul_buku = $_GET['judul_buku'];
        @$pengarang = $_GET['pengarang'];
        @$thn_terbit = $_GET['thn_terbit'];
        @$penerbit = $_GET['penerbit'];
        @$jumlah_buku = $_GET['jumlah_buku'];
        @$isbn = $_GET['isbn'];
        @$lokasi = $_GET['lokasi'];
        @$gambar= $_GET['gambar'];
        @$tgl_input = $_GET['tgl_input'];
        @$status_buku = $_GET['status_buku'];
    
        $query_insert_data = mysqli_query($con, "INSERT INTO buku (judul_buku,pengarang,thn_terbit,penerbit,jumlah_buku,isbn,
            lokasi,gambar,tgl_input,status_buku) VALUES ('$judul_buku','$pengarang','$thn_terbit','$penerbit','$jumlah_buku',
            '$isbn','$lokasi','$gambar','$tgl_input','$status_buku')");
    
        if ($query_insert_data) {
            echo "Data Berhasil Di Simpan";
        }
        else{
            echo "Maaf Insert Ke Dalam Database Error" .mysqli_error($con);
        }
    
    break;

    case "get_buku_by_id":
        @$id =(int)$_GET['id_buku'];
        $query_tampil_buku = mysqli_query($con, "SELECT * FROM buku WHERE id='$id'") or die (mysqli_error($con));
        $data_array = array();
        $data_array = mysqli_fetch_assoc($query_tampil_buku);
        echo "[" .json_encode ($data_array) . "]";
    break;

    case "update":
        @$judul_buku = $_GET['judul_buku'];
        @$pengarang = $_GET['pengarang'];
        @$thn_terbit = $_GET['thn_terbit'];
        @$penerbit = $_GET['penerbit'];
        @$jumlah_buku = $_GET['jumlah_buku'];
        @$isbn = $_GET['isbn'];
        @$lokasi = $_GET['lokasi'];
        @$gambar= $_GET['gambar'];
        @$tgl_input = $_GET['tgl_input'];
        @$status_buku = $_GET['status_buku'];
        @$id = $_GET['id_buku'];
    
        $query_update_buku = mysqli_query($con, "UPDATE buku SET judul_buku='$judul_buku', pengarang='$pengarang',
            thn_terbit='$thn_terbit', penerbit='$penerbit', jumlah_buku='$jumlah_buku', isbn='$isbn', lokasi='$lokasi',
            gambar='$gambar', tgl_input='$tgl_input', status_buku='$status_buku' WHERE id='$id'");
    
        if ($query_update_buku) {
            echo "Update Data Berhasil";
        }
        else {
            echo mysqli_error($con);
        }
    break;

    case "delete":
        @$id = $_GET['id_buku'];
        $query_delete_buku = mysqli_query($con, "DELETE FROM buku WHERE id='$id'");
        if ($query_delete_buku) {
            echo "Data Berhasil Di Hapus";
        }
        else {
            echo mysqli_error($con);
        }
    break;



    //Tutup Data BUKU
    //--------------------------------------------<>------------------------------------------------
    //Data Anggota

    case "view":

        $query_tampil_anggota = mysqli_query($con, "SELECT * FROM anggota") or die (mysqli_error($con));
        $data_array = array();
        
        while ($data = mysqli_fetch_assoc($query_tampil_anggota)) {
            $data_array[]=$data;
        }
        echo json_encode($data_array);
    
    break;

    case "insert":
        @$nama_anggota = $_GET['nama_anggota'];
        @$gender = $_GET['gender'];
        @$no_telp = $_GET['no_telp'];
        @$alamat = $_GET['alamat'];
        @$email = $_GET['email'];
        @$password = $_GET['password'];
    
        $query_insert_data = mysqli_query($con, "INSERT INTO anggota (nama_anggota,gender,no_telp,alamat,email,password)
             VALUES ('$nama_anggota','$gender','$no_telp','$alamat','$email','$password')");
    
        if ($query_insert_data) {
            echo "Data Berhasil Di Simpan";
        }
        else{
            echo "Maaf Insert Ke Dalam Database Error" .mysqli_error($con);
        }
    
    break;

    case "get_anggota_by_id":
        @$id =(int)$_GET['id_anggota'];
        $query_tampil_anggota = mysqli_query($con, "SELECT * FROM anggota WHERE id='$id'") or die (mysqli_error($con));
        $data_array = array();
        $data_array = mysqli_fetch_assoc($query_tampil_anggota);
        echo "[" .json_encode ($data_array) . "]";
    break;
    
    case "update":
        @$nama_anggota = $_GET['nama_anggota'];
        @$gender = $_GET['gender'];
        @$no_telp = $_GET['no_telp'];
        @$alamat = $_GET['alamat'];
        @$email = $_GET['email'];
        @$password = $_GET['password'];
        @$id = $_GET['id_anggota'];
    
        $query_update_anggota = mysqli_query($con, "UPDATE anggota SET nama_anggota='$nama_anggota', gender='$gender',
            no_telp='$no_telp', alamat='$alamat', email='$email', password='$password' WHERE id='$id'");
    
        if ($query_update_anggota) {
            echo "Update Data Berhasil";
        }
        else {
            echo mysqli_error($con);
        }
    break;

    case "delete":
        @$id = $_GET['id_anggota'];
        $query_delete_anggota = mysqli_query($con, "DELETE FROM anggota WHERE id='$id'");
        if ($query_delete_anggota) {
            echo "Data Berhasil Di Hapus";
        }
        else {
            echo mysqli_error($con);
        }
    break;

    //Tutup Data Anggota
    
    default:
    break;
}
?>
