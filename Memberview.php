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
<br>


	<form method = POST>
<?php
require('connection.php');
$Hno = $_SESSION['Memb'];
$sql = "SELECT * from tblhousemember where Memberno = '$Hno'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_object($query);
$Gend = "";
$Mid = "";
$Ext = "";

if($row->Gender == "M"){
	$Gend = "Male";
}
else{
	$Gend = "Female";
}
if($row->MiddleName == NULL){
	
}
else{
	$Mid = $row->MiddleName;
}

if($row->NameExtension == NULL){
	
}
else{
	$Ext = $row->NameExtension;
}

echo "Head of Household: ".$row->LastName.",".$row->FirstName." ".$Mid." ".$Ext."<br>";
echo "Gender: ".$Gend."<br>";
echo "Date of Birth: ".$row->Birthdate."<br>";
echo "Contact Number: ".$row->ContactNo."<br>";
echo "Occupation: ".$row->Occupation."<br>";
echo "SSS Number: ".$row->SSSNo."<br>";
echo "TIN Number: ".$row->TINNo."<br>";

?>
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
