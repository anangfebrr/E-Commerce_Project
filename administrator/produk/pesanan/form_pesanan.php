<?php 
require_once '../../dbkoneksi.php';
?>
            
<form method="POST" action="proses_pesanan.php" class="container py-4">
  <div class="form-group row">
    <label for="nama_pelanggan" class="col-4 col-form-label">Nama Pelanggan</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-adjust"></i>
          </div>
        </div> 
        <input id="nama_pelanggan" name="nama_pelanggan" type="text" class="form-control" 
        value="">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat_pelanggan" class="col-4 col-form-label">Alamat Pelanggan</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-up"></i>
          </div>
        </div> 
        <input id="alamat_pelanggan" name="alamat_pelanggan" value=""
        type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="motor_id" class="col-4 col-form-label">Motor</label> 
    <div class="col-8">
    <?php 
            $sql = "SELECT * FROM motor";
            $st = $dbh->prepare($sql);
            $st->execute();
            $rows = $st->fetchAll();
        ?>
      <select id="motor_id" name="motor_id" class="custom-select">
        <option value="">-- Pilih Motor --</option>
        <?php foreach ($rows as $row) { ?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['nama_motor'] ?></option>
        <?php } ?>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <label for="quantity" class="col-4 col-form-label">Quantity</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-right"></i>
          </div>
        </div> 
        <input id="quantity" name="quantity" 
        value=""
        type="quantity" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <input type="submit" name="proses" type="submit" 
      class="btn btn-primary" value="Simpan"/>
    </div>
  </div>
</form>
