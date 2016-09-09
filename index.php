<?php include ("head.php"); ?>
   <!-- top -->
    <div class="top">
        <div class="top_top"></div>
        <div class="top_img">
		
		   <div id="slider-wrapper">        
		   <div id="slider" class="nivoSlider">
    <?php
	$cn = mysql_connect("localhost","root","");
	$db = mysql_select_db("brgydb");
	$sql = mysql_query("SELECT * FROM tbimage ORDER BY image DESC LIMIT 5") or die (mysql_error());
	while($row = mysql_fetch_array($sql)){
		$id = $row['id'];
		$name = $row['name'];
		?>
		<img width="1034px" height="268px" src="data:image/jpg;base64,<?php echo base64_encode($row['image']) ?>">
		
		
		<?php
		
	}
	?>    
	</div>
        </div>
		
		
		

<script type="text/javascript" src="jquery/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
		
		</div>
        <div class="top_bot"></div>
    </div>
    <div class="clear" style="height: 9px"></div>
    <!-- content -->
    <div class="content_top" ></div>
    <div id="content" >
	<center><h3>Mission</h3></center>
    	<div class="box1_all">
            <div class="box1">
                <div class=" box1_left"><img src="images/filler1.jpg" style="padding-top: 15px;" alt="" /></div>
                <div class=" box1_right" style=" width: 205px">
                    <h1>To Ensure</h1>
                    <p>To ensure honesty and efficiency in the delivery of services in the barangay. </p>
                </div>
            </div>
            <div class=" box1_div"></div>
            
            <div class="box1">
                <div class=" box1_left"><img src="images/filler2.jpg" style="padding-top: 15px;" alt="" /></div>
                <div class=" box1_right" style=" width: 205px">
                    <h1>To Advocate</h1>
                    <p>To advocate principles and practices of good governance.</p>
                </div>
            </div>
            <div class=" box1_div"></div><div class="box1">
                <div class=" box1_left"><img src="images/filler3.jpg" style="padding-top: 15px;" alt="" /></div>
                <div class=" box1_right" style=" width: 205px">
                    <h1>To Build and Nurture</h1>
                    <p>To build and nurture honesty and responsibility among its employees.</p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div >
        	<div class="index_left">
            	<div class="index_left_bg">
            		<div class="index_left_left">
                    	<h3>About the Barangay</h3>
                    	<div class="block">
                        	<img src="images/galas.jpg" alt="" />
							<center><b><h4>BARANGAY SAN ISIDRO GALAS, QUEZON CITY</h4></b></center> <br>
						<p>
							Barangay San Isidro Galas was created June 25, 1975 in manner of creation by Executive Order No.34 PDs 86 & 210. Galas got its name from the Tagalog word “ Galasgas” meaning rough and rugged terrain. Early in the 1900’s, Galas was a vast tract of sparsely populated rugged farmlands under the jurisdiction of what was then Caloocan, Rizal. It was then bounded on...</p>
						</p>
                            <div class="read_more"><a href="about_us.php">Read more...</a></div>
                        </div>
                    </div>
            		<div class="index_left_right">
                    	<h3>Officials</h3>
                        <ul class="list_index"> <br>
							<h2><p>(Punong Barangay)</p></h2> <br>
                            <b><li>Hon. John M. Reyno</a></li> <br> <br>
							<h2><p>(Barangay Kagawad)</p></h2> <br>
                            <li>Hon. Rodolfo A. Reyno </a></li>
                            <li>Hon. Anthony D. Perez</a></li>
                            <li>Hon. Eugene M. Macandog </a></li>
                            <li>Hon. Nemensio E. Villanueva Sr.</a></li>
                            <li>Hon. Manuel A. Casem  </a></li>
                            <li>Hon. Lorenzo F. Yuson III</a></li>
                            <li>Hon. Estrella P. Alcantara</a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
            	</div>
            </div>
            <div class="index_right">
            	<h3 style="text-align: center;">Contact Us</h3> <br>
                
				<strong>Facebook Page</strong><br>
				<a href="https://www.facebook.com/Barangay-San-Isidro-Galas-Quezon-City-504862119632919">https://www.facebook.com/Barangay-San-Isidro-Galas-Quezon-City-504862119632919</a>
``				<div class="clear" style="height:20px;"></div>
                <div class="line" style="height:20px;"></div>
                
				<strong>Website</strong><br>
				<a href="http://www.website.com/">www.SanIsidroGalas.hostinger.com</a>				
				<div class="clear" style="height:20px;"></div>
                <div class="line" style="height:20px;"></div>
				
				<strong>Email</strong><br>
				<a href="mailto:brgy.sanisidrogalasqc@gmail.com">brgy.sanisidrogalasqc@gmail.com</a>		
				<div class="clear" style="height:20px;"></div>
                <div class="line" style="height:20px;"></div>
				
				<strong>Contact Number</strong><br>
				<p> 415-4212 / 415-4601 </p>
				<div class="clear" style="height:20px;"></div>
                <div class="line" style="height:20px;"></div>
				
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="content_bot" ></div>
<?php include ("footer1.php"); ?>