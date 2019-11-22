<!DOCTYPE HTML>
<html>
<?php require('include/head.php')?>
<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<div class="outter-wp">
					<!--custom-widgets-->
					
					<!--//custom-widgets-->
					<div class="clearfix"></div>
				</div>
				<!--//weather-charts-->
				<div class="graph-visualization">
					<div class="col-md-6 map-1">
						<h3 class="sub-tittle">Cuaca </h3>
						<div class="weather">
							<div class="weather-top">
								<div class="weather-top-left">
									<div class="degree">
										<figure class="icons">
											<canvas id="partly-cloudy-day" width="64" height="64">
											</canvas>
										</figure>
										<span>26°</span>
										<div class="clearfix"></div>
									</div>
									<script>
										var icons = new Skycons({"color": "#002561"}),
										list  = [
										"clear-night", "partly-cloudy-day",
										"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
										"fog"
										],
										i;
										for(i = list.length; i--; )
											icons.set(list[i], list[i]);

										icons.play();
									</script>
									<!-- <p>FRIDAY
										<label>13</label>
										<sup>th</sup>
										AUG
									</p> -->
								</div>
								<div class="weather-top-right">
									<p><i class="fa fa-map-marker"></i>Lokasi</p>
									<label>Bandung</label>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="weather-bottom">
								<div class="weather-bottom1">
									<div class="weather-head">
										<h4>Cloudy</h4>
										<figure class="icons">
											<canvas id="cloudy" width="40" height="40"></canvas>
										</figure>					
										<script>
											var icons = new Skycons({"color": "#00C6D7"}),
											list  = [
											"clear-night", "cloudy",
											"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
											"fog"
											],
											i;

											for(i = list.length; i--; )
												icons.set(list[i], list[i]);

											icons.play();
										</script>
										<h6>20°</h6>
										<div class="bottom-head">
											<p>Monday</p>
										</div>
									</div>
								</div>
								<div class="weather-bottom1 ">
									<div class="weather-head">
										<h4>Sunny</h4>
										<figure class="icons">
											<canvas id="clear-day" width="40" height="40">
											</canvas>	

										</figure>					
										<script>
											var icons = new Skycons({"color": "#00C6D7"}),
											list  = [
											"clear-night", "clear-day",
											"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
											"fog"
											],
											i;

											for(i = list.length; i--; )
												icons.set(list[i], list[i]);

											icons.play();
										</script>
										<h6>26°</h6>
										<div class="bottom-head">
											<p>Tuesday</p>
										</div>
									</div>
								</div>
								<div class="weather-bottom1">
									<div class="weather-head">
										<h4>Rainy</h4>
										<figure class="icons">
											<canvas id="sleet" width="40" height="40">
											</canvas>
										</figure>
										<script>
											var icons = new Skycons({"color": "#00C6D7"}),
											list  = [
											"clear-night", "clear-day",
											"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
											"fog"
											],
											i;

											for(i = list.length; i--; )
												icons.set(list[i], list[i]);

											icons.play();
										</script>

										<h6>7°</h6>
										<div class="bottom-head">
											<p>Wednesday</p>
										</div>
									</div>
								</div>
								<div class="weather-bottom1 ">
									<div class="weather-head">
										<h4>Snowy</h4>
										<figure class="icons">
											<canvas id="snow" width="40" height="40">
											</canvas>
										</figure>
										<script>
											var icons = new Skycons({"color": "#00C6D7"}),
											list  = [
											"clear-night", "clear-day",
											"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
											"fog"
											],
											i;

											for(i = list.length; i--; )
												icons.set(list[i], list[i]);

											icons.play();
										</script>
										<h6>-10°</h6>
										<div class="bottom-head">
											<p>Thursday</p>
										</div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 map-2">
						<div class="profile-nav alt">
							<section class="panel">
								<div class="user-heading alt clock-row terques-bg">
									<h3 class="sub-tittle clock">Jam </h3>
								</div>
								<ul id="clock">
									<li id="sec"></li>
									<li id="hour"></li>
									<li id="min"></li>
								</ul>
								<ul class="clock-category">
									<li>
										<a href="#" class="active">
											<img src="<?php echo base_url('assets/images/time.png')?>" alt="">
											<span>Clock</span>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo base_url('assets/images/alarm.png')?>" alt="">
											<span>Alarm</span>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo base_url('assets/images/watch.png')?>" alt="">
											<span>Stop watch</span>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php echo base_url('assets/images/timer.png')?>" alt="">
											<span>Timer</span>
										</a>
									</li>
								</ul>
							</section>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!--/charts-inner-->
		</div>
		<!--//outer-wp-->
	</div>
	<!--footer section start-->

    <?php require('include/footer.php');?>
	<!-- js placed at the end of the document so the pages load faster -->
	<script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
	<script class="include" type="text/javascript" src="<?php echo base_url('assets/js/jquery.dcjqaccordion.2.7.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.nicescroll.js')?>" type="text/javascript"></script>
	<!--common script for all pages-->
	<script src="<?php echo base_url('assets/js/common-scripts.js')?>"></script>
	<!--script for this page-->
	<!-- DATA TABES SCRIPT -->
	<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
	<!-- page script -->
	<!--footer section end-->
</div>
</div>
<!--//content-inner-->
<?php require('include/sidebar.php')?>
<?php require('include/foot.php');?>
</body>
</html>