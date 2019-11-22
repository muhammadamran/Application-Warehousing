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
         <li><a href="pen_brg.php">Pengeluaran Barang</a></li>
         <li class="active">Form</li>
       </ol>
     </div>
     <p align="right"><button class="btn btn-default" data-toggle="modal" data-target="#myModal"> + Pengeluaran Barang </button></p>
     <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>[List Barang] </b> Add New Record</h4>
          </div>
          <div class="modal-body">
            <!-- <form method="post" action="" accept-charset="utf-8" enctype="multipart/form-data"> -->
              <?php echo form_open_multipart(site_url('PengeluaranBarang/create')); ?>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>No. Reservation</label>
                <input type="text" name="noreservation" class="form-control" required >
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>No. Tranfer Slip</label>
                <input type="text" name="no_sliptf" class="form-control" required >
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Kode Barang</label>
                <select class="form-control" name="kdbrg" required>
                  <option value="">-- SELECT --</option>
                  <?php 
                  if (@$barang) :
                    foreach ($barang as $key) :
                      ?>
                      <option value="<?= $key->kd_barang?>"><?= $key->kd_barang?></option>
                      <?php 
                    endforeach;
                  endif;
                  ?>
                </select>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Nama Barang</label>
                <select class="form-control" name="nama_brg" required>
                  <option value="">-- SELECT --</option>
                  <?php 
                  if (@$barang) :
                    foreach ($barang as $key) :
                      ?>
                      <option value="<?= $key->nama_barang?>"><?= $key->nama_barang?></option>
                      <?php 
                    endforeach;
                  endif;
                  ?>
                </select>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Nama Vendor</label>
                <select class="form-control" name="nmvdr" required>
                  <option value="">-- SELECT --</option>
                  <?php 
                  if (@$barang) :
                    foreach ($barang as $key) :
                      ?>
                      <option value="<?= $key->nama_vendor?>"><?= $key->nama_vendor?></option>
                      <?php 
                    endforeach;
                  endif;
                  ?>
                </select>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Jumlah Barang Keluar</label>
                <input type="number" name="jmlbrg" class="form-control" required>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control" required>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Tanggal Keluar Barang</label>
                <input type="date" name="tglbrgkeluar" class="form-control" value="<?php echo(date("Y-m-d")); ?>" required>
              </div>
              <button type="submit" name='submit' class="btn btn-default">Submit</button>
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
                <th>Nomor Bukti Reservation</th>
                <th>Nomor Bukti Transfer</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Nama Vendor</th>
                <th>Jumlah Barang</th>
                <th>Satuan</th>
                <th>Tanggal Barang Keluar</th>
                <th>Action</th>
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

              $result = mysqli_query($con,"SELECT * FROM tb_pengeluaran ORDER BY id_pengeluaran ASC");
              $no = 0;
              if(mysqli_num_rows($result)>0){

                while($row = mysqli_fetch_array($result))
                {
                  $no++;
                  echo "<tr>";
                  echo "<td>".$no.".</td>";
                  echo "<td>".$row['noreservation'] . "</td>";
                  echo "<td>".$row['no_sliptf'] . "</td>";
                  echo "<td>".$row['kdbrg']."</td>";
                  echo "<td>".$row['nama_brg']."</td>";
                  echo "<td>".$row['nmvdr'] . "</td>";
                  echo "<td>".$row['jmlbrg'] . "</td>";
                  echo "<td>".$row['satuan'] . "</td>";
                  echo "<td>".$row['tglbrgkeluar'] . "</td>";
                  echo "<td align= ''>
                  <a href='#' data-toggle='modal' data-target='#update$row[id_pengeluaran]' title='Edit'><span class='label label-success'>Edit</span></a>
                  <a href='#' data-toggle='modal' data-target='#delete$row[id_pengeluaran]' title='Delete'><span class='label label-success'>Delete</span></a>
                  </td>";
                  echo "</tr>";
                  ?>

                  <!-- Update User Page -->
                  <div class="modal fade" id="update<?php echo $row['id_pengeluaran'];?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b>[List Barang] </b> Update Record</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <form method="post" action=" "> -->
                            <?php echo form_open_multipart(site_url('PengeluaranBarang/update/'.$row['id_pengeluaran'])); ?>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>No. Reservation</label>
                              <input type="text" name="noreservation" class="form-control" value="<?php echo($row['noreservation']); ?>" required >
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>No. Tranfer Slip</label>
                              <input type="text" name="no_sliptf" class="form-control" value="<?php echo($row['no_sliptf']); ?>" required >
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Kode Barang</label>
                              <input type="text" name="kdbrg" class="form-control" value="<?php echo($row['kdbrg']); ?>" required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Nama Barang</label>
                              <input type="text" name="nama_brg" class="form-control" value="<?php echo($row['nama_brg']); ?>" required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Nama Vendor</label>
                              <input type="text" name="nmvdr" class="form-control" value="<?php echo($row['nmvdr']); ?>" required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Jumlah Barang Keluar</label>
                              <input type="number" name="jmlbrg" class="form-control" value="<?php echo($row['jmlbrg']); ?>" readonly>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Satuan</label>
                              <input type="text" name="satuan" class="form-control" value="<?php echo($row['satuan']); ?>" required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Tanggal Keluar Barang</label>
                              <input type="date" name="tglbrgkeluar" class="form-control" value="<?php echo($row['tglbrgkeluar']); ?>" required>
                            </div>
                            <button type="submit" name='update' class="btn btn-default">Update</button>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Delete User Page -->
                  <div class="modal fade" id="delete<?php echo $row['id_pengeluaran'];?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b>[User Page] </b> Delete Record</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <form method="post" action=" "> -->
                            <?php echo form_open_multipart(site_url('PengeluaranBarang/delete/'.$row['id_pengeluaran'])); ?>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Are you sure delete this record?</label>
                              <h6>Kode Barang : <?php echo $row['kdbrg'];?></h6>
                              <h6>Nama Vendor : <?php echo $row['nmvdr'];?></h6>
                              <h6>Jumlah Barang : <?php echo $row['jmlbrg'];?></h6>
                            </div>
                            <button type="submit" name='submit' class="btn btn-default">Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
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