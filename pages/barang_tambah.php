<?php include 'include/header.php' ?>

    <!-- Static navbar -->
    <?php include 'include/menu.php' ?>
    <?php include 'class/Barang.php' ?>
    <?php 
        $barang = new Barang();
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
        {
            $insertBarang = $barang->barangInsert($_POST);
        }
    ?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Tambah Data Barang</h1>
        <div class="row">
          <div class="col-md-6">
            <form action="?p=barang_tambah" method="POST">
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nm_barang" class="form-control">
              </div>
              <div class="form-group">
                <label>Harga Barang</label>
                <input type="text" name="hrg_satuan" class="form-control">
              </div>
              <div class="form-group">
                <label>Stok Barang</label>
                <input type="text" name="stok" class="form-control">
              </div>
              <button type="submit" name="submit" class="btn btn-default">Simpan</button>
            </form>
          </div>
        </div>

      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'include/footer.php' ?>
    
