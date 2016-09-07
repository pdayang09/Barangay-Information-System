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
		  	<div class="col-sm-9 col-md-6 col-lg-4">
			 
		  <legend ><font face = "cambria" size = 8 color = "grey">Resident Lists </font></legend>
			</div>
		  <div class="col-sm-3 col-md-6 col-lg-8">
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
			<option value = "timestampdiff(YEAR,dtBirthdate,NOW())<18">17 years old and Below </option>
			<option  value = "timestampdiff(YEAR,dtBirthdate,NOW())>17 AND timestampdiff(YEAR,dtBirthdate,NOW())<60">18 to 59 years old</option>
			<option  value = "timestampdiff(YEAR,dtBirthdate,NOW())>59">60 and above</option></select>
			
			<select id = 'Employment'>
			<option>Employment</option>
			<option value = "((strOccupation Like '' OR strOccupation Like 'Student') AND timestampdiff(YEAR,dtBirthdate,NOW())>17 ) ">Unemployed</option>
			<option  value = "!(strOccupation Like ''|| strOccupation Like 'Student')">Employed</option></select>
			
			<select id = 'Cstatus'>
			<option>Civil Status</option>
			<option value = "strCivilStatus Like 'Single'">Single</option>
			<option  value = "strCivilStatus Like 'Married'">Married</option>
				<option  value = "strCivilStatus Like 'Widow'">Widowed/Widower</option>
					<option  value = "strCivilStatus Like 'Livein'">Live in</option></select>
					
					<select id = 'Vote'>
			<option>Resident Type</option>
			<option value = "!(strVotersId Like '') ">Voter</option>
			<option  value = "strVotersId Like ''">Non-Voter</option></select>
			&nbsp;<button type = button onclick = "showdis()" class = 'btn btn-xs btn-round btn-info'><i  class="glyphicon glyphicon-search"></i></button>
		</div>
		  </div>
		  <br><br><br><br><br><br>
		  <div class = "showback">
		  <table  class="table table-striped table-bordered table-hover" border = '2' style = 'width:95%'
		  id = 'tblview'>
		  <thead>
		  <th> Resident's Name</th>
		  <th> Address</th>
		  <th> Gender</th>
		  <th> Age </th>
		  <th> Occupation </th>
		  <th> Civil Status</th>
		  </thead>
		  <tbody>
		  <?php
		  require('connection.php');
		  $Gender = "";
		  $query = "Select concat(strLastName,' ',strNameExtension,', ',strFirstName,' ',strMiddleName) as Name, concat(strBuildingNo,', ',strStreetName,' ',strPurok )as Address, strOccupation,charGender, timestampdiff(YEAR,dtBirthdate,NOW()) as Age, strCivilStatus from tblhousemember as a inner join 
		  tblhousehold as b on a.intForeignHouseholdNo = b.intHouseholdNo inner join tblstreet as c on b.intForeignStreetId = c.intStreetId order by address";
		  $sql = mysqli_query($con,$query);
		  while($row = mysqli_fetch_object($sql)){
			 if($row->charGender == 'M'){
				 $Gender = 'Male';
			 }
			else{ $Gender = 'Female';}			 ?>
		  <tr> <td> <?php echo $row->Name; ?></td>
		  <td> <?php echo $row->Address; ?></td>
		  <td><?php echo $Gender; ?></td>
		  <td> <?php echo $row->Age; ?> </td>
		  <td> <?php echo $row->strOccupation ?></td>
		  <td> <?php echo $row->strCivilStatus; ?></td><tr>
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
	var flag = 0;
	var counter = 0;
	var query= "";
	var Age = 0;
	var Employment = 0;
	var Cstatus = 0;
	
	
	if(document.getElementById('Gender').value != 'Gender'){
		counter +=1;
	}
	if(document.getElementById('Age').value != 'Age'){
		counter+=1;
	}
	if(document.getElementById('Employment').value != 'Employment'){
		counter +=1;
	}
	if(document.getElementById('Cstatus').value != 'Civil Status'){
		counter+=1;
	}
	if(document.getElementById('Vote').value != 'Resident Type'){
		counter+=1;
	}
	
	for(flag = 0;flag<counter;flag++){
		if(flag == 0){
			if(document.getElementById('Gender').value != 'Gender'){
				query = document.getElementById('Gender').value;
			}
			else{
				if(document.getElementById('Age').value != 'Age'){
					query = document.getElementById('Age').value ;
					Age = 1;
				}
				else{
					if(document.getElementById('Employment').value != 'Employment'){
						query = document.getElementById('Employment').value;
							Employment = 1;
					}
					else{
						if(document.getElementById('Cstatus').value != 'Civil Status'){
							query = document.getElementById('Cstatus').value;
							Cstatus = 1;
						}
						else{
							if(document.getElementById('Vote').value != 'Resident Type'){
							query = document.getElementById('Vote').value;
							break;
						}
						}
					}
				}
			}
		}
		else if(flag == 1){
			if(document.getElementById('Age').value != 'Age' && Age !=1){
					query = query.concat(' AND ',document.getElementById('Age').value);}
			else{
				if(document.getElementById('Employment').value != 'Employment' && Employment!=1){
					query = query.concat(' AND ',document.getElementById('Employment').value);
					Employment = 1;
				}
				else{
					if(document.getElementById('Cstatus').value != 'Civil Status' && Cstatus!=1){
						query = query.concat(' AND ',document.getElementById('Cstatus').value);
						Cstatus = 1;
					}
					else{
						if(document.getElementById('Vote').value != 'Resident Type'){
							query = query.concat(' AND ',document.getElementById('Vote').value);
							break;
						}
					}
				}
			}
		}
		else if(flag == 2){
			
					if(document.getElementById('Employment').value != 'Employment' && Employment != 1){
						query = query.concat(' AND ',document.getElementById('Employment').value);
					}
					else{
						if(document.getElementById('Cstatus').value != 'Civil Status' && Cstatus != 1){
						query = query.concat(' AND ',document.getElementById('Cstatus').value);	
						Cstatus = 1;
						}
						else{
							if(document.getElementById('Vote').value != 'Resident Type'){query = query.concat(' AND ',document.getElementById('Vote').value);
							break;}
						}
					}
				
		}
		else if(flag == 3){
			
					
						if(document.getElementById('Cstatus').value != 'Civil Status' && Cstatus!= 1){
							query = query.concat(' AND ',document.getElementById('Cstatus').value);
							}
							else{
							if(document.getElementById('Vote').value != 'Resident Type'){
							query = query.concat(' AND ',document.getElementById('Vote').value);
							break;
									}
							}
				
		}
		else if(flag == 4){
			
					
						if(document.getElementById('Vote').value != 'Resident Type'){
							query = query.concat(' AND ',document.getElementById('Vote').value);
							break;
									}
				
		}
	}
	
	
	
	
	

	
	
		
	$.ajax({
		type: "POST",
		url: "QueryHouse.php",
		data: 'sid=' + query,
		success: function(data){//alert(query);
		//alert(data);
		$("#tblview").html(data);
		}
		
});
	}
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
