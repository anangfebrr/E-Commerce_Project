<?php 
require_once '../../dbkoneksi.php';
?>
<?php
    $_id = $_GET['id'];

    $sql = "SELECT pesanan.*, motor.nama_motor FROM pesanan INNER JOIN motor ON pesanan.motor_id=motor.id WHERE pesanan.id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
?>

<table class="table table-striped">
    <tbody>
        <tr><td>ID</td><td><?=$row['id']?></td></tr>
        <tr><td>Nama Pelanggan</td><td><?=$row['nama_pelanggan']?></td></tr>
        <tr><td>Alamat Pelanggan</td><td><?=$row['alamat_pelanggan']?></td></tr>
        <tr><td>Nama Motor</td><td><?=$row['nama_motor']?></td></tr>
        <tr><td>Quantity</td><td><?=$row['quantity']?></td></tr>
    </tbody>
</table>
<a href="list_pesanan.php" class="btn btn-primary">Kembali</a>
