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
         <li><a href="pen_brg.php">Users</a></li>
         <li class="active">Form</li>
       </ol>
     </div>
     <p align="right"><button class="btn btn-default" data-toggle="modal" data-target="#myModal"> + Tambah User </button></p>
     <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>[User Page] </b> Add New Record</h4>
          </div>
          <div class="modal-body">
            <!-- <form method="post" action=" "> -->
              <?php echo form_open_multipart(site_url('users/create')); ?>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" value=" " required >
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="Password" name="password" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Role</label>
                <select name="user_role" class="form-control">
                  <option value="">--Select--</option>
                  <option value="Admin">Admin</option>
                  <option value="Vendor">Vendor</option>
                  <option value="Kepala Gudang">Kepala Gudang</option>
                </select>
                <!-- <input type="text" name="user_role" class="form-control" required> -->
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
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
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

              $result = mysqli_query($con,"SELECT * FROM tb_user ORDER BY user_id ASC");
              $no = 0;
              if(mysqli_num_rows($result)>0){

                while($row = mysqli_fetch_array($result))
                {
                  $no++;
                  echo "<tr>";
                  echo "<td>".$no.".</td>";
                  echo "<td>".$row['username']."</td>";
                  echo "<td>".'********'."</td>";
                  echo "<td>".$row['user_role']."</td>";
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
                            <?php echo form_open_multipart(site_url('users/update/'.$row['user_id'])); ?>
                            <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $row['username'];?>" required >
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="Password" name="password" class="form-control" placeholder="Password" value="<?php echo $row['password'];?>"  required>
                            </div>
                            <div class="form-group">
                              <label>Role</label>
                              <select name="user_role" class="form-control">
                                <option value="<?php echo $row['user_role']; ?>"><?php echo $row['user_role']; ?></option>
                                <option value="Admin">Admin</option>
                                <option value="Vendor">Vendor</option>
                                <option value="Kepala Gudang">Kepala Gudang</option>
                              </select>
                              <!-- <input type="text" name="user_role" class="form-control" placeholder="" value="<?php echo $row['user_role'];?>"  required> -->
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
                            <?php echo form_open_multipart(site_url('users/delete/'.$row['user_id'])); ?>
                            <div class="form-group">
                              <label>Are you sure delete this record?</label>
                              <h6>Username : <?php echo $row['username'];?></h6>
                              <h6>Password : *********</h6>
                              <h6>Username : <?php echo $row['user_role'];?></h6>
                            </div>
                            <button type="submit" name="delete" class="btn btn-default">Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Set User User Page -->
                  <div class="modal fade" id="set_users<?php echo $row['user_id'];?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><b>[User Page] </b> Set Users Record</h4>
                        </div>
                        <div class="modal-body">
                          <form method="post" action=" ">
                            <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="Username" class="form-control" value="<?php echo $row['user_name'];?>" required readonly>
                              <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id'];?>" required>
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
</html>