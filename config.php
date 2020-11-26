<?php
session_start();

$mysqli = new mysqli('localhost','root','','Penjualan_obat') or die (mysqli_error($mysqli));

$nip = 0;
$update = false;
$name = '';
$obat = '';
$bagian = '';


if(isset($_POST['save'])){
  $name = $_POST['name'];
  $obat = $_POST['obat'];
  $bagian = $_POST['bagian'];

  $mysqli->query("INSERT INTO Karyawan (NIP,Nama_karyawan, Nama_obat, Bagian) VALUES ('$nip','$name','$obat','$bagian')") or die(mysqli_error($mysqli));

  $_SESSION['message']= "Record has been saved!";
  $_SESSION['msg_type']= "success";

  header("location: index.php");
}

if (isset($_GET['delete'])){
  $NIP = $_GET['delete'];
  $mysqli->query("DELETE FROM Karyawan WHERE NIP=$NIP") or die(mysqli_error($mysqli));

  $_SESSION['message']= "Record has been deleted!";
  $_SESSION['msg_type']= "danger";

  header("location: index.php");
}

if (isset($_GET['edit'])){
  $NIP = $_GET['edit'];
  $update = true;
  $result = $mysqli ->query("SELECT*FROM Karyawan WHERE NIP = $NIP")or die(mysqli_error($mysqli));
  if ($result->num_rows){
    $row = $result->fetch_array();
    $name = $row ['Nama_karyawan'];
    $obat = $row ['Nama_Obat'];
    $bagian = $row ['Bagian'];
  }
}

if (isset($_POST['update'])){
  $NIP = $_POST['nip'];
  $name = $_POST['name'];
  $obat = $_POST['obat'];
  $bagian = $_POST['bagian'];

  $mysqli->query("UPDATE Karyawan SET Nama_karyawan = '$name',Nama_Obat='$obat',Bagian='$bagian' WHERE NIP = '$NIP'")or die(mysqli_error($mysqli));


  $_SESSION['message']= "Record has been updated!";
  $_SESSION['msg_type']= "warning";

  header("location: index.php");
}

 ?>
