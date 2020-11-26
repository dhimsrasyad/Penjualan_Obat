<?php
if(isset($_POST['submitbtn'])){
  $namaregis = $_POST['namaregis'];
  $password = $_POST['password'];
  $salted = $namaregis."|".$password;
  $encrypted = md5($salted);
  $aVar = mysqli_connect('localhost','root','','Penjualan_obat');

  $result = mysqli_query($aVar,"INSERT INTO user (Name , Password) VALUES ('$namaregis' , '$encrypted')");

  if($namaregis != $password){
    header("location: login.php");
  }else{
    echo '<p class= "error">
    Nama dan password tidak boleh sama
    </p>';
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Register</h2>
          <p>Please fill this form to create an account</p>
          <form class="" action="register.php" method="post">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="namaregis" class="form-control" value="" required>

            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" value="" required>

            </div>
            <div class="form-group">
              <input type="submit" name="submitbtn" value="Submit" class="btn btn-primary">

            </div>
            <p>Already have an account? <a href="login.php">Login here.</a></p>

          </form>

        </div>

      </div>

    </div>

  </body>
</html>
