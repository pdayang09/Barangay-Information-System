
<?php
require('fpdf.php');
require('connection.php');
$result=mysqli_query($con,"SELECT distinct charGender ,Count(charGender) as 'number' from tblhousemember group by charGender order by charGender desc");
$result2=mysqli_query($con,"SELECT YEAR(NOW())  as 'date'  ");
$norows = mysqli_num_rows($result);

$column_code = "";
$column_name = "";

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
$pdf->SetY(60);
$pdf->SetX(30);	
$pdf->Cell( 158, 12,'Population of Barangay by Gender' , 0, 0, 'C');
$pdf->SetY(70);
$pdf->SetX(30);	
$pdf->SetFont('Arial','',16);	
$pdf->Cell( 158, 12,'As of '.$row2->date, 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',12);		
$pdf->SetY($Y_Fields_Name_position);


 $pdf->SetFillColor(230,230,230);
$pdf->SetX(30);
		$pdf->Cell(80,12,'Gender',1,0,'C',1);
		$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(110);
		$pdf->Cell(80,12,'Number per Gender',1,0,'C',1);


	
	$pdf->SetFont('Arial','',12);	
	
	$pdf->Ln();
	$total = 0;
	while ($row = mysqli_fetch_object($result)){
		if($row->charGender == 'M'){ $a = "Male";}
		else{$a = "Female";}
		
		$pdf->SetX(30);
		$pdf->Cell(80,12,$a,1);
				$pdf->SetX(110);
		$pdf->Cell(80,12,$row->number,1);
		$total += $row->number;
		$pdf->Ln();
		}
$pdf->Ln();
$pdf->SetY(125);
$pdf->SetX(90);
		$pdf->Cell(80,12,'Total Population: '.$total,0,0,'C');
$pdf->Ln();
$pdf->SetY(150);
$pdf->SetX(100);
		$pdf->Cell(80,12,'Prepared by:',0,0,'C');


$new = mysqli_query($con,"Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'name',strSign from tblaccount as a inner join tblhousemember as b on a.intForeignMemberNo = b.intMemberNo where strOfficerId = 9");
$row = mysqli_fetch_object($new);

$pdf->Ln();
$pdf->SetY(160);
$pdf->SetX(120);
$sign = "../".$row->strSign;
		$pdf->Cell(80,12,$pdf->Image($sign, $pdf->GetX(),$pdf->GetY(), 50),0,0,'C');
		$pdf->Ln();
$pdf->SetY(180);
$pdf->SetX(103);
		$pdf->Cell(80,12,$row->name,0,0,'C');


$pdf->Output();
?>