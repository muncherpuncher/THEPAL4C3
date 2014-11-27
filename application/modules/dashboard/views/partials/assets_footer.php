<script type="text/javascript" src="<?php echo base_url('_assets/_js/jquery/jquery.scrollTo.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('_assets/_js/jquery/jquery.nicescroll.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('_assets/_js/bootstrap/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url();?>_assets/_js/data-tables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>_assets/_js/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url('_assets/_js/custom/common-scripts.js')?>"></script>
<script src="<?php echo base_url();?>_assets/dashboard/js/dynamic-table.js"></script>


<script type="text/javascript">

	$(function(){

	  var d = new Date();
	  var currDate = d.getDate();
	  var currMonth = d.getMonth();
	  var currYear = d.getFullYear();

	  var dateStr = currDate + "-" + currMonth + "-" + currYear;

	  $('.event-date').datepicker({
	      format: 'yyyy-mm-dd',
	      defaultDate: dateStr
	  });

	  $('.event-time').timepicki();
	       

	});
	
</script>