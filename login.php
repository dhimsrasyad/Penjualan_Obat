<?php
if(isset($_POST['submitbtn'])){
  $namaregis = $_POST['namaregis'];
  $password = $_POST['password'];
  $salted = $namaregis."|".$password;
  $encrypted = md5($salted);
  $aVar = mysqli_connect('localhost','root','','Penjualan_obat');

  $result = mysqli_query($aVar,"INSERT INTO user (Name , Password) VALUES ('$namaregis' , '$encrypted')");
  $cek= mysqli_num_rows($result);

  if($cek ==1){
    header("location: index.php");
  }else{
    echo "Nama atau password salah";
  }
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Sign In</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   </head>
   <body>
     <div class="container">
       <div class="row">
         <div class="col-md-12">
           <h2>Sign In</h2>
           <p>Please fill this form to sign in</p>
           <form class="" action="index.php" method="post">
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

           </form>

         </div>

       </div>

     </div>

   </body>
 </html>
