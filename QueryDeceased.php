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
		 
		<br><br>
		  	<div class="col-sm-9 col-md-6 col-lg-6">
			 
		  <legend ><font face = "cambria" size = 8 color = "grey">Deceased Lists </font></legend>
			</div>
		  <div class="col-sm-3 col-md-6 col-lg-6">
		  <br>
		    <div class = 'showback'>
			<font size =  2><strong> Filter By:</strong></font>
			<br>
			
			<select id = "Gender" >
			<option>Gender</option>
			<option value = "charGender ='M'">Male</option>
			<option  value = "charGender ='F'">Female</option></select>
			
			<select id = "Age">
			<option>Age</option>
			<option value = "timestampdiff(YEAR,`dtBirthdate`,`dtDied`)<18">17 years old and Below </option>
			<option  value = "timestampdiff(YEAR,`dtBirthdate`,`dtDied`)>17 AND timestampdiff(YEAR,`dtBirthdate`,`dtDied`)<60">18 to 59 years old</option>
			<option  value = "timestampdiff(YEAR,`dtBirthdate`,`dtDied`)>59">60 and above</option></select>
			
			&nbsp;&nbsp;<select id = 'Yrdied'>
			<option>Year Died</option>
			<?php
			require('connection.php');
			$query = "SELECT Distinct EXTRACT(YEAR FROM dtDied) as yr FROM `tbldeceased`";
			$sql = mysqli_query($con,$query);
			while($row = mysqli_fetch_object($sql)){?>
			<option value = '<?php echo "EXTRACT(year FROM dtDied) = ".$row->yr;?>'><?php echo $row->yr;?></option>
			<?php } ?></select>
			
			&nbsp;&nbsp;<select id = 'MonthDied'>
			<option value = "Month">Month</option>
			<option value = "EXTRACT(Month FROM dtDied) =  1">January</option>
			<option  value = "EXTRACT(Month FROM dtDied) =  2">February</option>
			<option  value = "EXTRACT(Month FROM dtDied) =  3">March</option>
			<option  value = "EXTRACT(Month FROM dtDied) =  4">April</option>
			<option  value = "EXTRACT(Month FROM dtDied) =  5">May</option>
			<option  value = "EXTRACT(Month FROM dtDied) =  6">June</option>
			<option  value = "EXTRACT(Month FROM dtDied) =  7">July</option>
			<option  value = "EXTRACT(Month FROM dtDied) =  8">August</option>
			<option  value = "EXTRACT(Month FROM dtDied) =  9">September</option>
			<option  value = "EXTRACT(Month FROM dtDied) =  10">October</option>
			<option  value = "EXTRACT(Month FROM dtDied) =  11">November</option>
			<option  value = "EXTRACT(Month FROM dtDied) =  12">December</option>
			</select>
			&nbsp;<button type = button onclick = "showdis()" class = 'btn btn-xs btn-round btn-info'><i  class="glyphicon glyphicon-search"></i></button>
		</div>
		  </div>
		  <br><br><br><br><br><br>
		  <div class = "showback">
		  <table  class="table table-striped table-bordered table-hover" border = '2' style = 'width:95%'
		  id = 'tblview'>
		  <thead>
		  <th> Resident's Name</th>
		  <th> Gender</th>
		  <th> Date of Birth</th>
		  <th> Date of Death</th>
		  <th> Age of Death</th>
		  </thead>
		  <tbody>
		  <?php
		  require('connection.php');
		  $Gender = "";
		  $query = "SELECT concat(strLastName,' ',strNameExtension,', ',strFirstName,'' ,strMiddleName) as Name, `charGender`,`dtBirthdate`,`dtDied`, timestampdiff(YEAR,`dtBirthdate`,`dtDied`) as Age FROM `tbldeceased`";
		  $sql = mysqli_query($con,$query);
		  while($row = mysqli_fetch_object($sql)){
			 if($row->charGender == 'M'){
				 $Gender = 'Male';
			 }
			else{ $Gender = 'Female';}			 ?>
		  <tr> <td> <?php echo $row->Name; ?></td>
		  <td><?php echo $Gender; ?></td>
		  <td> <?php echo $row->dtBirthdate?></td>
		  <td> <?php echo $row->dtDied ?></td>  
		  <td> <?php echo $row->Age; ?> </td><tr>
		  <?php } ?>
		  </tbody>
		  </table>
		  
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
	function showdis(){
	var cntr = 0;
	var flag = 0;
	var Gend = "";
	var query = "";
	var age = "";
	var yr = "";
	var mnth = "";
	//alert(document.getElementById('Yrdied').value);
	//alert(document.getElementById('MonthDied').value);
	
	if(document.getElementById('Yrdied').value == "Year Died" && document.getElementById('MonthDied').value != "Month"){
		alert('Please Choose A Year to Proceed');
	}
	
	else{
		//alert(':D');
		if(document.getElementById('Gender').value != 'Gender'){
			cntr +=1;
			Gend = document.getElementById('Gender').value ;
			//alert(Gend);
		}
		if(document.getElementById('Age').value != 'Age'){
			cntr +=1;
			age = document.getElementById('Age').value ;
			//alert(age);
		}
		
		
		
		if(document.getElementById('MonthDied').value != 'Month'){
			cntr +=1;
			mnth = document.getElementById('MonthDied').value ;
		//alert(mnth);
		}
		
		if(document.getElementById('Yrdied').value != 'Year Died'){
			cntr +=1;
			yr = document.getElementById('Yrdied').value ;
		//alert(yr);
		}
		var a;
		
		
		for(flag ==0;flag<cntr;flag++){
			if(flag == 0){
				if(Gend != ""){
					query = document.getElementById('Gender').value ;
				}
				else{
					if(document.getElementById('Age').value != 'Age'){
						query = document.getElementById('Age').value;
						a = 1;
					}
					else{
						if(document.getElementById('Yrdied').value != 'Year Died'){
							query = document.getElementById('Yrdied').value ;
							
							if(document.getElementById('MonthDied').value != 'Month'){
						query = query.concat(' AND ',document.getElementById('MonthDied').value);}
							break;
						}
					}
				}
			}
			else{if(flag == 1){
				if(document.getElementById('Age').value != 'Age' && a != 1){
					query = query.concat(' AND ',document.getElementById('Age').value);
				}
				else{
					if(document.getElementById('Yrdied').value != 'Year Died'){
						query = query.concat(' AND ',document.getElementById('Yrdied').value);
						
					}
				
					if(document.getElementById('MonthDied').value != 'Month'){
						query = query.concat(' AND ',document.getElementById('MonthDied').value);
						
					}
				

				}
			}
			if(flag == 2){
				if(document.getElementById('Yrdied').value != 'Year Died'){
						query = query.concat(' AND ',document.getElementById('Yrdied').value);
					}
					if(document.getElementById('MonthDied').value != 'Month'){
						query = query.concat(' AND ',document.getElementById('MonthDied').value);
					}
				
			}}
			
		}
		
		//alert(query);
		
		$.ajax({
		type: "POST",
		url: "QueryDec.php",
		data: 'sid=' + query,
		success: function(data){
			//alert(data);
			$("#tblview").html(data);
		}
		
	});}
	}
	
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
