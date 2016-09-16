
<?php
require('fpdf.php');
require('connection.php');
$result=mysqli_query($con,"Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name', timestampdiff(YEAR,dtBirthdate,NOW()) as 'Age', charGender,strLiterate,strEdAttain from tblhousemember where  (timestampdiff(YEAR,dtBirthdate,NOW())>5 AND timestampdiff(YEAR,dtBirthdate,NOW())<22) AND (strLiterate = 'Undergraduate' || strLiterate = 'No Educational Attainment') Order by strEdAttain ");
$result2=mysqli_query($con,"SELECT YEAR(NOW())  as 'date'  ");
$norows = mysqli_num_rows($result);

$row2 = mysqli_fetch_object($result2);



//Fields Name position
$Y_Fields_Name_position = 90;
//Table position, under Fields Name
$Y_Table_Position = 26;
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica','B',20);	
$pdf->SetY(8);
$pdf->SetX(30);	
$image1 = "2.png";
$pdf->Cell( 158, 12, $pdf->Image($image1, $pdf->GetX(),$pdf->GetY(), 150), 0, 0, 'C');
$pdf->Ln();
$pdf->SetY(50);
$pdf->SetX(30);	
$pdf->Cell( 158, 12,'Out of School Youth Report' , 0, 0, 'C');
$pdf->SetX(30);	
$pdf->Ln();
$pdf->Cell(20,12,"\n");

$pdf->SetFont('helvetica','B',10);	
$pdf->Cell(20,12,"\n");
$pdf->SetFillColor(230,230,230);
$pdf->SetX(30);
		$pdf->Cell(60,9,'Full Name',1,0,'C',1);
	
$pdf->SetX(90);
		$pdf->Cell(45,9,'Educational Attainment',1,0,'C',1);

$pdf->SetX(135);
		$pdf->Cell(25,9,'Age',1,0,'C',1);

$pdf->SetX(160);
		$pdf->Cell(25,9,'Gender',1,0,'C',1);

	$pdf->Ln();
	$total = 0;
	$pdf->SetFont('helvetica','',10);	
	while ($row = mysqli_fetch_object($result)){
		if($row->charGender == 'M'){ $a = "Male";}
		else{$a = "Female";}
		
		$pdf->SetX(30);
		$pdf->Cell(60,9,$row->Name,1,0,'C');
	
			$pdf->SetX(90);
		$pdf->Cell(45,9,$row->strEdAttain,1,0,'C');

$pdf->SetX(135);
		$pdf->Cell(25,9,$row->Age,1,0,'C');

$pdf->SetX(160);
		$pdf->Cell(25,9,$a,1,0,'C');
		
		$pdf->Ln();
		++$total;
		}
	$pdf->SetX(135);
	$pdf->SetFont('helvetica','B',10);	
		$pdf->Cell(50,9,"Total: ".$total,1,0,'C');
		$pdf->Ln();
		$pdf->Ln();
$pdf->SetX(115);
		$pdf->Cell(80,12,'Prepared by:',0,0,'C');


$new = mysqli_query($con,"Select Upper(concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension)) as 'name',strSign,strPositionName from tblaccount as a inner join tblhousemember as b on a.intForeignMemberNo = b.intMemberNo inner join tblbrgyposition as c on a.intForeignPositionId = c.intPositionId where strOfficerId = 1");
$row = mysqli_fetch_object($new);
$pdf->Cell(20,12,"\n");

$pdf->Ln();


$sign = "../".$row->strSign;
$pdf->SetX(130);
		$pdf->Cell(80,12,$pdf->Image($sign, $pdf->GetX(),$pdf->GetY(), 50),0,0,'C');
		$pdf->Ln();
		

$pdf->SetX(115);
		$pdf->Cell(80,12,$row->name,0,0,'C');
		$pdf->Ln();
		$pdf->SetX(115);
		$pdf->Cell(80,0,$row->strPositionName,0,0,'C');

$pdf->Output();
?>