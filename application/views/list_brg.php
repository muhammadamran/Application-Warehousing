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
         <li><a href="pen_brg.php">List Barang</a></li>
         <li class="active">Form</li>
       </ol>
     </div>
     <!-- <p align="right"><button class="btn btn-default" data-toggle="modal" data-target="#myModal"> +Add </button></p> -->
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
                  <th>Nama Vendor</th>
                  <th>Stok Barang</th>
                  <!-- <th>Tanggal Barang Datang</th> -->
                  <!-- <th>Action</th> -->
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

                $result = mysqli_query($con,"SELECT * FROM tb_penerimaan ORDER BY id_penerimaan ASC");
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
                    echo "</tr>";
                    ?>
                    <?php
                  }
                } else {
                  echo "<tr>";
                  echo "<td colspan='11' align='center'>"."<b>"."<i>" . "Tidak Ada Data" . "</i>". "</b>" . "</td>";
                  echo "</tr>";
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
  </html>