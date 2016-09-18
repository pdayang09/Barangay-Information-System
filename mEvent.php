<?php
	$arrTemp[] = array();
	$arrSave[] = array();
	$arrTemp = [''];
    $arrSave = [''];

	$resfrom = $_POST['from'];
	$resto = $_POST['to'];
	$repeat = $_POST['repeat'];
	$limit = $_POST['limit'];
	$nEvery = $_POST['val'];

	$datetemp = $resfrom;

	$datetemp = str_replace('/','-', $datetemp);
    $datetemp = str_replace('/','.', $datetemp);

    if($nEvery =="weeks"){ // There are 52 weeks in a year
        $count = 52;
    }else if($nEvery =="months"){ // There are 12 months in a year
       $count = 12;
    }else if($nEvery =="years"){ // Setting date for the next 6 years only
        $count = 6;
    }

    $count = $limit;

    	array_push($arrTemp, $datetemp);
    $intCtr =1;
    while($intCtr<=$count){

        $datetemp = date('Y-m-d h:i:s', strtotime($datetemp."+$repeat $nEvery"));
        array_push($arrTemp, $datetemp);

            $intCtr++; 
    }
        echo'<div>
                <p><font face="cambria" size=3 color="grey"> You Selected </font></p>
             </div>';
        
        foreach($arrTemp as $a) {

            $datetemp = str_replace('.','-', $a);
            $datetemp = date('Y-m-d h:i:s', strtotime($datetemp));

             if(!empty($a)){

             	require("connection.php");
             	mysqli_query($con, "INSERT INTO `tblreserveequip`(`strReservationID`, `strREEquipCode`, `dtmREFrom`, `dtmRETo`, `intREQuantity`) VALUES ('res-1', 'Tennis Racket','$datetemp','$datetemp','2')");
                 array_push($arrSave, $datetemp);
             }
                    
         }

     if($val==4){
     	$arrSave = [''];
     	$arrTemp = [''];
     }

?>