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
		$appId = "";
		$fname = "";
		$mname = "";
		$lname = "";
		$nameext = "";
		$contactno = "";
		$street = "";
		$brgy = "";
		$city = "";
	?>

    <div id="wrapper">
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
					<FORM method="POST">
					<legend ><font face = "cambria" size = 8 color = "grey">Register Applicant</font></legend>
														
				<div class = "form-group">
					<div class="col-md-6">
						<div class="showback">						
							<p><font face="cambria" size=5 color="grey"> Applicant ID</font></p>			
							<input id="appId" class="form-control input-group-lg reg_name" type="text" name="appId"  value=" <?php echo"$appId"?>">
						
							<p><font face="cambria" size=5 color="grey"> Firstname</font></p>			
							<input id="fname" class="form-control input-group-lg reg_name" type="text" name="fname"  value=" <?php echo"$fname"?>">
							
							<p><font face="cambria" size=5 color="grey"> Lastname</font></p>			
							<input id="lname" class="form-control input-group-lg reg_name" type="text" name="lname"  value=" <?php echo"$lname"?>">
							
							<p><font face="cambria" size=5 color="grey"> Middlename</font></p>			
							<input id="mname" class="form-control input-group-lg reg_name" type="text" name="mname"  value=" <?php echo"$mname"?>">
						
							<p><font face="cambria" size=5 color="grey"> Name Extension</font></p>			
							<input id="nameext" class="form-control input-group-lg reg_name" type="text" name="nameext"  value=" <?php echo"$nameext"?>">
							
							<p><font face="cambria" size=5 color="grey"> Contact Number</font></p>			
							<input id="contactno" class="form-control input-group-lg reg_name" type="text" name="contactno"  value=" <?php echo"$contactno"?>" maxlength=11>
						</div>
					</div>
				</div>
				
				<div class = "form-group">
					<div class="col-md-6">
						<div class="showback">						
						<p><font face="cambria" size=5 color="grey"> Address</font></p>
						
							<p><font face="cambria" size=5 color="grey"> Street</font></p>			
							<input id="street" class="form-control input-group-lg reg_name" type="text" name="street"  value=" <?php echo"$street"?>">
							
							<p><font face="cambria" size=5 color="grey"> Barangay</font></p>			
							<input id="brgy" class="form-control input-group-lg reg_name" type="text" name="brgy"  value=" <?php echo"$brgy"?>">
							
							<p><font face="cambria" size=5 color="grey"> City</font></p>			
							<input id="city" class="form-control input-group-lg reg_name" type="text" name="city"  value=" <?php echo"$city"?>"><br><br>
							
							<center>
								<input type="submit" class="btn btn-outline btn-success" name="btnSubmit" value="Submit"/>
								<input type="submit" class="btn btn-outline btn-success" name="btnCancel" value="Cancel"/>
							</center>
							
						</div>
					</div>
				</div><br>
				
				</form>  

				<?php
					if(isset($_POST['btnSubmit'])){
						
					$appId = $_POST['appId'];
					$fname = $_POST['fname'];
					$mname = $_POST['mname'];
					$lname = $_POST['lname'];
					$nameext = $_POST['nameext'];
					$contactno = $_POST['contactno'];
					$street = $_POST['street'];
					$brgy = $_POST['brgy'];
					$city = $_POST['city'];
					
					require("connection.php");
					
						mysqli_query($con, "INSERT INTO `tblapplicant`(`strApplicantID`, `strResidentID`, `strApplicantFName`, `strApplicantMName`, `strApplicantLName`, `strNameExtension`, `strApplicantAddress_street`, `strApplicantAddress_brgy`, `strApplicantAddress_city`, `strApplicantContactNo`) VALUES ('$appId', '', '$fname', '$mname', '$lname', '$nameext', '$street', '$brgy', '$city', '$contactno' );");
						
						echo"<script> alert('You have successfully registered an applicant');</script>";
					}
				
				
				?>
				
                    </div><!-- /#col-lg-12 -->
                </div><!-- /#row -->
            </div><!-- /#container-fluid -->
        </div><!-- /#page-content-wrapper -->
    </div><!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
	
<script src="./jquery.js"></script>
<script src="build/jquery.datetimepicker.full.js"></script>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1986/01/05'
});
$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});

$('.some_class').datetimepicker({	
	formatTime:'H:i',
	formatDate:'d.m.Y'
});

$('#default_datetimepicker').datetimepicker({
	formatTime:'H:i',
	formatDate:'d.m.Y',
	//defaultDate:'8.12.1986', // it's my birthday
	defaultDate:'+03.01.1970', // it's my birthday
	defaultTime:'10:00',
	timepickerScrollbar:false
});

$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});

$('#datetimepicker1').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});
$('#datetimepicker2').datetimepicker({
	//yearOffset:222,
	lang:'ch',
	datepicker:true,
	format:'d/m/Y',
	formatDate:'Y/m/d',
	minDate:'-1969/12/26', // yesterday is minimum date
	maxDate:'+1970/12/01' // and tommorow is maximum date calendar
	
});
$('#datetimepicker3').datetimepicker({
	inline:true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
	$('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
	$('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
	$('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
	datepicker:true,
	allowTimes:['4:30','5:00','5:30','6:00','6:30','7:00','7:30','8:00','8:30','9:00','9:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00'],
	step:5
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
	if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
		$('#datetimepicker6').datetimepicker('destroy');
		this.value = 'create';
	}else{
		$('#datetimepicker6').datetimepicker();
		this.value = 'destroy';
	}
});
var logic = function( currentDateTime ){
	if (currentDateTime && currentDateTime.getDay() == 6){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};
$('#datetimepicker7').datetimepicker({
	onChangeDateTime:logic,
	onShow:logic
});
$('#datetimepicker8').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date')
			.toggleClass('xdsoft_disabled');
	},
	minDate:'-1970/01/2',
	maxDate:'+1970/01/2',
	timepicker:false
});
$('#datetimepicker9').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date.xdsoft_weekend')
			.addClass('xdsoft_disabled');
	},
	weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
	timepicker:false
});
var dateToDisable = new Date();
	dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [false, ""]
		}

		return [true, ""];
	}
});
$('#datetimepicker12').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [true, "custom-date-style"];
		}

		return [true, ""];
	}
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})


</script>
		
		
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
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