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
<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>
<button  class="btn btn-info" onclick="window.location.href='Hholdpersonal.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
	<br>
	<br><form method = POST>
<legend ><p><font face = "cambria" size = 5 color = "grey"> Transfer A Household Member</font></p></legend >

	<form method = POST>

      <button = submit name = "Exist" class="btn btn-default">Existing Household</button>
							   <button type = "button" Onclick="window.location.href='TransferHMember2.php'" class="btn btn-default" <?php
							   require('connection.php');
				$u = $_SESSION['Memb'];
				 $sql = "Select dtBirthdate From tblhousemember where intMemberNo = '$u'";
							   $query = mysqli_query($con,$sql);
							   $row = mysqli_fetch_object($query);
							   $bday = $row->dtBirthdate;
							   if((date("Y-m-d") - $bday)<18){
								   echo "disabled";
							   }
							   else{}?>>New Household</button>		  
							   <?php
								if(isset($_POST['Exist'])){
									$_SESSION['no'] = $_POST['Exist'];
									echo "<script> window.location = 'SearchMember.php';</script>";
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
