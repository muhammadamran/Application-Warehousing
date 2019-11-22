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
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>[List Barang] </b> Add New Record</h4>
              </div>
              <div class="modal-body">
                <form method="post" action=" ">
                 <div class="clearfix"> </div>
                 <div class="col-md-12 form-group2 group-mail">
                  <label>Kode Barang</label>
                  <input type="text" name="kd_barang" class="form-control" required>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group2 group-mail">
                  <label>Nama Barang</label>
                  <input type="text" name="nama_barang" class="form-control" required>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group2 group-mail">
                  <label>Nama Vendor</label>
                  <input type="text" name="nama_vendor" class="form-control" required>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group2 group-mail">
                  <label>Jumlah Barang</label>
                  <input type="number" name="jumlah" class="form-control" placeholder="" value=" "  required>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group2 group-mail">
                  <label>Keterangan</label>
                  <input type="date" name="keterangan" class="form-control" placeholder="" value=" "  required>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
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

                // $result = mysqli_query($con,"SELECT * FROM tb_pemesanan ORDER BY id_penerimaan ASC");
                $result = mysqli_query($con,"SELECT * FROM tb_penerimaan WHERE status_barang='Ditolak' ORDER BY id_penerimaan DESC");
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

                    <!-- Tolak User Page -->
                    <div class="modal fade" id="Tolak<?php echo $row['id_penerimaan'];?>" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><b>[User Page] </b> Tolak Record</h4>
                          </div>
                          <div class="modal-body">
                            <!-- <form method="post" action=" "> -->
                              <?php echo form_open_multipart(site_url('penolakanbarang/tolak/'.$row['id_penerimaan'])); ?>
                              <div class="clearfix"> </div>
                              <div class="col-md-12 form-group2 group-mail">
                                <label>Klik <b>YES</b> jika Anda akan menolak Barang ini.</label>
                                <h6>Kode Barang : <?php echo $row['kd_barang'];?></h6>
                                <h6>Nama Vendor : <?php echo $row['nama_vendor'];?></h6>
                                <h6>Jumlah Barang : <?php echo $row['jumlah_barang'];?></h6>
                              </div>
                              <div class="clearfix"> </div>
                              <div class="col-md-12 form-group2 group-mail">
                                <label>Alasan Penolakan Barang</label>
                                <input type="hidden" name="tgl_tolak" class="form-control" value="<?php echo(date("Y-m-d")); ?>">
                                <input type="hidden" name="status_barang" value="Ditolak">
                                <textarea type="text" name="keterangan" class="form-control" required="required"></textarea>
                              </div>
                              <button type="submit" name='update' class="btn btn-default">Yes</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

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
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url('assets2/js/jquery.js')?>"></script>
  <script src="<?php echo base_url('assets2/js/bootstrap.min.js')?>"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url('assets2/js/jquery.dcjqaccordion.2.7.js')?>"></script>
  <script src="<?php echo base_url('assets2/js/jquery.scrollTo.min.js')?>"></script>
  <script src="<?php echo base_url('assets2/js/jquery.nicescroll.js')?>" type="text/javascript"></script>


  <!--common script for all pages-->
  <script src="<?php echo base_url('assets2/js/common-scripts.js')?>"></script>

  <!--script for this page-->


  <!-- DATA TABES SCRIPT -->
  <script src="<?php echo base_url('assets2/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets2/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
  <!-- page script -->
  <script type="text/javascript">
    $(function () {
      $("#example1").dataTable();
      $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
      });
    });
  </script>
  <!--//content-inner-->
  <?php require('include/sidebar.php')?>
  <?php require('include/search_ajax.php');?>
  <?php require('include/foot.php');?>
  <?php require('include/footer.php');?>
  <?php require('include/jstable.php');?>
</body>
</html>