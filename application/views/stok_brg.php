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
            <li><a href="pen_brg.php">Stock Barang</a></li>
            <li class="active">Form</li>
          </ol>
        </div>
        <div class="row mt">
         <div class="col-lg-12">
          <div class="content-panel">
            <!-- <h4><i class="fa fa-angle-right"></i> Responsive Table</h4> -->
            <section id="unseen" style="padding: 10px">
              <table  id="example1" class="table table-bordered table-striped table-condensed">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok Barang</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(@$stok) :
                    $no=0;
                    foreach ($stok as $row) :
                      if(@$this->M_MasterData->get_pengeluaran($row['nama_barang'])){
                        $total_barang2 = $this->M_MasterData->get_pengeluaran($row['nama_barang'])->total_brg;
                      }else{
                        $total_barang2 = 0;
                      }
                      $no++;
                      echo "<tr>";
                      echo "<td>".$no.".</td>";
                      echo "<td>".$row['kd_barang']."</td>";
                      echo "<td>".$row['nama_barang'] . "</td>";
                      echo "<td>".($row['total_brg'] - $total_barang2). "</td>";
                      echo "</tr>";
                    endforeach;
                  endif;
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
  </body>
  </html>