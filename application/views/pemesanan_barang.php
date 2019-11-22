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
         <li><a href="pen_brg.php">Pemesanan Barang</a></li>
         <li class="active">Form</li>
       </ol>
     </div>
     <div align="right">
       <form method="post" action="<?= site_url('Pemesanan') ?>">
        <div class="form-group">                  
          <input type="text" name="search" class="btn btn-default" placeholder="Search">
          <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Search</button>
        </div>
      </form>
      <button class="btn btn-default" data-toggle="modal" data-target="#myModal">+ Pesan </button>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>[List Pemesanan] </b> Barang</h4>
          </div>
          <div class="modal-body">
            <!-- <form method="post" action="" accept-charset="utf-8" enctype="multipart/form-data"> -->
              <?php echo form_open_multipart(site_url('Pemesanan/create')); ?>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Kode Barang</label>
                <input type="text" name="kode_brg" class="form-control" required>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control" required>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Nama Vendor</label>
                <select class="form-control" name="nm_vendor">
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
                <input type="number" name="jml_brg" class="form-control" required>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control" required>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Tanggal Pemesanan Barang</label>
                <input type="date" name="tgl_pesan" class="form-control" required>
              </div>
              <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                <label>Tanggal Barang Terakhir Datang</label>
                <input type="date" name="tgl_expired" class="form-control" required>
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
          <table id="example1" class="table table-bordered table-striped table-condensed">
            <thead>
              <tr>
                <th>#</th>
                <!-- <th>No. PO</th> -->
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Nama Vendor</th>
                <th>Jumlah Barang</th>
                <th>Satuan</th>
                <th>Tanggal Barang Pemesanan</th>
                <th>Tanggal Barang Terakhir Datang</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(@$barang){
                $no=0;
                foreach ($barang as $row) :
                  $no++;
                  echo "<tr>";
                  echo "<td>".$no.".</td>";
                  // echo "<td>".$row['no_po']."</td>";
                  echo "<td>".$row['kode_brg'] . "</td>";
                  echo "<td>".$row['nama_brg'] . "</td>";
                  echo "<td>".$row['nm_vendor'] . "</td>";
                  echo "<td>".$row['jml_brg'] . "</td>";
                  echo "<td>".$row['satuan'] . "</td>";
                  echo "<td>".$row['tgl_pesan'] . "</td>";
                  echo "<td>".$row['tgl_expired'] . "</td>";
                  // if ($row['status']==NULL){
                  //   echo "<td style='background-color: #F0FFFF;'>On Progress</td>";
                  // }else{
                  //   echo "<td>".$row['status'] . "</td>";
                  // }
                  echo "<td align= ''>
                  <a href='#' data-toggle='modal' data-target='#update$row[id_pemesanan]' title='Edit'><span class='label label-success'>Edit</span></a>
                  <a href='#' data-toggle='modal' data-target='#delete$row[id_pemesanan]' title='Delete'><span class='label label-success'>Delete</span></a>
                  </td>";
                  echo "</tr>";
                  ?>

                  <!-- Update User Page -->
                  <div class="modal fade" id="update<?php echo $row['id_pemesanan'];?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b>[LIst Barang] </b> Update Record</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <form method="post" action=" "> -->
                            <?php echo form_open_multipart(site_url('Pemesanan/update/'.$row['id_pemesanan'])); ?>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Kode Barang</label>
                              <input type="text" name="kode_brg" class="form-control" placeholder="" value="<?php echo $row['kode_brg'];?>"  required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Nama Barang</label>
                              <input type="text" name="nama_brg" class="form-control" placeholder="" value="<?php echo $row['nama_brg'];?>"  required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Nama Vendor</label>
                              <input type="text" name="nm_vendor" class="form-control" placeholder="" value="<?php echo $row['nm_vendor'];?>"  required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Jumlah Barang</label>
                              <input type="number" name="jml_brg" class="form-control" placeholder="" value="<?php echo $row['jml_brg'];?>"  required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Satuan</label>
                              <input type="text" name="satuan" class="form-control" value="<?php echo($row['satuan']); ?>" required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Tanggal Barang Pemesanan</label>
                              <input type="date" name="tgl_pesan" class="form-control" placeholder="" value="<?php echo $row['tgl_pesan'];?>"  required>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Tanggal Barang Terakhir Datang</label>
                              <input type="date" name="tgl_expired" class="form-control" placeholder="" value="<?php echo $row['tgl_expired'];?>"  required>
                            </div>
                            <!-- <div class="clearfix"> </div>
              <div class="col-md-12 form-group2 group-mail">
                              <label>Upload Surat</label>
                              <input type="file" name="upload_surat" class="form-control" placeholder="" value="" >
                            </div> -->
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
                  <div class="modal fade" id="delete<?php echo $row['id_pemesanan'];?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b>[User Page] </b> Delete Record</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <form method="post" action=" "> -->
                            <?php echo form_open_multipart(site_url('Pemesanan/delete/'.$row['id_pemesanan'])); ?>
                            <div class="clearfix"> </div>
                            <div class="col-md-12 form-group2 group-mail">
                              <label>Are you sure delete this record?</label>
                              <h6>Kode Barang : <?php echo $row['kode_brg'];?></h6>
                              <h6>Nama Vendor : <?php echo $row['nm_vendor'];?></h6>
                              <h6>Jumlah Barang : <?php echo $row['jml_brg'];?></h6>
                              <!-- <input type="hidden" name="id_pemesanan" class="form-control" placeholder="client name" value="<?php echo $row['id_pemesanan'];?>" required> -->
                            </div>
                            <button type="submit" name='submit' class="btn btn-default">Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="selesai<?php echo $row['id_pemesanan'];?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b>[User Page] </b> Finished Record</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <form method="post" action=" "> -->
                            <?php echo form_open_multipart(site_url('Pemesanan/set_status/'.$row['id_pemesanan'])); ?>
                            <div class="form-group">
                              <label>Klik <b>Selesai</b> jika Anda akan menolak Barang ini.</label>
                              <h6>Kode Barang : <?php echo $row['kode_brg'];?></h6>
                              <h6>Nama Vendor : <?php echo $row['nm_vendor'];?></h6>
                            </div>
                            <div class="form-group">
                              <input type="hidden" name="status" value='Selesai'>
                            </div>
                            <button type="submit" name='set_update' class="btn btn-default">Selesai</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
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
<?php require('include/sidebar.php');?>
<?php require('include/search_ajax.php');?>
<?php require('include/foot.php');?>
<?php require('include/footer.php');?>
<?php require('include/jstable.php');?>
</body>
</html>