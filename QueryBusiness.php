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
			 
		  <legend ><font face = "cambria" size = 8 color = "grey">Business Lists </font></legend>
			</div>
		  <div class="col-sm-3 col-md-6 col-lg-6">
		  <br>
		    <div class = 'showback'>
			<font size =  2><strong> Filter By:</strong></font>
			<br>
			<select id = "Category" >
			<option>Business Category</option>
			<?php 
			require('connection.php');
			$query = "SELECT Distinct strBusCateName FROM `tblbusinesscate` ";
			$sql = mysqli_query($con,$query);
			while($row = mysqli_fetch_object($sql)){?>
			<option value = "<?php echo "strBusCateName =  '". $row->strBusCateName."'"; ?>" ><?php echo $row->strBusCateName; ?></option><?php } ?></select>
			
			
			<select id = 'Status'>
			<option>Status</option>
			<?php 
			require('connection.php');
			$query = "SELECT DISTINCT strBSbusinessStat FROM `tblbusinessstat` ";
			$sql = mysqli_query($con,$query);
			while($row = mysqli_fetch_object($sql)){?>
			<option value = "<?php echo "strBSbusinessStat = '". $row->strBSbusinessStat."'"; ?>"><?php echo $row->strBSbusinessStat; ?></option><?php } ?></select>
			
		
			&nbsp;<button type = button onclick = "showdis()" class = 'btn btn-xs btn-round btn-info'><i  class="glyphicon glyphicon-search"></i></button>
		</div>
		  </div>
		  <br><br><br><br><br><br><br>
		  <div class = "showback">
		  <table  class="table table-striped table-bordered table-hover" border = '2' style = 'width:95%'
		  id = 'tblview'>
		  <thead>
		  <th> No.</th>
		  <th> Business Contact Person</th>
		  <th> Business Name</th>
		  <th> Category</th>
		  <th> Contact Number</th>
		  <th> Status </th>
		  </thead>
		  <tbody>
		  <?php
		  $ctr = 0;
		  require('connection.php');
		  $Gender = "";
		  $query = "Select concat(strLastName,' ',strNameExtension,', ',strFirstName,' ',strMiddleName) as 'Name', strContactNum,strBusinessName,strBSbusinessStat,strBusCateName from tblbusiness as a inner join tblbusinessstat as b on a.strBusinessID = b.strBusinessID inner join tblbusinesscate as c on a.strBusinessCateID = c.strBusCatergory inner join tblhousemember as d on b.strBusOwnerID = d.intMemberNo order by Name ";
		  $sql = mysqli_query($con,$query);
		  while($row = mysqli_fetch_object($sql)){
			  ++$ctr;?>
			   <tr> <td> <?php echo $ctr;?></td>
		   <td> <?php echo $row->Name;?></td>
		  <td> <?php echo $row->strBusinessName; ?></td>
		  <td> <?php echo $row->strBusCateName; ?> </td>
		  <td> <?php echo $row->strContactNum; ?> </td>
		  <td> <?php echo $row->strBSbusinessStat ?></td><tr>
		  <?php } 
		  
		  $query = "Select concat(strApplicantLName,' ',strNameExtension,', ',strApplicantFName,' ',strApplicantMName) as 'Name', strContactNum,strBusinessName,strBSbusinessStat,strBusCateName from tblbusiness as a inner join tblbusinessstat as b on a.strBusinessID = b.strBusinessID inner join tblbusinesscate as c on a.strBusinessCateID = c.strBusCatergory inner join tblapplicant as d on b.strBusOwnerID = d.strApplicantID order by Name ";
		  $sql = mysqli_query($con,$query);
		  while($row = mysqli_fetch_object($sql)){ ++$ctr;?>
			   <tr> <td> <?php echo $ctr;?></td>
		  <td> <?php echo $row->Name;?></td>
		  <td> <?php echo $row->strBusinessName; ?></td>
		  <td> <?php echo $row->strBusCateName; ?> </td>
		  <td> <?php echo $row->strContactNum; ?> </td>
		  <td> <?php echo $row->strBSbusinessStat ?></td><tr>
		  <?php } 
		  
		  ?>
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
	
	if(document.getElementById('Category').value != "Business Category"){
		counter += 1;
	}
	
	if(document.getElementById('Status').value != "Status"){
		counter += 1;
	}
	
	for(flag =0;flag<counter;flag++){
		if(flag == 0){
			if(document.getElementById('Category').value != "Business Category"){
				query = document.getElementById('Category').value;
			}
			else{
				if(document.getElementById('Status').value != "Status"){
					query = document.getElementById('Status').value;
				break;}
			}
		}
		else{
			if(document.getElementById('Status').value != "Status"){
					query = query.concat(' AND ',document.getElementById('Status').value);
				break;}
		}
	}
	
	
	
	
	
//alert(query);
	
	
		
	$.ajax({
		type: "POST",
		url: "QueryBus.php",
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
