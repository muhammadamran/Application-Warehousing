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
         <li><a href="pen_brg.php">Penerimaan Barang</a></li>
         <li class="active">Form</li>
       </ol>
     </div>
     <p align="right"><button class="btn btn-default" data-toggle="modal" data-target="#myModal"> + Penerimaan Barang </button></p>
     <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>[List Barang] </b> Add New Record</h4>
          </div>
          <div class="modal-body">
            <!-- <form method="post" action="" accept-charset="utf-8" enctype="multipart/form-data"> -->
              <?php echo form_open_multipart(site_url('penerimaan/create')); ?>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>No. PO</label>
                <input type="text" name="no_po" class="form-control" required >
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Kode Barang</label>
                <select class="form-control" name="kd_barang" required>
                  <option value="">-- SELECT --</option>
                  <?php 
                  if (@$barang) :
                    foreach ($barang as $key) :
                      ?>
                      <option value="<?= $key->kode_brg?>"><?= $key->kode_brg?></option>
                      <?php 
                    endforeach;
                  endif;
                  ?>
                </select>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Nama Barang</label>
                <select class="form-control" name="nama_barang" required>
                  <option value="">-- SELECT --</option>
                  <?php 
                  if (@$barang) :
                    foreach ($barang as $key) :
                      ?>
                      <option value="<?= $key->nama_brg?>"><?= $key->nama_brg?></option>
                      <?php 
                    endforeach;
                  endif;
                  ?>
                </select>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Nama Vendor</label>
                <select class="form-control" name="nama_vendor" required>
                  <option value="">-- SELECT --</option>
                  <?php 
                  if (@$vendor) :
                    foreach ($vendor as $key) :
                      ?>
                      <option value="<?= $key->username?>"><?= $key->username?></option>
                      <?php 
                    endforeach;
                  endif;
                  ?>
                </select>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Jumlah Barang</label>
                <select class="form-control" name="jumlah_barang">
                  <option value="">-- SELECT --</option>
                  <?php 
                  if (@$barang) :
                    foreach ($barang as $key) :
                      ?>
                      <option value="<?= $key->jml_brg?>"><?= $key->jml_brg?></option>
                      <?php 
                    endforeach;
                  endif;
                  ?>
                </select>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control" required>
              </div>
              <input type="hidden" name="tgl_brg_dterima" value="<?php echo(date("Y-m-d")); ?>">
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
                <th>No. PO</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Nama Vendor</th>
                <th>Jumlah Barang</th>
                <th>Satuan</th>
                <th>Tanggal Barang Diterima</th>
                <th>Status Barang</th>
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

              $result = mysqli_query($con,"SELECT * FROM tb_penerimaan ORDER BY id_penerimaan DESC");
              $no = 0;
              if(mysqli_num_rows($result)>0){

                while($row = mysqli_fetch_array($result))
                {
                  $no++;
                  echo "<tr>";
                  echo "<td>".$no.".</td>";
                  echo "<td>".$row['no_po']."</td>";
                  echo "<td>".$row['kd_barang'] . "</td>";
                  echo "<td>".$row['nama_barang'] . "</td>";
                  echo "<td>".$row['nama_vendor'] . "</td>";
                  echo "<td>".$row['jumlah_barang'] . "</td>";
                  echo "<td>".$row['satuan'] . "</td>";
                  echo "<td>".$row['tgl_brg_dterima'] . "</td>";
                  if ($row['status_barang']==NULL){
                    echo "<td style='background-color: #F0FFFF;'>Diterima</td>";
                  }else{
                    echo "<td>".$row['status_barang'] . "</td>";
                  }
                  echo "<td align= '' >
                  ";
                  if ($row['status_barang']=='Ditolak'){
                    echo "";
                  }else{
                    echo " 
                    <a href='#' data-toggle='modal' data-target='#update$row[id_penerimaan]' title='Edit'><span class='label label-success'>Edit</span></a>
                    <a href='#' data-toggle='modal' data-target='#delete$row[id_penerimaan]' title='Delete'><span class='label label-success'>Delete</span></a>
                    <a href='#' data-toggle='modal' data-target='#Tolak$row[id_penerimaan]' title='Tolak Barang'><span class='label label-success'>Tolak Barang</span></a>";
                  }
                  echo "
                  </td>";
                  echo "</tr>";
                  ?>
                  <!-- Update User Page -->
                  <div class="modal fade" id="update<?php echo $row['id_penerimaan'];?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b>[List Barang] </b> Update Record</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <form method="post" action=" "> -->
                            <?php echo form_open_multipart(site_url('Penerimaan/update/'.$row['id_penerimaan'])); ?>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>No. Po</label>
                              <input type="text" name="no_po" class="form-control" value="<?php echo($row['no_po']); ?>" required >
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Kode Barang</label>
                              <input type="text" name="kd_barang" class="form-control" value="<?php echo($row['kd_barang']); ?>" required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Nama Barang</label>
                              <input type="text" name="nama_barang" class="form-control" value="<?php echo($row['nama_barang']); ?>" required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Nama Vendor</label>
                              <input type="text" name="nama_vendor" class="form-control" value="<?php echo($row['nama_vendor']); ?>" required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Jumlah Barang</label>
                              <input type="number" name="jumlah_barang" class="form-control" value="<?php echo($row['jumlah_barang']); ?>" readonly>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Satuan</label>
                              <input type="text" name="satuan" class="form-control" value="<?php echo($row['satuan']); ?>" required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Tanggal Diterima</label>
                              <input type="date" name="tgl_brg_dterima" class="form-control" value="<?php echo($row['tgl_brg_dterima']); ?>" required>
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
                  <div class="modal fade" id="delete<?php echo $row['id_penerimaan'];?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b>[User Page] </b> Delete Record</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <form method="post" action=" "> -->
                            <?php echo form_open_multipart(site_url('Penerimaan/delete/'.$row['id_penerimaan'])); ?>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Are you sure delete this record?</label>
                              <h6>Kode Barang : <?php echo $row['kd_barang'];?></h6>
                              <h6>ID Vendor : <?php echo $row['user_id'];?></h6>
                              <h6>Nama Vendor : <?php echo $row['nama_vendor'];?></h6>
                              <h6>Jumlah Barang : <?php echo $row['jumlah_barang'];?></h6>
                            </div>
                            <button type="submit" name='submit' class="btn btn-default">Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

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
                              <h6>ID Vendor : <?php echo $row['user_id'];?></h6>
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
<!--//content-inner-->
<?php require('include/sidebar.php')?>
<?php require('include/search_ajax.php');?>
<?php require('include/foot.php');?>
<?php require('include/footer.php');?>
<?php require('include/jstable.php');?>
</body>
</html>