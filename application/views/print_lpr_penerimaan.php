<!DOCTYPE HTML>
<html>
<?php require('include/head.php')?>
<body onload="window.print(); window.close();">
 <div class="page-container">
   <!--/content-inner-->
   <div class="outter-wp">
     <div class="row mt">
       <div class="col-lg-12">
        <div class="content-panel">
          <!-- <h4><i class="fa fa-angle-right"></i> Responsive Table</h4> -->
          <img src="<?php echo base_url('assets/images/logo-peruri.png')?>" type="image/png" width="200px" height="57px"/>
          <div align="center"><h2>PT. PERURI</h2></div>
          <hr>
          <section id="unseen">
            <div align="center">
              <h3>Laporan Penerimaan Barang</h3>
            </div><br>
            <table class="table table-bordered table-striped table-condensed">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Nama Vendor</th>
                  <th>Stok Barang</th>
                  <th>Tanggal Barang Diterima</th>
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
                    echo "<td>".$row['tgl_brg_dterima'] . "</td>";
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
  <?php require('include/foot.php');?>
  <?php require('include/footer.php');?>
  </html>