<?php 
require_once '../../dbkoneksi.php';
?>
<?php
    $_id = $_GET['id'];
    $sql = "SELECT * FROM merk WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
?>

<table class="table table-striped">
    <tbody>
        <tr><td>ID</td><td><?=$row['id']?></td></tr>
        <tr><td>Nama Merk</td><td><?=$row['merk']?></td></tr>
    </tbody>
</table>
<a href="list_merk.php" class="btn btn-primary">Kembali</a>