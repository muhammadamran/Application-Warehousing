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
            <li><a href="pen_brg.php">Histori Barang Masuk</a></li>
            <li class="active">Form</li>
          </ol>
        </div>
        <!-- <p align="right"><button class="btn btn-default" data-toggle="modal" data-target="#myModal"> +Add </button></p> -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>[List Barang] </b> Add New Record</h4>
              </div>
              <div class="modal-body">
                <form method="post" action=" ">
                  <div class="form-group">
                    <label>No. Po</label>
                    <input type="text" name="no_po" class="form-control" placeholder="No. Po" value=" " required >
                  </div>
                  <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" name="kd_barang" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Nama Vendor</label>
                    <input type="text" name="nama_vendor" class="form-control" required>
                  </div>
                  <div class="from-group">
                    <label>Alamat Vendor</label>
                    <input type="text" name="alamat_vendor" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> Email Vendor</label>
                    <input type="text" name="email_vendor" class="form-control" placeholder="" value=" "  required>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input type="number" name="jumlah_barang" class="form-control" placeholder="" value=" "  required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Masuk Barang</label>
                    <input type="date" name="tgl_brg_dtg" class="form-control" placeholder="" value=" "  required>
                  </div>       
                  <div class="form-group">
                    <label>Upload Surat</label>
                    <input type="file" name="upload_surat" class="form-control" placeholder="" value=" "  required>
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
                    <th>No. Po</th>
                    <th>Kode Barang</th>
                    <th>Nama Vendor</th>
                    <th>Alamat Vendor</th>
                    <th>Email Vendor</th>
                    <th>Jumlah Barang</th>
                    <th>Tanggal Barang Diterima</th>
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

                  $result = mysqli_query($con,"SELECT * FROM penerimaan_barang ORDER BY id_barang ASC");
                  $no = 0;
                  if(mysqli_num_rows($result)>0){

                    while($row = mysqli_fetch_array($result))
                    {
                      $no++;
                      echo "<tr>";
                      echo "<td>".$no.".</td>";
                      echo "<td>".$row['no_po']."</td>";
                      echo "<td>".$row['kd_barang'] . "</td>";
                      echo "<td>".$row['nama_vendor'] . "</td>";
                      echo "<td>".$row['alamat_vendor'] . "</td>";
                      echo "<td>".$row['email_vendor'] . "</td>";
                      echo "<td>".$row['jumlah_barang'] . "</td>";
                      echo "<td>".$row['tgl_brg_dtg'] . "</td>";
                      echo "</tr>";
                      ?>

                      <!-- Update User Page -->
                      <div class="modal fade" id="update<?php echo $row['id_barang'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[LIst Barang] </b> Update Record</h4>
                            </div>
                            <div class="modal-body">
                              <form method="post" action=" ">
                                <div class="form-group">
                                  <label>No. Po</label>
                                  <input type="text" name="no_po" class="form-control" placeholder="No. Po" value="<?php echo $row['no_po'];?>" required >
                                  <input type="hidden" name="id_barang" class="form-control" placeholder="client name" value="<?php echo $row['id_barang'];?>" required>
                                </div>
                                <div class="form-group">
                                  <label>Kode Barang</label>
                                  <input type="text" name="kd_barang" class="form-control" placeholder="" value="<?php echo $row['kd_barang'];?>"  required>
                                </div>
                                <div class="form-group">
                                  <label>Nama Vendor</label>
                                  <input type="text" name="nama_vendor" class="form-control" placeholder="" value="<?php echo $row['nama_vendor'];?>"  required>
                                </div>
                                <div class="form-group">
                                  <label>Alamat Vendor</label>
                                  <input type="text" name="alamat_vendor" class="form-control" placeholder="" value="<?php echo $row['alamat_vendor'];?>"  required>
                                </div>
                                <div class="form-group">
                                  <label>Email Vendor</label>
                                  <input type="text" name="email_vendor" class="form-control" placeholder="" value="<?php echo $row['email_vendor'];?>"  required>
                                </div>
                                <div class="form-group">
                                  <label>Jumlah Barang</label>
                                  <input type="number" name="jumlah_barang" class="form-control" placeholder="" value="<?php echo $row['jumlah_barang'];?>"  required>
                                </div>
                                <div class="form-group">
                                  <label>Tanggal Masuk Barang</label>
                                  <input type="date" name="tgl_brg_dtg" class="form-control" placeholder="" value="<?php echo $row['tgl_brg_dtg'];?>"  required>
                                </div>
                                <div class="form-group">
                                  <label>Upload Surat</label>
                                  <input type="file" name="upload_surat" class="form-control" placeholder="" value=" "  required>
                                </div>
                                <button type="submit" name="update" class="btn btn-default">Update</button>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Delete User Page -->
                      <div class="modal fade" id="delete<?php echo $row['id_barang'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[User Page] </b> Delete Record</h4>
                            </div>
                            <div class="modal-body">
                              <form method="post" action=" ">
                                <div class="form-group">
                                  <label>Are you sure delete this record?</label>
                                  <h6>No. Po : <?php echo $row['no_po'];?></h6>
                                  <input type="hidden" name="id_barang" class="form-control" placeholder="client name" value="<?php echo $row['id_barang'];?>" required>
                                </div>
                                <button type="submit" name="delete" class="btn btn-default">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Set User User Page -->
                      <div class="modal fade" id="set_users<?php echo $row['id_barang'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[User Page] </b> Set Users Record</h4>
                            </div>
                            <div class="modal-body">
                              <form method="post" action=" ">
                                <div class="form-group">
                                  <label>No. Po</label>
                                  <input type="text" name="No. Po" class="form-control" placeholder="client name" value="<?php echo $row['no_po'];?>" required readonly>
                                  <input type="hidden" name="id_barang" class="form-control" placeholder="client name" value="<?php echo $row['id_barang'];?>" required>
                                </div>
                                <button type="submit" name="approve" class="btn btn-default">Approve</button>
                                <button type="button" name="icline" class="btn btn-default" data-dismiss="modal">Dicline</button>
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
    <!--//content-inner-->
    <?php require('include/sidebar.php')?>
    <?php require('include/search_ajax.php');?>
    <?php require('include/foot.php');?>
    <?php require('include/footer.php');?>
    <?php require('include/jstable.php');?>
  </body>
  </html>