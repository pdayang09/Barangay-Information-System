<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
         <br>
          <section class="wrapper site-min-height">
 <button  class="btn btn-info" onclick="window.location.href='StreetMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>

<legend ><font face = "cambria" size = 8 color = "grey"> Add new Account</font></legend>
		
		<form method = POST>

<div class="col-sm-9 col-md-6 col-lg-6" id = 'appointmember'>
<div class = "showback" >

		<p><font face = "cambria" size = 5 color = "grey"> Resident's Full Name </font></p>
		<div class = "form-group">
			<div class="col-sm-12">
				<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text"  readonly>			 
           </div>
		</div><br><br><br>
		
		<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Resident's Address</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text"  readonly>	
			</div>
		</div>
	<br><br><br>	
  <div class="split-para"><font face = "cambria" size = 5 color = "grey"> Username</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text"  readonly>	
			</div>
		</div>
	<br><br><br>	
	<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Password</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text"  readonly>	
			</div>
		</div>
	<br><br><br>	
	<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Email Address</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text"  readonly>	
			</div>
		</div>
	<br><br><br>	
	<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Start Date</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="date" value = <?php echo date('Y-m-d');?> min = <?php echo date('Y-m-d');?>  readonly>	
			</div>
		</div>
	<br><br><br>	
	<div class="split-para"><font face = "cambria" size = 5 color = "grey">End Date</font></p>
			<div class="col-sm-12">		
			<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="date" min = <?php echo date('Y-m-d');?> readonly>	
			</div>
		</div>
	<br><br><br>	
		<center> <input type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > </div>
		<br><br></center></div></form>
			<!-- DIV FOR TABLE -->
			<div class="input-append">
      &nbsp;&nbsp;&nbsp;&nbsp; <input name="search" id="searchr"  placeholder = "Input Resident Last Name" onchange = "search()"/>
    <button class="btn btn-info btn-round btn-xs  " id = "searchst" name = "s1" value = 2 onclick = "search()"><i class = "glyphicon glyphicon-search"></i></button>



</div><br>
		<div class="col-sm-3 col-md-6 col-lg-6" id = 'MemberTable'>
		<div class = "showback">
		<table  class="table table-striped table-bordered table-hover" >
		<thead>
		<th>Resident Name</th>
		<th>Resident Address</th>
		<th>Age</th>
		<th>Action</th>
		</thead>
		<tbody>
							<?php
					require('connection.php');
						$sql = "SELECT  intMemberNo,concat(strLastName,' ,',strFirstName) as 'Name', concat(strBuildingNo,' , ',strStreetName) as 'Street',Timestampdiff(YEAR,dtBirthdate,NOW()) as Age   FROM `tblhousemember` as a inner join `tblhousehold` as b on  a.intForeignHouseholdNo = b.intHouseholdNo inner join tblaccount as c on !(a.intMemberNo = c.intForeignMemberNo) inner join tblstreet as d on b.intForeignStreetId = d.intStreetId where !(strVotersId = '') && Timestampdiff(YEAR,dtBirthdate,NOW())";
						$query = mysqli_query($con, $sql);
				
						if(mysqli_num_rows($query) > 0){
							$i = 1;
					
							while($row = mysqli_fetch_object($query)){?>
								<tr>
									<td><?php echo $row->Name?>				</td>
									<td><?php echo $row->Street?></td>
									<td><?php echo $row->Age?></td>
									<td> <button value = '<?php echo $row->intMemberNo?>' onclick = "Appoint(this.value)">Choose</button></td>
								</tr>
		<?php }} ?></tbody>
				</table></div>
		</div>
<!-- DIV END-->
		<?php
		 if (isset($_POST['btnAdd'])){
			 $strStreet = $_POST['StreetName'];
			 $strPurok = $_POST['Purok'];
			 if($strStreet == NULL ){
				 echo "<script>alert('Please Complete the form');</script>";
			 }
			 else{
				 require('connection.php');
			
				mysqli_query($con,"INSERT INTO `tblStreet`(`strStreetName`, `intForeignZoneId`) VALUES ('$strStreet','$strPurok');");
					 echo "<script>alert('Success');
					 window.location = 'StreetMaintenance.php';</script>";
			 }
		}
		?>

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
	  function search(){
		value = document.getElementById('searchr').value;
		//alert(value);
			$.ajax({
		type: "POST",
		url: "SearchMember1.php",
		data: 'sid=' + value,
		success: function(data){
		//	alert(data);
			$("#MemberTable").html(data);
		}
		
	});
	}
	function Appoint(value){
	//	alert(value);
			$.ajax({
		type: "POST",
		url: "AppointMember.php",
		data: 'sid=' + value,
		success: function(data){
		//	alert(data);
			$("#appointmember").html(data);
		}
		
	});
	}
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>