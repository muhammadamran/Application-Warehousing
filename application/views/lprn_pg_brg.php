<!DOCTYPE HTML>
<html>
<?php require('include/head.php')?>
<body>
 <div class="page-container">
   <!--/content-inner-->
   <div class="left-content">
    <div class="inner-content">
      <!-- header-starts -->
      <!--outter-wp-->
      <div class="outter-wp">
       <!--sub-heard-part-->
       <div class="sub-heard-part">
        <ol class="breadcrumb m-b-0">
         <li><a href="pen_brg.php">Laporan Pengeluaran Barang</a></li>
         <li class="active">Form</li>
       </ol>
     </div>
     <!-- <p align="left"><button class="btn btn-default"><i class="glyphicon glyphicon-print"></i> Print </button></p> -->
     <form method="post" action="<?= site_url('LaporanPengeluaranBarang') ?>">
      <div class="form-group">    
        <label>Tanggal</label>              
        <input type="date" name="tgl_awal" class="btn btn-default" value="<?= $this->input->post('tgl_awal') ?>" placeholder="Search">
        <label>s/d</label>  
        <input type="date" name="tgl_akhir" class="btn btn-default" value="<?= $this->input->post('tgl_akhir') ?>" placeholder="Search">
        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Search</button>
      </div>
    </form>
    <a class="btn btn-primary btn-round" href="<?php echo base_url()."index.php/CetakPengeluaran"; ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Print</a>
    <div class="row mt">
     <div class="col-lg-12">
      <div class="content-panel">
        <!-- <h4><i class="fa fa-angle-right"></i> Responsive Table</h4> -->
        <section id="unseen" style="padding: 10px">
          <table class="table table-bordered table-striped table-condensed">
            <thead>
              <tr>
                <th>#</th>
                <th>Nomor Bukti Reservation</th>
                <th>Nomor Bukti Transfer</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Nama Vendor</th>
                <th>Jumlah Barang</th>
                <th>Tanggal Barang Diterima</th>
              </tr>
            </thead>
            <tbody>
             <?php
             if(@$laporan){
              $no=0;
              foreach ($laporan as $row) :
                $no++;
                echo "<tr>";
                echo "<td>".$no.".</td>";
                echo "<td>".$row['noreservation'] . "</td>";
                echo "<td>".$row['no_sliptf'] . "</td>";
                echo "<td>".$row['kdbrg'] . "</td>";
                echo "<td>".$row['nama_brg'] . "</td>";
                echo "<td>".$row['nmvdr'] . "</td>";
                echo "<td>".$row['jmlbrg'] . "</td>";
                echo "<td>".$row['tglbrgkeluar'] . "</td>";
                echo "</tr>";
                ?>
                <?php
              endforeach;

            } else {
              echo "<tr>";
              echo "<td colspan='11' align='center'>"."<b>"."<i>" . "Tidak Ada Data" . "</i>". "</b>" . "</td>";
              echo "</tr>";
            } 
            ?>
          </tbody>
        </table>
      </section>
    </div><!-- /content-panel -->
  </div><!-- /col-lg-4 -->      
</div><!-- /row -->

</section>
<!--//content-inner-->
<?php require('include/sidebar.php')?>
<?php require('include/search_ajax.php');?>
<?php require('include/foot.php');?>
<?php require('include/footer.php');?>
<?php require('include/jstable.php');?>
</html>