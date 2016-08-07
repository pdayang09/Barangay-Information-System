<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
<head>
<!-- script type = "text/javascript">

function a(){
	var selectobject1 = document.getElementById("equipa1");
	var b = ' <!-- ?php echo $_SESSION['stat']?>';

		for (var i=0; i<selectobject1.length; i++){
			if(selectobject1.options[i].value == b) {
				document.getElementById("equipa1").value = selectobject1.options[i].value;}
			else{
				
			}
		}
}
</script -->
    <!-- ?php include('head.php');? --> <!-- //DINISABLE KO MUNA YUNG HEADER -->
</head>

<body>
<form method = POST>
    <div id="wrapper">
        <!-- ?php include('Nav.php');? --> <!-- //SAME AS NAVIGATION -->
		
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
					
			<legend ><font face = "cambria" size = 8 color = "grey"> Edit Equipment </font></legend>

			<div class = 'modal-body'>						

			<p><font face = "cambria" size = 5 color = "grey"> Equipment Control No. </font></p>
			<div class = "form-group">
				<div class="col-sm-5">
					<input id="controlno1" name = "controlno1"  value = <?php  if(isset($_SESSION['contno'])){echo $_SESSION['contno']; }?> class="form-control input-group-lg reg_name" type="text" readonly = true>			 
				</div>
			</div><br><br><br> <!-- END OF Equipment Control No --> 
	
			<p><font face = "cambria" size = 5 color = "grey"> Category </font></p>
			<div class = "form-group">
				<div class="col-sm-5">
					<input name = "category"  class = "form-control input-group-lg reg_name" type="text" readonly = true value = <?php if(isset($_SESSION['cat'])){echo $_SESSION['cat']; } ?>>			 
				</div>
			</div><br><br><br> <!-- END OF CATEGORY -->
			
			<p><font face = "cambria" size = 5 color = "grey"> Quantity </font></p>
			<div class = "form-group">
				<div class="col-sm-5">
					<input  name = "quantity"  value="" class="form-control input-group-lg reg_name" type="number" min="1" value = <?php if(isset($_SESSION['stat'])){echo $_SESSION['stat']; } ?>>			 
				</div>
			</div><br><br><br><br><br> <!-- END OF Quantity -->
		   
		   <?php
				//echo '<script> a(); </script>';
			?>
	
			<center> <input type="submit" class="btn btn-outline btn-success" name = "btnEdit" id = "btnEdit"  value = "Save"  > 
			<input type="submit" class="btn btn-outline btn-success" name = "btnCancel" id = "btnCancel"  value = "Cancel" ><br><br>
			
			<?php
			 if (isset($_POST['btnEdit'])){
				 $strcont = $_POST['controlno1'];		
				 $intquantity = $_POST['quantity'];
				 
				require('connection.php');
				 $g = mysqli_query($con,"UPDATE tblequipment SET intEquipQuantity = '$intquantity' WHERE strEquipNo = '$strcont'");
				
				if($g == true){
					 echo "<script>alert('Success');</script>";
					 echo "<script> window.location = 'EquipMaintenance.php';</script>";}
					 else{
						 die("bitch");}
										} //if (isset($_POST['btnEdit'])){
				if (isset($_POST['btnCancel'])){ echo "<script> window.location = 'EquipMaintenance.php';</script>";}
			 
			?>
			
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                </div> <!-- /#modal-body-->
            </div> <!-- /#col-lg-12 -->		
        </div><!-- /#row -->	
    </div><!-- /#container-fluid -->	
 </div><!-- /#content-wrapper-->	
 </div><!-- /#wrapper-->	
 </form>
 

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
