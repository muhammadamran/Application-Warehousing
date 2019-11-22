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
         <li><a href="pen_brg.php">Vendor</a></li>
         <li class="active">Form</li>
       </ol>
     </div>
     <p align="right"><button class="btn btn-default" data-toggle="modal" data-target="#myModal"> + Tambah Vendor </button></p>
     <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>[User Page] </b> Add New Record</h4>
          </div>
          <div class="modal-body">
            <!-- <form method="post" action=" "> -->
              <?php echo form_open_multipart(site_url('vendor/create')); ?>
              <div class="form-group">
                <label>Nama Vendor</label>
                <input type="text" name="username" class="form-control" required >
              </div>
              <div class="form-group">
                <input type="hidden" name="password" class="form-control" value="1234" >
              </div>
              <div class="form-group">
                <input type="hidden" name="user_role" class="form-control" value="Vendor" >
              </div>
              <div class="form-group">
                <label>Alamat Vendor</label>
                <input type="text" name="alamat_vendor" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Email Vendor</label>
                <input type="text" name="email_vendor" class="form-control" required>
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
                <th>Nama Vendor</th>
                <th>Alamat Vendor</th>
                <th>Email Vendor</th>
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

              $result = mysqli_query($con,"SELECT * FROM tb_user WHERE user_role='Vendor' ORDER BY user_id ASC");
              $no = 0;
              if(mysqli_num_rows($result)>0){

                while($row = mysqli_fetch_array($result))
                {
                  $no++;
                  echo "<tr>";
                  echo "<td>".$no.".</td>";
                  echo "<td>".$row['username'] . "</td>";
                  echo "<td>".$row['alamat_vendor'] . "</td>";
                  echo "<td>".$row['email_vendor'] . "</td>";
                  echo "<td align= ''>
                  <a href='#' data-toggle='modal' data-target='#update$row[user_id]' title='Edit'><span class='label label-success'>Edit</span></a>
                  <a href='#' data-toggle='modal' data-target='#delete$row[user_id]' title='Delete'><span class='label label-success'>Delete</span></a>
                  </td>";
                  echo "</tr>";
                  ?>

                  <!-- Update User Page -->
                  <div class="modal fade" id="update<?php echo $row['user_id'];?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b>[User Page] </b> Update Record</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <form method="post" action=" "> -->
                            <?php echo form_open_multipart(site_url('vendor/update/'.$row['user_id'])); ?>
                            <div class="form-group">
                              <label>Nama Vendor</label>
                              <input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>" required >
                              <input type="hidden" name="password" class="form-control" value="1234" required >
                              <input type="hidden" name="user_role" class="form-control" value="Vendor" required >
                            </div>
                            <div class="form-group">
                              <label>Alamat Vendor</label>
                              <input type="text" name="alamat_vendor" class="form-control" value="<?php echo $row['alamat_vendor'];?>"  required>
                            </div>
                            <div class="form-group">
                              <label>Email Vendor</label>
                              <input type="text" name="email_vendor" class="form-control" value="<?php echo $row['email_vendor'];?>"  required>
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
                  <div class="modal fade" id="delete<?php echo $row['user_id'];?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b>[User Page] </b> Delete Record</h4>
                        </div>
                        <div class="modal-body">
                          <!-- <form method="post" action=" "> -->
                            <?php echo form_open_multipart(site_url('vendor/delete/'.$row['user_id'])); ?>
                            <div class="form-group">
                              <label>Are you sure delete this record?</label>
                              <h6>Nama Vendor : <?php echo $row['username'];?></h6>
                              <h6>Alamat Vendor : <?php echo $row['alamat_vendor'];?></h6>
                              <h6>Email Vendor : <?php echo $row['email_vendor'];?></h6>
                            </div>
                            <button type="submit" name="delete" class="btn btn-default">Yes</button>
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
</html>