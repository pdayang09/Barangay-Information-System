 <?php session_start();?>
<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">		<form method = POST>
<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>
	

<button  class="btn btn-info" onclick="window.location.href='Hholdview.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
<br><br>
<p><font face = "cambria" size = 4 color = "grey"> New Address: </font></p>
	<div class="form-group">	
	
	         	
           <div class="col-sm-3">

             <input id="BuildingID" class="form-control input-group-lg reg_name" type="text" name="Building" title="Enter first name" placeholder="Building Number" required>
           </div> 
		  
			<div class="col-sm-3"> 	
			
			<select  name = "Street" id = "StreetId" class="form-control"  >
			<option> Street Name</option>
			<?php require('connection.php');
			$sql = "Select * from tblStreet";
			$sql1 = mysqli_query($con,$sql);
			while($row = mysqli_fetch_object($sql1)){
				?> <option  <?php echo "value =".$row->intStreetId;?>> <?php echo $row->strStreetName." ".$row->strPurok;?></option><?php
			}?>
			</select>
		

			</div>
		 
	     
	</div><br><br><br>


	<p><font face = "cambria" size = 4 color = "grey"> Residence: </font></p>

<div class="form-group">				
           <div class="col-sm-3">
<select name = "Residence" class = "form-control">
<option>Rent</option>
<option>Owned</option>
</select> 
            
           </div> 
		  
		   
		   
	</div><br><br><br>

<button type = submit  class="btn btn-info" name = "btnsubmit" onclick  = "return check();">Submit Record</button>
<br><br>
 <?php
 if(isset($_POST['btnsubmit'])){
	 $t = $_SESSION['transfer']; 
	 $street = $_POST['Street'];
 $Building = $_POST['Building'];
 $residence = $_POST['Residence'];
	 require('connection.php');
	 $query = "SELECT concat(strBuildingNo,', ',strStreetName,' ', strPurok) as 'address' FROM `tblhousehold` inner join tblstreet on intStreetId = intForeignStreetId WHERE intHouseholdNo = $t ";
	 $sql = mysqli_query($con,$query);
	 $row = mysqli_fetch_object($sql);
	 $old = $row->address;

 mysqli_query($con,"Update `tblhousehold` set `strOldAddress` = '$old' , `intForeignStreetId` = '$street', `strBuildingNo` = '$Building', `strResidence` = '$residence' where `intHouseholdNo` = '$t'");
 echo "<script>
 window.location = 'Hholdview.php';</script>";}?>
</form>
                 </center>      
                    </div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
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
function check(){
	var x = document.getElementById('BuildingID').value;
	var y = document.getElementById('StreetId').value;
	if(x == ' '|| y == 'Street Name'){
		alert('Please Complete the form');
		return false;
	}
}
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
