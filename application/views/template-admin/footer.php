    <script src="<?=base_url("assets/js/jquery-3.2.1.min.js");?>"></script>
    <script src="<?=base_url('assets/js/popper.min.js');?>"></script>
    <script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
    <script src="<?=base_url("assets/js/main.js");?>"></script>
    <!-- The javascript plugin to display page loading on top-->
	<script src="<?=base_url("assets/js/plugins/pace.min.js")?>"></script>
	
	<script type="text/javascript" src="<?=base_url("assets/js/plugins/jquery.dataTables.min.js");?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/js/plugins/dataTables.bootstrap.min.js");?>"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Page specific javascripts-->
	<script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>