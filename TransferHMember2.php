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
	

<button  class="btn btn-info" onclick="window.location.href='HholdPersonal.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
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
		     
<br><br><br>
  <p><font face = "cambria" size = 4 color = "grey"> Residence: </font></p>
  <div class="form-group">        
           <div class="col-sm-3">

  <select name = "Residence" class = form-group>
<option>Rent</option>
<option>Owned</option>
</select> 
           </div>
       
         
  </div><br><br><br>


<button type = submit  class="btn btn-info" name = "btnsubmit">Submit Record</button>
<br><br>
<?php
 include("connection.php");
 
 if(isset($_POST['btnsubmit'])){
$t = $_SESSION['Memb'];

 $Residence = $_POST['Residence'];
 $Lname = "";
 $House = $_POST['Building'];
 $Street = $_POST['Street'];
   $sql = "SELECT strLastname FROM `tblhousemember` where intMemberNo = '$t'";
 $query = mysqli_query($con, $sql);
  $row = mysqli_fetch_object($query);
 $Lname = $row->strLastname;

  $sql = "SELECT concat(strBuildingNo,' ',strStreetName,' ',strPurok) as 'Address' from tblhousehold as a Inner Join tblhousemember as b on a.intHouseholdNo = b.intForeignHouseholdNo inner join tblstreet as c on a.intForeignStreetId = c.intStreetId where b.intMemberNo = '$t'";
  $query = mysqli_query($con, $sql);
 $row = mysqli_fetch_object($query);
 $OldAddress = $row->Address;
  
 mysqli_query($con,"INSERT INTO `tblhousehold`(`intForeignStreetId`, `strBuildingNo`, `strHouseholdLname`, `strResidence`, `strOldAddress`,strStatus) VALUES ('$Street','$House','$Lname','$Residence','$OldAddress','Enabled')");

 $sql = "SELECT `intHouseholdNo` FROM `tblhousehold` ORDER BY intHouseholdNo DESC";
  $query = mysqli_query($con, $sql);
  $row = mysqli_fetch_object($query);
  $new = $row->intHouseholdNo;
  
  mysqli_query($con,"UPDATE `tblhousemember` SET `intForeignHouseholdNo`= '$new',`strStatus`= 'Head' WHERE intMemberNo = '$t'");
  echo "<script>window.location = 'Hholdview.php';</script>";
  }?>
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

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
