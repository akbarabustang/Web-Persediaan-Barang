<?php include 'include/header.php' ?>

    <!-- Menu -->
    <?php include 'include/menu.php' ?>

    <!-- Load Class Barang -->
    <?php include 'class/Barang.php';?>
    <?php include_once 'helper/Format.php';?>

    <!-- Membuat Class -->
    <?php 
      $brg = new Barang();
      $fm = new Format();

        if (isset($_GET['delbarang'])){
        $id = $_GET['delbarang'];
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delbarang']);
        $delBarang =$brg->delBarangById($id);
       }
     ?>
    
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Daftar Barang</h1>
        <a href="?p=barang_tambah" class="btn btn-primary">Tambah</a><br><br>
        <table class="table table-bordered">
            <tr>
              <thead>
                <th>NO</th>
                <th>Nama Barang</th>
                <th>Harga satuan</th>
                <th>Stok</th>
                <th>Aksi</th>
              </thead>
            </tr>
            <tr>
              <tbody>
                <?php 
                $getBrg = $brg->getAllBarang();
                if ($getBrg) {
                  $i=0;
                  while ($result = $getBrg->fetch_assoc()) {
                    $i++;
                 ?>
                 <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['nm_barang'] ?></td>
                    <td><?php echo $result['hrg_satuan'] ?></td>
                    <td><?php echo $result['stok'] ?></td>
                    <td>
                      <a class="btn btn-primary btn-sm " href="?p=barang_edit&id_barang=<?php echo $result['id_barang']; ?>">Edit</a>
                      <a class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus item ini ?')" href="?p=barang&delbarang=<?php echo $result['id_barang']; ?>">Hapus</a>
                    </td>
                 </tr>
                 <?php } } ?>
              </tbody>
            </tr>
        </table>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'include/footer.php' ?>
    
