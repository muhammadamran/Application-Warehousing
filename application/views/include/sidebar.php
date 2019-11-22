<div class="sidebar-menu">
  <header class="logo">
    <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo"> <h1>GUDANG</h1></span> 
      <!--<img id="logo" src="" alt="Logo"/>--> 
    </a> 
  </header>
  <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
  <!--/down-->
  <div class="down">  
    <!-- <a href="#"><img src="<?php echo base_url('assets/images/admin.jpg')?>"></a> -->
    <!-- <a href="index.html"><span class=" name-caret"> <?php echo $this->session->set_userdata($data_session);['username'];?></span></a> -->
    <a href="#"><span class=" name-caret"> <?php echo $this->session->userdata("nama"); ?></span></a>
    <p>Sistem Informasi Pergudangan<br>PT. PERURI</p>
    <ul>
      <li><a class="tooltips" href="#"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
      <li><a class="tooltips" href="#"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
      <li><a class="tooltips" href="<?php echo site_url('login/logout'); ?>"><span>Logout</span><i class="lnr lnr-power-switch"></i></a></li>
    </ul>
  </div>
  <!--//down-->
  <div class="menu">
    <ul id="menu" >
      <!-- Role Admin -->
      <?php if($this->session->userdata('role') == 'Admin'){ ?>
        <li><a href="<?php echo base_url()."index.php/Dashboard"; ?>"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
        <li><a href="<?php echo base_url()."index.php/Pemesanan"; ?>"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Pemesanan Barang</span></a></li>
        <li><a href="<?php echo base_url()."index.php/Penerimaan"; ?>"><i class="lnr lnr-layers"></i> <span>Penerimaan Barang</span></a></li>
        <li><a href="<?php echo base_url()."index.php/PengeluaranBarang"; ?>"><i class="  glyphicon glyphicon-share"></i> <span>Pengeluaran Barang</span></a></li>
        <li><a href="<?php echo base_url()."index.php/PenolakanBarang"; ?>"><i class="glyphicon glyphicon-remove"></i> <span>Penolakan Barang</span></a></li>
        <li><a href="<?php echo base_url()."index.php/StokBarang"; ?>"><i class="fa fa-list-alt"></i> <span>Stok Barang</span></a></li>
        <li id="menu-academico" ><a href="#"><i class="glyphicon glyphicon-blackboard"></i> <span>Monitoring</span> <span class="fa fa-angle-right" style="float: right"></span></a>
          <ul id="menu-academico-sub" >
            <!-- <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url()."index.php/ListBarang"; ?>">List Barang</a></li> -->
            <li id="menu-academico-boletim" ><a href="<?php echo base_url()."index.php/LaporanPenerimaanBarang"; ?>">Laporan Penerimaan Barang</a></li>
            <li id="menu-academico-boletim" ><a href="<?php echo base_url()."index.php/LaporanPengeluaranBarang"; ?>">Laporan Pengeluaran Barang</a></li>
          </ul>
        </li>
        <li id="menu-academico" ><a href="#"><i class="glyphicon glyphicon-time"></i> <span>Histori Barang</span> <span class="fa fa-angle-right" style="float: right"></span></a>
          <ul id="menu-academico-sub" >
            <!-- <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url()."index.php/HistoriBarangMasuk"; ?>">Barang Diterima</a></li> -->
            <li id="menu-academico-boletim" ><a href="<?php echo base_url()."index.php/HistoriBarangKeluar"; ?>">Barang Ditolak</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url()."index.php/Users"; ?>"><i class="lnr lnr-users"></i> <span>User</span></a></li>
        <li><a href="<?php echo base_url()."index.php/Vendor"; ?>"><i class="glyphicon glyphicon-globe"></i> <span>Vendor</span></a></li>
      <?php } ?>

      <!-- Role Vendor -->
      <?php if($this->session->userdata('role') == 'Vendor'){ ?>
        <li><a href="<?php echo base_url()."index.php/PenolakanVendor"; ?>"><i class="glyphicon glyphicon-hourglass"></i> <span>Status Barang</span></a></li>
      <?php } ?>

      <!-- Role Kepala Gudang -->
      <?php if($this->session->userdata('role') == 'Kepala Gudang'){ ?>
        <li><a href="<?php echo base_url()."index.php/LaporanPenerimaanBarang"; ?>"><i class="glyphicon glyphicon-plus-sign"></i>Laporan Penerimaan</span></a></li>
        <li><a href="<?php echo base_url()."index.php/LaporanPengeluaranBarang"; ?>"><i class="glyphicon glyphicon-minus-sign"></i>Laporan Pengeluaran</span></a></li>
      <?php } ?>
    </ul>
  </div>
  <div class="clearfix"></div>
</div>