<?php 
require_once '../../dbkoneksi.php';
?>
<?php
    $_id = $_GET['id'];

    $sql = "SELECT motor.*, merk.merk FROM motor INNER JOIN merk ON motor.merk_id=merk.id WHERE motor.id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
?>

<table class="table table-striped">
    <tbody>
        <tr><td>ID</td><td><?=$row['id']?></td></tr>
        <tr><td>Nama Motor</td><td><?=$row['nama_motor']?></td></tr>
        <tr><td>CC</td><td><?=$row['cc']?></td></tr>
        <tr><td>Harga Motor</td><td><?=$row['harga']?></td></tr>
        <tr><td>Merk</td><td><?=$row['merk']?></td></tr>
        <tr><td>Stok</td><td><?=$row['stok']?></td></tr>
    </tbody>
</table>
<a href="list_motor.php" class="btn btn-primary">Kembali</a>
