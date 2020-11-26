<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Penjualan Obat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>

  <body>
    <div class="col-md-12">

    <h1>Data Karyawan</h1>
   <div>
    <?php require_once 'config.php' ?>
    <?php if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
      <?php
      echo $_SESSION['message'];
      unset ($_SESSION['message']);
       ?>
     </div>
   <?php endif ?>


    <div class="container">
    <?php $mysqli = new mysqli('localhost','root','','Penjualan_obat') or die (mysqli_error($mysqli));
    $result = $mysqli->query("SELECT*FROM Karyawan") or die (mysqli_error($mysqli));
    ?>

    <div class="row justify-content-center">
      <table class="table">
        <thead>
          <tr>
            <th>
              NIP
            </th>
            <th>
              Nama Karyawan
            </th>
            <th>
              Obat
            </th>
            <th>
              Bagian
            </th>
            <th colspan="2">
              Action
            </th>
          </tr>
        </thead>
        <?php
        while($row = $result->fetch_assoc()):?>
         <tr>
           <td><?php echo $row['NIP']; ?></td>
           <td><?php echo $row['Nama_karyawan']; ?></td>
           <td><?php echo $row['Nama_Obat']; ?></td>
           <td><?php echo $row['Bagian']; ?></td>
           <td>
             <a href="index.php?edit= <?php echo $row['NIP']; ?>" class="btn btn-info">Edit</a>
             <a href="config.php?delete= <?php echo $row['NIP']; ?>" class="btn btn-danger">Delete</a>
           </td>
         </tr>
       <?php endwhile; ?>
      </table>
      </div>
    </div>

    <?php
    function pre_r($array) {
      echo'<pre>';
      print_r($array);
      echo'</pre>';
    }
     ?>


    <div class="row justify-content-center">
    <form action="config.php" method="POST">
      <input type="hidden" name="nip" value="<?php echo $NIP; ?>">
      <div class="form-group">
        <label>Nama Karyawan</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>"/>
      </div>
      <div class="form-group"
      <label>Obat</label>
      <input type="text" name="obat" class="form-control" value="<?php echo $obat; ?>"/>
      </div>
      <div class="form-group">
        <label>Bagian</label>
        <input type="text" name="bagian" class="form-control" value="<?php echo $bagian; ?>"/>
      </div>
      <div class="form-group">
        <?php
        if($update == true):
           ?>
           <button type="submit" class="btn btn-info" name="update">Update</button>
         <?php else : ?>
           <button type="submit" class="btn btn-primary" name="save">Save</button>
      <?php endif; ?>
      </div>
    </form>
    </div>
  </div>

  <h4>Pencarian Penanggung Jawab Obat</h4>
<div class="container">
  <form action="index.php" method="get">
	<label>Cari Obat:</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>

<?php
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
<br />
<br />

<div class="row justify-content-center">

<table class="table">

	<tr>
		<th>Kode Obat</th>
		<th>Nama Obat</th>
    <th>Nama Karyawan</th>
	</tr>
	<?php
  $aVar = mysqli_connect('localhost','root','','Penjualan_obat');
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$result = mysqli_query($aVar,"SELECT * FROM penanggung_jawab WHERE Nama_obat like '%".$cari."%'");
	}else{
    $result = $mysqli->query("SELECT * FROM penanggung_jawab") or die (mysqli_error($mysqli));
	}
	while($row = $result->fetch_assoc()):
    ?>
	<tr>
		<td><?php echo $row['Kode_obat'];?></td>
		<td><?php echo $row['Nama_obat']; ?></td>
    <td><?php echo $row['Nama_karyawan']; ?></td>
	</tr>
<?php endwhile; ?>
</table>
</div>

</div>

  <br />
  <br />
<h2>Data Penjualan</h2>
  <div class="container">
    <?php $mysqli = new mysqli('localhost','root','','Penjualan_obat') or die (mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM `data_penjualan`") or die (mysqli_error($mysqli));
    ?>
    <div class= "row justify-content-center">
    <table class="table">
      <thead>
        <tr>
          <th>
            Kode Obat
          </th>
          <th>
            ID Transaksi
          </th>
          <th>
            Tanggal Transaksi
          </th>
        </tr>
      </thead>
      <?php
      while($row = $result->fetch_assoc()):?>
       <tr>
         <td><?php echo $row['Kode_obat']; ?></td>
         <td><?php echo $row['Id_transaksi']; ?></td>
         <td><?php echo $row['Tanggal_transaksi']; ?></td>
       </tr>
     <?php endwhile; ?>
    </table>
    </div>
  </div>
</div>
  </body>
</html>
