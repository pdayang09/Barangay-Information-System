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
     if($resFacility!=""){

      require("connection.php");
      $query = mysqli_query($con, "select `strFaciName`,`dblFaciDayCharge`, `dblFaciNightCharge`, `dblFaciNResidentCharge` from tblFacility where `strFaciNo` = '$resFacility'");

      if(mysqli_num_rows($query) > 0){
        $i = 1;

        while($row = mysqli_fetch_array($query)){
        $_SESSION['resfacno'] = $resFacility;
        $_SESSION['resFacility'] = $resFacility;
        $_SESSION['resFacName'] = $row[0];
        $_SESSION['resfee'] = $row[1];
        $_SESSION['dayresfee'] = $row[1];
        $_SESSION['nightresfee'] = $row[2];
        $_SESSION['NResidentCharge'] = $row[3];
                       
       }
      }

        $_SESSION['resFacilityFlag'] = 1;
      }else if($resFacility==""){
        $_SESSION['resfacno'] = "";
        $_SESSION['resFacility'] = "";
        $_SESSION['resFacName'] = "";
        $_SESSION['resfee'] = "";
        $_SESSION['dayresfee'] = "";
        $_SESSION['nightresfee'] = "";
        $_SESSION['NResidentCharge'] = "";

        $_SESSION['resFacilityFlag'] = 0;
      }    

     //Equipment 
     if(!empty($_POST['equipment'])){

        $equipment = $_POST['equipment'];   
     if(!empty($_POST['quantity'])){
        $quantity = $_POST['quantity'];                                 
                                         
        $_SESSION['equipment'] = $equipment;
        $_SESSION['quantity'] = $quantity;
     }else{
        
        $_SESSION['equipment'] = "";
        $_SESSION['quantity'] = "";
     }

     }else{
      
        $_SESSION['equipment'] = "";
        $_SESSION['quantity'] = "";
     }
  
    //Other
    $_SESSION['resFrom'] = $resfrom;
    $_SESSION['resTo'] = $resto;

?>