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
		
		<!-- Retrieve Personal Data -->
	<?php 
	
		//Personal Details
		$resId = $_SESSION['resId'];
		$clientID = $_SESSION['clientID'];
		$OR = $_SESSION['OR'];
		$payment = $_SESSION['payment'];
		$balance = $_SESSION['balance'];
		$balanceTemp = $balance;
				
		//Gets Today's Date
		$today = date("Y-m-d"); // displays date today
		
		//Payment
		$total = $balance;
		$amountR =0;
		$balance = $balance;
		$change =0;
		$payOR = $OR;

	?>
	
    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <legend ><font face = "cambria" size = 8 color = "grey"> Payment Summary </font></legend>
					   	
					<div class = "bodybody">	

						<div class = "col-sm-7">	
							<div class="form-group">
								<div class = "showback">												
									<font face = "cambria" size = 5 color = "grey"> Date :<font face = "cambria" size = 4 color = "grey"> <?php echo" $today"; ?></font><br><br>

									<font face = "cambria" size = 5 color = "grey"> Payment Details <br><br>								
									<div class="panel panel-default"><!-- Default panel contents -->
										<table class="table"'><!-- Table -->
											<thead>
												<tr><th> Reservation ID </th>
													<th> Payment </th>
													<th> Balance (Hours) </th>
												</tr>
												</thead>
											<tbody>
												<tr><td> <?php echo"$resId"; ?> </td>
													<td> <?php echo"$payment"; ?> </td>
													<td> <?php echo"$balance"; ?></td>
												</tr>
											</tbody>
										</table>			
									</div>												
								</div>						
							</div>
						</div>

						<div class = "col-sm-4">	
							<div class="form-group">
								<div class = "showback">												
									<font face = "cambria" size = 5 color = "grey"> OR No
									<input id="payOR" name="payOR" class="form-control input-group-lg reg_name" type="text"  value="<?php if(isset($_POST['payOR'])){echo $_POST['payOR'];}else{echo $payOR;}?>" title="generated brgyId" required></font>

								
									<font face = "cambria" size = 5 color = "grey"> Mode of Payment </font>
									<select id="mode" onchange="showBal(this.value)" class = "form-control">
										<option value="1" selected="selected"> Full </option>
										<option value="2"> Partial </option>
									</select>

								<div id="showBalance">
									<font face = "cambria" size = 5 color = "grey"> Balance</font>
									<center>		
									<font id="balance" face = "cambria" size = 7 color = "grey" > <?php echo $balance;?> </font></center><br>

									<font face = "cambria" size = 5 color = "grey"> Amount Render </font>
									<input name="render" class="form-control put-group-lg reg_name" type="number"  title="generated brgyId" value="0" min="0">	

									<font face = "cambria" size = 5 color = "grey"> Change </font>
									<input name="change" class="form-control put-group-lg reg_name" type="number"  title="generated brgyId" value="0" disabled>			
								</div>

									<center>
									<font face = "cambria" size = 5 color = "grey" > ......................................
									
									<button id="sRequest" type="submit" class="btn btn-outline btn-success" name = "btnPay" onclick="showBal()" value = '<?php echo $resId;?>'> Render Payment </button></center></font>

									</div><br><br><br><br>							
							</div>
						</div>		

						<div class = "col-sm-7">	
							<div class="form-group">
								<div class = "showback">												
																
								</div>						
							</div>
						</div>		
						
				</div>
										
									
						</div><br> <!-- /#bodybody -->
					</div> <!-- /#col-lg-12 -->
										
				</div>	<!-- /#row -->
			</div> <!-- /#container-fluid -->
			
		</div><br><br> <!-- /#page-content-wrapper -->
    </div> <!-- /#wrapper -->
				
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<script>	 
function showBal(){
	var mode = document.getElementById('mode').value;
	var payOR = document.getElementById('payOR').value;
	var bal = $("font")[13].innerHTML;
	var change = document.getElementsByName('change')[0].value;
	var render = document.getElementsByName('render')[0].value;
	var pay = document.getElementsByName('btnPay')[0].value;
	var balanceTemp = <?php echo json_encode($balanceTemp)?>

	$.ajax({
		type: "POST",
		url: "showBal.php",
		data: 'mode=' + mode +'&payOR='+payOR+'&bal='+bal+'&change='+change+'&render='+render+'&pay='+pay+'&bt='+balanceTemp,
		success: function(data){
			//alert(data);
			$("#showBalance").html(data);
		}		
	});
}
      $(function(){
          $('select.styled').customSelect();
      });

      $("input[type=submit]").attr("disabled", "disabled");

  </script>

<?php require("footer.php");?>