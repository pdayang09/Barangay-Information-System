<!DOCTYPE html>
<?php   
   include('connection.php');
   $id =  $_POST['sid'];
   $query = "SELECT * FROM `tblbusinesssignage` where ID = '$id'";
   $sql = mysqli_query($con,$query);
   $row = mysqli_fetch_object($sql);
   
   
   ?>
   
   
  
		<div class = 'showback'>	
	<br>
	<p><font face = "cambria" size = 5 color = "grey"> Signage Type </font></p>   
		<center>
			<input id ="strTodaName" name = "SignageMain"  class="form-control input-group-lg reg_name" type="text" value='<?php echo $row->strSignageType ?>' disabled >	
		</center>
	<p><font face = "cambria" size = 5 color = "grey"> Price</font></p>   
		<center>	
			<input id="Price"  name="Price" class="form-control input-group-lg reg_name" type= number step = any title="Enter Document name" value ='<?php echo $row->strSignagePrice?>' min = 0 required>
		</center>
		<br>
	<center>
	<br>
		<button type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd" = value = '<?php echo $row->ID?>' > Save </button>
		
	
		<!-- input type="submit" class="btn btn-outline btn-success" name = "btnAdd" id = "btnAdd"  value = "Save" --> 
		<br><br>
	</center>
		</div>
	
