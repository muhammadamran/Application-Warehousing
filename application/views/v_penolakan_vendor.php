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
            <li><a href="pen_brg.php">Penolakan Barang</a></li>
            <li class="active">Form</li>
          </ol>
        </div>
        <!-- <p align="right"><button class="btn btn-default" data-toggle="modal" data-target="#myModal"> +Tolak Barang </button></p> -->
        <div class="row mt">
         <div class="col-lg-12">
          <div class="content-panel">
            <!-- <h4><i class="fa fa-angle-right"></i> Responsive Table</h4> -->
            <section id="unseen" style="padding: 10px">
              <table  id="example1" class="table table-bordered table-striped table-condensed">
                <thead>
                  <tr>
                    <th>#</th>
                    <!-- <th>No. PO</th> -->
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Nama Vendor</th>
                    <th>Jumlah Barang</th>
                    <th>Satuan</th>
                    <th>Tanggal Penolakan Barang</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $con=mysqli_connect("localhost","root","","gudang");
                  // Check connection
                  if (mysqli_connect_errno())
                  {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }


                  $roles = $this->session->userdata("nama");
                // $result = mysqli_query($con,"SELECT * FROM tb_pemesanan ORDER BY id_penerimaan ASC");
                // $result = mysqli_query($con,"SELECT * FROM tb_penerimaan WHERE status_barang='Ditolak' ORDER BY id_penerimaan DESC");
                  $result = mysqli_query($con,"SELECT * FROM tb_penerimaan WHERE status_barang='Ditolak' AND nama_vendor = '$roles' ORDER BY id_penerimaan DESC");
                  $no = 0;
                  if(mysqli_num_rows($result)>0){

                    while($row = mysqli_fetch_array($result))
                    {
                      $no++;
                      echo "<tr>";
                      echo "<td>".$no.".</td>";
                      echo "<td>".$row['kd_barang'] . "</td>";
                      echo "<td>".$row['nama_barang'] . "</td>";
                      echo "<td>".$row['nama_vendor'] . "</td>";
                      echo "<td>".$row['jumlah_barang'] . "</td>";
                      echo "<td>".$row['satuan'] . "</td>";
                      echo "<td>".$row['tgl_tolak'] . "</td>";
                      if ($row['keterangan']==NULL){
                        echo "<td style='background-color: #F5F5DC;''>No Comment</td>";
                      }else{
                        echo "<td style='background-color: #FFF8DC;'>".$row['keterangan'] . "</td>";
                      }
                      if ($row['status_barang']==NULL){
                        echo "<td style='background-color: #F0FFFF;'>On Progress</td>";
                      }else{
                        echo "<td>".$row['status_barang'] . "</td>";
                      }
                      echo "</tr>";
                      ?>
                      <?php
                    }
                  } 
                  mysqli_close($con);
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