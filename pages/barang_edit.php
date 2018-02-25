<?php include 'include/header.php' ?>

    <?php include 'include/menu.php' ?>
    <?php include 'class/Barang.php' ?>
    <?php 
        $id = $_GET['id_barang'];
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id_barang']);
        $barang = new Barang();
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
      {
        $updateBarang = $barang->barangUpdate($_POST, $id);
      }
     ?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Edit Data Barang</h1>
        <div class="row">
          <div class="col-md-6">
            <?php 
             $getBarang = $barang->getBarangById($id);
             if ($getBarang){
                 while ($value = $getBarang->fetch_assoc()){
            ?>
            <form action="" method="POST">
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nm_barang" class="form-control" value="<?php echo $value['nm_barang'] ?> ">
              </div>
              <div class="form-group">
                <label>Harga Barang</label>
                <input type="text" name="hrg_satuan" class="form-control" value="<?php echo $value['hrg_satuan'] ?> ">
              </div>
              <div class="form-group">
                <label>Stok Barang</label>
                <input type="text" name="stok" class="form-control" value="<?php echo $value['stok'] ?> ">
              </div>
              <button type="submit" name="submit" class="btn btn-default">Simpan</button>
            </form>
            <?php } } ?>
          </div>
        </div>

      </div>

    </div> <!-- /container -->

    <?php include 'include/footer.php' ?>