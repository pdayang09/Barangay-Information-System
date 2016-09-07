<html>
<?php session_start();


?>

	<head>
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		
		<link href="editor.css" type="text/css" rel="stylesheet"/>
		<script src="editor.js"></script>
		<!-- rgb(41, 41, 41) -->
		<style>
			@media print {
				body * {
					visibility: hidden;
				}
				#section-to-print, #section-to-print * {
					visibility: visible;
				}
				<#section-to-print {
					position: absolute;
					top: 100px;
					right: 50px;
					bottom: 100px;
					left: 350px;
				}
			}
			body {
				background-color: rgb(82, 86, 89);
				margin-top: 100px;
				margin-right: 50px;
				margin-bottom: 100px;
				margin-left: 350px;		
			}
			img {
				position: absolute;
				z-index: -1;
				width: 10in;
				height: 13in;
				outline-style: inset;
				outline-color: rgb(163, 163, 163);
			}			
			.position {
				position: absolute;
				top: 280px;
				left: 670px;
				right: 70px;
				height: 100px;
			}
		</style>
	</head>

	<body>
	
	
		<div class="position">
			<div id="txtEditor"></div>
			
				<script type="text/javascript">
					$(document).ready( function() {
						$("#txtEditor").Editor();                   
					});
					
					 var loadFile = function(event) {
						var output = document.getElementById('output');
						output.src = URL.createObjectURL(event.target.files[0]);
					  };
				</script>
		</div>
		<div id="section-to-print">
		
			<img src= "Images/TemplateUpload/<?php echo $_SESSION['template']; ?>" />
			
		</div>
	</body>
</html>