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


  		<legend ><font face = "cambria" size = 8 color = "grey"> Add new Account</font></legend>
  		<button  class="btn btn-info" onclick="window.location.href='AccountMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button><br><br>
  		<form method = POST enctype = "multipart/form-data">

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
  					<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Position</font></p>
  						<div class="col-sm-12">		
  							<select class ="form-control input-group-lg reg_name" readonly>
  								<option>--Select Position--</option>
  							</select>
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
  					<div class="split-para"><p><font face = "cambria" size = 5 color = "grey">End Date</font></p>
  						<div class="col-sm-12">		
  							<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="date" min = <?php echo date('Y-m-d');?> readonly>	
  						</div>
  					</div>
  					<br><br><br>

  					<p><font face = "cambria" size = 5 color = "grey">Upload Image</font></p>
  					<input type = "file" name = "image" id="imgInp">
  					<img id="blah" height = 75 width = 250 src="#" alt="your image" />
  					<br><br><br><br>

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
  										$sql = "SELECT intMemberNo,concat(strLastName,' ,',strFirstName) as 'Name', concat(strBuildingNo,' , ',strStreetName) as 'Street',Timestampdiff(YEAR,dtBirthdate,NOW()) as Age FROM `tblhousemember` as a inner join tblhousehold as b on a.intForeignHouseholdNo = b.intHouseholdNo inner join tblstreet as c on b.intForeignStreetId = c.intStreetId WHERE a.intMemberNo NOT IN (SELECT intForeignMemberNo FROM tblaccount) && !(strVotersId = '') && Timestampdiff(YEAR,dtBirthdate,NOW())";
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
  								$id = $_POST['btnAdd'];
  								$pos = $_POST['position'];
  								$username = $_POST['UserN'];
  								$pass = $_POST['Pass'];
  								$Email = $_POST['Email'];
  								$start = $_POST['Start'];
  								$end = $_POST['End'];
  								$_User = mysqli_real_escape_string($con,$username);
  								
  								
  								$dt = $_User;
  								$dt = stripslashes($dt);
  								$dt = str_replace("'", '', $dt);
  	
  								if(getimagesize($_FILES['image']['tmp_name']) == FALSE){


  								mysqli_query($con,"INSERT INTO `tblaccount`(`intForeignMemberNo`, `strUsername`, `strPassword`, `intForeignPositionId`, `strEmailAdd`, `dtStart`, `dtEnd`, `strStatus`) VALUES ('$id','$_User','$pass','$pos','$Email','$start','$end','Enabled')");
  								
  								echo "<script>alert('Successfully Inserted!');
  								window.location = 'AccountMaintenance.php';</script>";
  								
  							}

  							else{
  							$info = pathinfo($_FILES['image']['name']);
  							$ext = $info['extension']; // get the extension of the file(filename)
  							$newname = "$dt.".$ext;
  							$target = 'Images/OfficerSign/'.$newname;
  							mysqli_query($con,"INSERT INTO `tblaccount`(`intForeignMemberNo`, `strUsername`, `strPassword`, `intForeignPositionId`, `strEmailAdd`, `dtStart`, `dtEnd`, `strStatus`,`strSign`) VALUES ('$id','$_User','$pass','$pos','$Email','$start','$end','Enabled','$target')");
  							move_uploaded_file( $_FILES['image']['tmp_name'], $target);
  								echo "<script>alert('Successfully Inserted!');
  								window.location = 'AccountMaintenance.php';</script>";
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


  		function readURL(input) {
  			if (input.files && input.files[0]) {
  				var reader = new FileReader();
  				
  				reader.onload = function (e) {
  					$('#blah').attr('src', e.target.result);
  				}
  				
  				reader.readAsDataURL(input.files[0]);
  			}
  		}

  		$("#imgInp").change(function(){
  			readURL(this);
  		});
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
