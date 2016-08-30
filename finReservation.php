<?php
session_start();

	$resfrom = $_POST["fid"];
	$resto = $_POST["tid"];
	$resFacility = $_POST["rid"];

	$resId = $_POST["did"];
	$resPurpose = $_POST["resPurpose"];
	$num = $_POST["num"];

	//Personal Details
	$_SESSION['resId'] = $resId;
	$_SESSION['resPurpose'] = $resPurpose;
	$_SESSION['num'] = $num;
	
	//Facility 
     if(!empty($resFacility)){
        require("connection.php");
        $query = mysqli_query($con, "select `strFaciName`,`dblFaciDayCharge`, `dblFaciNightCharge`, `dblFaciNResidentCharge` from tblFacility where `strFaciNo` = '$resFacility'");
                        
     while($row = mysqli_fetch_row($query)){
     	$_SESSION['resfacno'] = $resFacility;
     	$_SESSION['resFacility'] = $resFacility;
        $_SESSION['resFacName'] = $row[0];
        $_SESSION['resfee'] = $row[1];
        $_SESSION['dayresfee'] = $row[1];
        $_SESSION['nightresfee'] = $row[2];
     	$_SESSION['NResidentCharge'] = $row[3];

                       
       }
                                  
      }else{
        $_SESSION['resfacno'] = "";
        $_SESSION['resFacName'] = "";
        $_SESSION['resfee'] = "";
        $_SESSION['dayresfee'] = "";
        $_SESSION['nightresfee'] = "";
     	$_SESSION['NResidentCharge'] = "";
      }    

     //Equipment 
     if(!empty($_POST['equipment'])){
        $equipment = $_POST['equipment'];   
     if(isset($_POST['quantity'])){
        $quantity = $_POST['quantity'];                                 
                                         
     	$_SESSION['equipment'] = $equipment;
     	$_SESSION['quantity'] = $quantity;
     }else{
     	$_SESSION['equipment'] = "";
    	$_SESSION['quantity'] = "";
     }
     } 
  
  	//Other
    $_SESSION['resFrom'] = $resfrom;
    $_SESSION['resTo'] = $resto;

?>