<!-- <?php 
include "include/connection.php";
if (isset($_POST['submit'])) {

	$user =$_POST['username'];
	$pass =$_POST['password'];
	$log_type = "login";
	$date_log = date('Y-m-d H:i:m');

	$q = mysql_query("SELECT * FROM tb_user WHERE user_name='$user' AND user_pass='$pass'");

	if (mysql_num_rows($q) == 1) {
		session_start();
		$_SESSION['username']=$user;
		$query = mysql_query("insert into tb_log values(' ','$user','$log_type','$date_log',' ')");
		if ($query) {
			header("Location: ./index.php");
		} else {
			echo "<h4>". "log error"."</h4>";
		}           
	} else {
		header("Location: ./index.php");
	}
}
?> -->
<!DOCTYPE HTML>
<html>
<?php require('include/head.php')?>
<body>
	<!--/login-->
	<div class="error_page">
		<!--/login-top-->
		<div class="error-top">
			<div class="login">
				<h3 class="inner-tittle t-inner">Sistem Informasi Gudang</h3>
			<!-- <form action="<?php echo base_url('login/aksi_login');?>" method="post"> -->
			<?php echo form_open_multipart(site_url('login/aksi_login')); ?>
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<div class="submit"><input type="submit" name='submit' value="Login" ></div>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>
	<!--//login-top-->
</div>
<!--//login-->
<!--footer section start-->
<div class="footer">
	<div class="error-btn">
	</div>
	<p>&copy Sistem Informasi Pergudangan PERURI <a href="#" target="_blank">Version 1.0.0</a></p>
</div>
<!--footer section end-->
<!--/404-->
<!--js -->
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js')?>"></script>
<script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>