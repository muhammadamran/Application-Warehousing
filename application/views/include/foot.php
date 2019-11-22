    <script>
      var toggle = true;
      $(".sidebar-icon").click(function() {                
        if (toggle)
        {
          $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
          $("#menu span").css({"position":"absolute"});
        }
        else
        {
          $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
          setTimeout(function() {
            $("#menu span").css({"position":"relative"});
          }, 400);
        }
        toggle = !toggle;
      });
    </script>
    <!--js -->
    <link rel="stylesheet" href="css/vroom.css">
    <script type="text/javascript" src="<?php echo base_url('assets/js/vroom.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/TweenLite.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/CSSPlugin.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.nicescroll.js')?>"></script>
    <script src="<?php echo base_url('assets/js/scripts.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>