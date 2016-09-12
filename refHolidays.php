<?php

if($_SESSION['on']==null){

	$holidays[] = array();
	$holidays = ['25.12.2016', '26.12.2016'];
	
	$arrDisabledDates = $holidays;
	$_SESSION['arrDisabledDates'] = $arrDisabledDates;
	$_SESSION['arrTemp'] = [''];
	//unset($arrDisabledDates);
	//unset($holidays);
}
	$_SESSION['on']=1;
?>
