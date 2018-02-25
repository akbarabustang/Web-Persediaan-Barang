<?php include 'include/header.php' ?>

    <!-- Menu -->
    <?php include 'include/menu.php' ?>

    <!-- Load Class Barang -->
    <?php include 'class/Barang.php';?>
    <?php include 'class/Transaksi.php';?>
    <?php include_once 'helper/Format.php';?>

    <!-- Membuat Class -->
    <?php 
      $brg = new Barang();
      $tr = new Transaksi();
      $fm = new Format();
      if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
        {
            $insertTransaksi = $tr->transaksiInsert($_POST);
        }elseif ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['selesai'])) {
          $updateTransaksi = $tr->transaksiUpdate($_POST);
        }
     ?>
    
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Transaksi</h1>
        <form action="?p=transaksi" method="POST">
             <table class="table table-bordered">
               <tr>
                 <td>Nama Barang</td>
                 <td>
                   <div class="col-sm-4">
                     <select name="id_barang" class="form-control">
                       <?php 
                        $getBrg = $brg->getAllBarang();
                        if ($getBrg) {
                          $i=0;
                          while ($result = $getBrg->fetch_assoc()) {
                            $i++;
                        ?>
                        <option value="<?php echo $result['id_barang'] ?> "><?php echo $result['nm_barang'] ?></option>
                        <?php } } ?>
                     </select>
                   </div>
                 </td>
               </tr>
               <tr>
                 <td width="130">QTY</td>
                 <td>
                   <div class="col-sm-4">
                     <input type="text" class="form-control" name="qty">
                   </div>
                 </td>
               </tr>
               <tr>
                 <td colspan="2"><button  class="btn btn-primary" type="submit" name="submit">Proses</button></td>
               </tr>
             </table>
        </form>
        <hr>
        <h4>Transaksi saat ini</h4>
        <p>
          <?php 
          if (isset($updateTransaksi)) {
            echo $updateTransaksi;
          }
           ?>
        </p>
        <form action="?p=transaksi" method="POST">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>QTY</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $getTr = $tr->getAllTransaksi();
              if ($getTr) {
                $i=0;
                $total_bayar = 0;
                while ($result = $getTr->fetch_assoc()) {
                  $i++;
              ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $result['nm_barang']  ?></td>
                <td><?php echo $result['hrg_satuan'] ?></td>
                <td><?php echo $result['qty'] ?></td>
                <td>
                  <?php 
                    $hrg = $result['hrg_satuan'];
                    $qty = $result['qty'];
                    $total_bayar += $hrg*$qty;
                    echo $total = $hrg*$qty;
                   
                   ?>
                </td>
              </tr>
              <?php } } else { ?>
              <tr>
                <td colspan="5">Tidak ada data transaksi</td>
              </tr>
              <?php }  ?>
              <tr>
                <td colspan="4" align="right"><strong>Total Bayar</strong></td>
                <td>
                  <strong><?php echo @$total_bayar =+ $total_bayar  ?></strong>
                </td>
              </tr>
            </tbody>
          </table>
          <button type="submit" name="selesai" class="btn btn-danger">Bayar</button>
        </form>
        
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include 'include/footer.php' ?>
    
