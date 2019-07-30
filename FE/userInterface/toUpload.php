<?php
	session_start();
	$cnt 	= $_SESSION['noticnt'];
	$output = $_SESSION['noti'];

	include ("php/connectDB2.php");
	include ("php/notif.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <title> <?php echo "$bzname" ?> | Main page </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
  	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="css/util.css">
  	<link rel="stylesheet" type="text/css" href="css/inventory.css">
	<link rel="stylesheet" type="text/css" href="tablestyle.css">
	<script src"https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--===============================================================================================-->

  </head>
  <body>


    <div class="bgimg">
      <div class="insidebg">

        <div id="topNav-container">
          <span id="navToggle" onclick="openNav()">&#9776;</span>

          <span id="right-notification">
            <a href="#" class="notification">
              <button class="button" id="bWidget">
                <span>Notifications </span>
              </button>
	      <span class="badge"><?php echo $cnt;  ?></span>
            </a>
          </span>
        </div>


        <div id="mySidenav" class="sidenav">
          <div class="busName">
            <h1> <?php echo $bzname; ?> </h1>
          </div>
          <section id="navInfo">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="businessInv.php" class="buinv">
		<button class="button" style="vertical-align:middle"><span>Inventory </span></button>
	    </a>

            <article id="companyInfo">
              <h2 class="navInfoTitle"> Business ID: </h2>
                <h3 class="navInfoData"> <?php echo "BU00$bID"; ?> </h3>
              <h2 class="navInfoTitle"> Company Address: </h2>
                <h3 class="navInfoData"> <?php echo "$street $city, $state $zc"; ?></h3>
              <h2 class="navInfoTitle"> Email: </h2>
                <h3 class="navInfoData"> <?php echo $email; ?> </h3>
              <!--<h2 class="navInfoTitle"> Last Login: </h2>
                <h3 class="navInfoData"> March 30, 2019 at 12:30PM</h3> -->
            </article>
          </section>
          <section class="logoutButnC">
            <a href="../phpFiles/logout.php">
	         <img src="images/logout.png" title="logoutBtn" alt="logoutBtn" id="logoutButnD">
	    </a>
          </section>
          <section class="logoiShopC">
          <a href="index.php">
            <img src="images/ishop.png" title="iShopLogo" alt="iShopLogo" id="logoiShopD">
          </a>
          </section>
        </div>


        <!--                            MAIN CONTENT                         -->
	
	  <section id="main">
		<div class="nameInContent">
	  		<a href="index.php"><img src="images/ishop.png" width="200px"> </a>
	  	</div>
		<br>
		<br>
		<h2 class="h1heading"> Upload CSV file into your inventory </h2><br><br>

	  	<form action="php/upload.php" class="toUpload" method="post" enctype="multipart/form-data">

    			<h3 style="font-weight:bold;"> Select file to upload:</h3><br>
    			<input type="file" name="fileToUpload" id="fileToUpload"><br>

			<!--Error messages go here-->
			<?php
		                //first method
		                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		                if (strpos($fullUrl,"status=error1")==true)
		                {
		                        echo "<h3 class='errorMsg'> Sorry, file is too large. </h3>";
		                }
		                elseif (strpos($fullUrl,"status=error2")==true)
		                {
		                        echo "<h3 class='errorMsg'>Sorry, only CSV file extension is allowed.</h3>"; 
		                }
		                elseif (strpos($fullUrl,"status=error3")==true)
		                {
		                        echo "<h3 class='errorMsg'>Sorry, no file selected.</h3>";
		                }
		                elseif (strpos($fullUrl,"status=error4")==true)
		                {
		                        echo "<h3 class='errorMsg'>Sorry, there was an error uploading your file.</h3>";
				}
				elseif (strpos($fullUrl,"status=error5")==true)
		                {
		                        echo "<h3 class='errorMsg'>Sorry, file already exists or No file selected.</h3>";
		                }

				elseif (strpos($fullUrl,"status=success")==true)
				{
					echo "<h3 class='successMsg'>File successfully imported. Go to your inventory.</h3>";
				}
		                 //end first method
			?>
    			<br><input type="submit" value="Upload File" name="submit" id="toUpload">
	  	</form>
		
		<br><br>
		<button class ="myButton" onclick="location.href='businessInv.php';">Back to Your Inventory</button>
		<br><br><br><br>

           
          </section>
      </div>
      <!--                               END OF MAIN CONTENT                 -->

      <!-- The Map Modal -->
      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <p>LOCALIZER to be UPDATED</p>

          <section class="contact_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3014.4529525156877!2d-74.17745888503858!3d40.92773907930902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2fdb3b53a8603%3A0x7bf5fca607743ad6!2s100+N+5th+St%2C+Paterson%2C+NJ+07522!5e0!3m2!1sen!2s!4v1542240288675"
              width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </section>
        </div>
      </div>
	    
      <!-- The widget modal -->
      <div id="wModal" class="wmodal">
        <!-- Widget Modal content -->
        <div class="wmodal-content">
          <span class="wclose">&times;</span><br>
          <p class="pFR">Food Safety Notification Recalls</p>

          <section class="wContent">
	 	<article class="notif">	
			<?php
				
				//header('Content-type: text/plain');
				 echo nl2br( "$output",false );
			?>
		</article>
          </section>
        </div>
      </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
