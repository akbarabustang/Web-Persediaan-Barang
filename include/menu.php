<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">UKK</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?php if($_GET['p']== 'dashboard'){echo "active";}?>"><a href="?p=dashboard">Beranda</a></li>
            <li class="<?php if($_GET['p']== 'barang'){echo "active";}?>"><a href="?p=barang">Barang</a></li>
            <li class="<?php if($_GET['p']== 'transaksi'){echo "active";}?>"><a href="?p=transaksi">Transaksi</a></li>
          
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </nav>