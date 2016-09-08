
<!-- ?php 
$currentId = $_REQUEST['id'];
//  Your query code would be here using the $currentId to just retrieve the desired record
$SQLstring = "SELECT strDocTemplate FROM tbldocument WHERE intDocCode = $currentId";
$QueryResult = mysql_query($SQLstring);
$img = mysql_fetch_array($QueryResult);
$content = $img['strDocTemplate'];
header('Content-type: image/jpg');
echo $content;
?-->
<?php 
//send out image header
header('Content-type: image/jpg');

//get the id from the url
$id = isset($_GET['id'])?(int)$_GET['id']:0;

if($id > 0){
    //query database for image blob
    $sql = "SELECT `imageData` FROM `table` WHERE `id`=";
		"SELECT strDocTemplate FROM tbldocument WHERE intDocCode = {$id}";

    if($numRows){
        //echo out the blob data
        echo $Row[strDocTemplate];
    } else {
        //no row found in database, echo default image
        readfile("Images/TemplateUpload/");
    }
} else {
    //invalid id passed, echo default image
    readfile("/path/to/noImage.jpg");
}
?>