<script src="<?php echo base_url('assets2/js/jquery.js')?>"></script>
<script src="<?php echo base_url('assets2/js/bootstrap.min.js')?>"></script>
<script class="include" type="text/javascript" src="<?php echo base_url('assets2/js/jquery.dcjqaccordion.2.7.js')?>"></script>
<script src="<?php echo base_url('assets2/js/jquery.scrollTo.min.j')?>s"></script>
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