<?php 
require_once '../../dbkoneksi.php';
?>
<?php 
   $_merk = $_POST['merk'];

   $_proses = $_POST['proses'];

   // array data
   $ar_data[]=$_merk; //  1

   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO merk (merk) VALUES (?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];
    $sql = "UPDATE merk SET merk=?
    WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location:list_merk.php');
?>