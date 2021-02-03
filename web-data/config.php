<?php 
$host = "localhost";
$user = "root";
$pass = "";
$DB ="data_mahasiswa";

$link = new mysqli($host, $user, $pass, $DB);
if($link->connect_error)
{
  echo "Gagal Koneksi MySQL";
}
