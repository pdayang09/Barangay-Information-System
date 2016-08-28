<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
  <?php session_start();?> <?php require('header.php');?>
<body>
    <?php require('sidebar.php');?> 
    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
     <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <br>
            <br>
            <div class="col-sm-9 col-md-6 col-lg-6">
                <legend><font color="grey" face="cambria" size="8">Reservations
                Lists</font></legend>
            </div>
            <div class="col-sm-3 col-md-6 col-lg-6">
                <br>
                <div class='showback'>
                    <font size="2"><strong>Filter By:</strong></font><br>
                    <select id="Type">
                        <option>
                            Type
                        </option>
                        <option value="intMemberNo = strRSapplicantId">
                            Resident
                        </option>
                        <option value="strApplicantID = strRSapplicantId">
                            Non- Resident
                        </option>
                    </select> <select id="Year">
                        <option>
                     Year Reserved
                        </option><?php
                                    require('connection.php');
                                    $query = "SELECT Distinct Extract(Year from datRSReserved) as Yr FROM `tblreservationrequest`";
                                    $sql = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_object($sql)){?>
                        <option value=
                        "<?php echo 'Extract(Year from datRSReserved) = '.$row->Yr;?>">
                        <?php echo $row->Yr; ?>
                        </option><?php } ?>
                    </select> <select id="Month">
                        <option>
                            Month
                        </option>
                        <option value="Extract(Month from datRSReserved) = 1">
                            January
                        </option>
                        <option value="Extract(Month from datRSReserved) = 2">
                            February
                        </option>
                        <option value="Extract(Month from datRSReserved) = 3">
                            March
                        </option>
                        <option value="Extract(Month from datRSReserved) = 4">
                            April
                        </option>
                        <option value="Extract(Month from datRSReserved) = 5">
                            May
                        </option>
                        <option value="Extract(Month from datRSReserved) = 6">
                            June
                        </option>
                        <option value="Extract(Month from datRSReserved) = 7">
                            July
                        </option>
                        <option value="Extract(Month from datRSReserved) = 8">
                            August
                        </option>
                        <option value="Extract(Month from datRSReserved) = 9">
                            September
                        </option>
                        <option value="Extract(Month from datRSReserved) = 10">
                            October
                        </option>
                        <option value="Extract(Month from datRSReserved) = 11">
                            Novemeber
                        </option>
                        <option value="Extract(Month from datRSReserved) = 12">
                            December
                        </option>
                    </select> &nbsp;<button class=
                    'btn btn-xs btn-round btn-info' onclick="showdis()" type=
                    "button"><i class=
                    "glyphicon glyphicon-search"></i></button>
                </div>
            </div><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="showback">
                <table border='2' class=
                "table table-striped table-bordered table-hover" id='tblview'
                style='width:95%'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Full Name</th>
                            <th>Contact Number</th>
                            <th>Type</th>
                            <th>Reservation Date</th>
                            <th>Purpose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                  require('connection.php');
                                  $count = 0;
                                  $query = "SELECT concat(strLastName,' ',strNameExtension,', ',strFirstName,' ',strMiddleName) as Name
                                  , strContactNo,datRSReserved,strRSPurpose FROM `tblreservationrequest` as a inner join tblhousemember as b on a.strRSapplicantId = b.intMemberNo
                                  order by datRSReserved ";
                                  $sql = mysqli_query($con,$query);
                                  while($row = mysqli_fetch_object($sql)){
                                    ++$count ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row->Name; ?></td>
                            <td><?php echo $row->strContactNo; ?></td>
                            <td>Resident</td>
                            <td><?php echo $row->datRSReserved; ?></td>
                            <td><?php echo $row->strRSPurpose ?></td>
                        </tr>
                        <tr>
                            <?php } 
                                      $query = "SELECT concat(strApplicantLName,' ',strNameExtension,', ',strApplicantFName,' ',strApplicantMName) as Name, strApplicantContactNo,datRSReserved,
                                      strRSPurpose FROM `tblreservationrequest` as a inner join tblapplicant as b on a.strRSapplicantId = b.strApplicantID
                                      order by datRSReserved ";
                                      $sql = mysqli_query($con,$query);
                                      while($row = mysqli_fetch_object($sql)){
                                        ++$count ?>
                        </tr>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row->Name; ?></td>
                            <td><?php echo $row->strApplicantContactNo; ?></td>
                            <td>Non-Resident</td>
                            <td><?php echo $row->datRSReserved; ?></td>
                            <td><?php echo $row->strRSPurpose ?></td>
                        </tr>
                        <tr>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </section><!-- /MAIN CONTENT -->
    <!--main content end-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js">
    </script> 
    <script src="assets/js/bootstrap.min.js">
    </script> 
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js">
    </script> 
    <script src="assets/js/jquery.ui.touch-punch.min.js">
    </script> 
    <script class="include" src="assets/js/jquery.dcjqaccordion.2.7.js" type=
    "text/javascript">
    </script> 
    <script src="assets/js/jquery.scrollTo.min.js">
    </script> 
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript">
    </script> <!--common script for all pages-->
     
    <script src="assets/js/common-scripts.js">
    </script> <!--script for this page-->
     
    <script>
      //custom select box
    function showdis(){
    var query = "";
    var ctr = 0;
    var flag = 0;
    var type = 0
    if(document.getElementById('Month').value!= 'Month' && document.getElementById('Year').value == 'Year Reserved'){
        alert('Please Select a Year');
        
    }

    else{
    if(document.getElementById('Type').value != 'Type'){
        ctr+=1;
        if(document.getElementById('Type').value != 'intMemberNo = strRSapplicantId'){
            type = 1;
        }
        else{type = 2;}    }
        
    if(document.getElementById('Year').value !='Year Reserved'){
        ctr+=1;
    }



    for(flag = 0;flag<ctr;flag++){
        if(flag == 0){
                if(document.getElementById('Type').value != 'Type'){
                    query = document.getElementById('Type').value;
                }
				else{
					if(document.getElementById('Year').value != 'Year Reserved'){
                    query = document.getElementById('Year').value;
					
					          
            if(document.getElementById('Month').value !='Month'){
                        query = query.concat(' AND ',document.getElementById('Month').value);

                    }
                }
				}
               
        }
        else if(flag == 1){
            
            if(document.getElementById('Year').value !='Year Reserved'){
                        query = query.concat(' AND ',document.getElementById('Year').value);

                    }
                    
            if(document.getElementById('Month').value !='Month'){
                        query = query.concat(' AND ',document.getElementById('Month').value);

                    }
        }
    }
    //alert(query);
    // alert(type);


        
        $.ajax({
    type: "POST",
     url: "QueryReserved.php",
     data: 'sid=' + query +'&zid='+type,
     success: function(data){
         //alert(data);
          $("#tblview").html(data);
      }
        
    });
    }
    }
      $(function(){
          $('select.styled').customSelect();
      });

    </script>— Cory (This notice will only appear once)
</body>
</html>