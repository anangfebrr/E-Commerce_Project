<?php 
require_once '../../dbkoneksi.php';
?>
            
<form method="POST" action="proses_merk.php" class="container py-4">
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Merk</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-adjust"></i>
          </div>
        </div> 
        <input id="merk" name="merk" type="text" class="form-control" 
        value="">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <input type="submit" name="proses"
      class="btn btn-primary" value="Simpan"/>
    </div>
  </div>
</form>
