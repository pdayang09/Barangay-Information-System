<!DOCTYPE html>
<html>
 <?php session_start();?>
	<head>
	<script type="text/javascript" src="wysiwyg/wysiwyg.js"></script>
		<style>
			@media print {
				body * {
					visibility: hidden;
				}
				#section-to-print, #section-to-print * {
					visibility: visible;
				}
				
			}
			body {
				background-color: rgb(82, 86, 89);
			}
			img {
				position: absolute;
				top: 150px;
				right: 50px;
				bottom: 100px;
				left: 350px;
				z-index: -1;
				width: 10in;
				height: 13in;
				outline-style: inset;
				outline-color: rgb(163, 163, 163);
			}			
			.positionText {
				position: absolute;
				top: 320px;
				left: 650px;
				right: 70px;
				height: 100px;
			}
			#documentBody {
				z-index: -1;
			}
		</style>
	</head>

	<body onload="iFrameOn();">
	
		<div id="wysiwyg_cp" style="padding:8px; width:1000px">
			<input type="button" onclick="iBold()" value="B">
			<input type="button" onclick="iItalic()" value="I">
			<input type="button" onclick="iUnderline()" value="U">
			<input type="button" onclick="iHighlight()" value="Highlight">
			<input type="button" onclick="iFontStyle()" value="Font Style">
			<input type="button" onclick="iFontSize()" value="Font Size">
			<input type="button" onclick="iFontColor()" value="Font Size">
			<input type="button" onclick="iAlignLeft()" value="Align Left">
			<input type="button" onclick="iAlignCenter()" value="Align Center">
			<input type="button" onclick="iAlignRight()" value="Align Right">
			<input type="button" onclick="iIndent()" value="Indent">
			<input type="button" onclick="iOutdent()" value="Outdent">
			<input type="button" onclick="iUnorderedList()" value="UL">
			<input type="button" onclick="iOrdereredList()" value="OL">
			<input type="button" onclick="iMargin()" value="Margin">
		</div>
		
		<div id="section-to-print">
			<?php 
							
							$a= $_SESSION['path'];
							//echo "<script>alert $a</script>";
						require('connection.php');
						$sql = "select strTemplate_Path from tbldocumenttemplate Where intTemplate_ID = $a ";
						$query = mysqli_query($con, $sql);
						if(mysqli_num_rows($query) > 0){
						$i = 1;
						while($row = mysqli_fetch_assoc($query)){?>
				
							<img src="Images/TemplateUpload/<?php echo $row['strTemplate_Path']; ?>" width="400px" height="200px">
							
						<?php  }}?>
		
		
		<div class="positionText">
			<form name="p_form" id="p_form" method="post">
				<textarea elastic ng-model="someProperty" style="display:none" name="documentBody" id="documentBody" cols="85" rows="50"></textarea>
				<iframe name="richTextField" id="richTextField" style="height:1000px; width:640px;"></iframe>	
				
				<script>
				function getContent() {
	
					var iForm = document.getElementById("p_form");
					iForm.elements["documentBody"].value = window.frames["richTextField"].document.body.innerHTML;
				}
				
				</script>
				<br><br><br><input name="saveContent" type="submit" value="Save" onclick="javascript:getContent();"/>
				
			</form>
		</div>
		</div>
		
		<?php
		if (isset($_POST['saveContent'])){
			$strDocuBody = htmlspecialchars($_POST['documentBody']);
			$b = $_SESSION['id'];
				require('connection.php');
			
				mysqli_query($con,"UPDATE `tbldocument`(`strDocuBody`) VALUES ('$strDocuBody') Where intDocCode = '$b';");
					 echo "<script>alert('Success')</script>";		 
		}
		?>
		<!-- this is an experiment -->
	
	</body>
</html>
