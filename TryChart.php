 <?php session_start();?>
<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->  
				 
      <section id="main-content">
          <section class="wrapper site-min-height">
		  	<div class="col-sm-9 col-md-6 col-lg-6">
			 
		  <legend ><font face = "cambria" size = 8 color = "grey">Resident Lists </font></legend>
			</div>
		  <div class="col-sm-3 col-md-6 col-lg-6">
		  <br>
		    <div class = 'showback'>
			 <select class = "form-control" align="right" >
		  <option> a </option></select>
		</div>
		  </div>
		  <br><br><br><br><br><br>
		  <div class = "showback">
		  <div style="width:10%; border:1px solid #000; ">
		  <center>
		  <h4><strong>Legend</strong></h4>
		  <br>
		<div style="width:100px;height:30px;border:1px solid #fff; background-color:#000080;"></div> <strong>Male</strong>
		  <br><br><div style="width:100px;height:30px;border:1px solid #fff; background-color:#ffb6c1;"></div> <strong>Female</strong><br><br></center></div><center>
	<canvas id ='myChart' width = '600' height = '600'></canvas></center>
		  </div>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
	<script src = "assets/js/jquery-2.1.4.min.js"></script>
	<script src = "assets/js/Chart.min.js"></script>
	
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box
	
$(document).ready(function (){
	<?php
	require('connection.php');
	$query = "Select distinct charGender, count(charGender) as c from tblhousemember group by charGender ";
	$sql = mysqli_query($con,$query);
	$ctr = 0;?>
	var pieData = [
	<?php
	while($row = mysqli_fetch_object($sql)){
		$ctr +=1;
		if($ctr == 1){?>
	{	label:"Female",
		value: <?php echo $row->c?>,
		color:"#ffb6c1 "
		}<?php } 
		else{ ?>,
	{
		label:"Male",
		value: <?php echo $row->c?>,
		color : "#000080 "
	}
		<?php }} ?>
];
	var option  = {
	segmentShowStroke : false,
	animateScale : true
}
	
	var ctx = document.getElementById('myChart').getContext('2d')
	var myLineChart = new Chart(ctx).Pie(pieData,option);
});
     
  </script>

  </body>
</html>
