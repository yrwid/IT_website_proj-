<?php

	session_start();
	/*if (!(isset($_SESSION['zalogowany'])) && !($_SESSION['zalogowany']==true))
	{
		header('Location: ../indexPage/index.php');
		exit();
	}
	
	if (isset($_POST['fName']))
	{
		$fName = $_POST['fName'];
		if ((strlen($fName)<0) || (strlen($fName)>30))
		{
			$wszystko_OK=false;
			$_SESSION['e_fName']="Max lenght of First Name is 30 characters!";
		}
		$_SESSION['fr_fName'] = $fName;
		
		require_once "../phpRegister/connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				if ($polaczenie->query("UPDATE users SET fName = $fName"))
					{
						//$_SESSION['udanarejestracja']=true;
						header('Location: ../indexPage/index.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
				$polaczenie->close();
			}
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
			
	}*/
?>

<!DOCTYPE HTML>
<html lang="pl">
  <head>
     <meta charset="utf-8" />
	 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	 
	 <title>M&M</title>
	 
	 <meta name ="description" contenr="Serwis o ciekawych rzeczach itp." />
	 <meta name="keywords" content="Elektronika , Mikroprocesory,Programowanie ,Gliwice ,Politechnika ,AEI" />
	  <link rel="shortcut icon" href="../images/Logo_ikona.ico">
	  
	 <link href="profile.css" rel="stylesheet" type="text/css" />
  </head>
 
  <body>
		<div class="wrapper"> 
			<div class="header">
				<div class="logo">
						<img src="../images/logo.jpg" style="float: left;"/>
						 <span style="color: #7E6398">M&M</span>  
 						 <span style="color: #025D45">Company</span> 
						<div style="clear:both;"></div>
				</div>
			</div>
			
			<!-- TU DODAŁEM-->
			<?php
							if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
							{
							echo <<< EOT
<button id="p3" style="float: right;width: 10%;margin-right:10px;background-color: #e68a00;" onclick="window.location.href = '../phpRegister/logout.php'">Log Out</button>
EOT;
							}
							else
							{
								echo"<button id=\"p1\" onclick=\"document.getElementById('id01').style.display='block'\">Log In</button>";
								echo"<button id=\"p2\" onclick=\"window.location.href = '../phpRegister/register.php'\">Sign Up</button>";
							}
						?>
						
			<!-- KONIEC DODAWANIA-->
			
			<div class="nav">
				<ol>
				  <li><a href="../indexPage/index.php">Main page</a></li>
				  <li><a href="../aboutPage/about.php">About us</a></li>
				  <li><a href="../productPage/prod.php">Our product</a></li>
				  <li><a href="../softwarePage/soft.php">Software</a></li>
				  <li><a href="../contactPage/contact.php">Contact us</a></li>
				</ol>
			</div>
<div class="back">
	<?php 
			if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
				{
					
					echo "<h1 style = \"text-align: center;\">Hey, <span style =\"color: #f5c001\">".$_SESSION['login'].'</span>!</h1>';
					//echo "<br></br>";
					echo "<p style = \"font-size:40px\"><b>Here is your data:</b></p>";
					echo "<p><b>Nickname: &emsp;".$_SESSION['login'].'</p>';
					echo "<p><b>E-mail:</b> &emsp;".$_SESSION['email'].'</p>';
					//echo "<p>First name: &emsp;".$_SESSION['fName'].'<button style=\"float: right;width: 10%;margin-right:10px;background-color: #e68a00;\">Change</button></p>';
					echo "<p><b>First name</b>: &emsp;".$_SESSION['fName'].'';
					//echo "<button style=\"float: right;width: 10%;margin-right:10px;background-color: #e68a00;\">Change</button></p>";
					echo "<button id=\"p4\" onclick=\"document.getElementById('id02').style.display='block'\">Change First name</button></p>";
					echo "<p><b>Last name:</b> &emsp;".$_SESSION['lName'].'';
					echo "<button id=\"p4\" onclick=\"document.getElementById('id03').style.display='block'\">Change Last name</button></p>";
					echo "<p><b>Country:</b> &emsp;".$_SESSION['country'].'';
					echo "<button id=\"p4\" onclick=\"document.getElementById('id04').style.display='block'\">Change Country</button></p>";
					echo "<p><b>Town:</b> &emsp;".$_SESSION['town'].'';
					echo "<button id=\"p4\" onclick=\"document.getElementById('id05').style.display='block'\">Change Town</button></p>";
					echo "<hr></hr>";

					
					
					
								//<h1>Hey, </h1>
				
				
				  //  <p> We are a company that was founded in 2019 by two students of the Silesian University of Technology. Our company is a pioneer in solutions combining microprocessor systems with dedicated peripherals and our own software our solutions have made Gliwice famous throughout Europe, Asia, North America and the Faroe Islands </p>
						
				//	 <p> Our team consists of experienced programmers, masters in creating hardware and great management staff. Our foreign clients are proud to name our company. our products are used in many home appliances, thanks to which thousands of people start the day with a smile every day
						//</p>
				
				
				
				
				
				}
	   
	?>
</div>
			<div class="socials"><a style="text-decoration:none; color:#096506;"  href='https://329elearning.aei.polsl.pl/tiwordpress2019/s121/'  >IT Blog</a></div>
			
			<!--TU DODAŁEM-->
				<!-- The Modal -->
				<div id="id01" class="modal">
				  <!-- Modal Content -->
				  <form class="modal-content animate" action="../phpRegister/login.php" method="post">
					<div class="container" style="background-color:#292929">
					  <label for="uname"><b>Username</b></label>
					  <input type="text" placeholder="Enter Username" name="login" required>

					  <label for="psw"><b>Password</b></label>
					  <input type="password" placeholder="Enter Password" name="haslo" required>

					  <button type="submit">Login</button>
					  <label>
						<input type="checkbox" checked="checked" name="remember"> Remember me
					  </label>
					</div>

					<div class="container" style="background-color:#171717">
					  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
					  <?php
						if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
						?>
					</div>
				  </form>
				</div>

				<!-- tutaj javascript jak klikniesz poza obszar logowania to Cię przenosi -->
				<script> 
				// Get the modal
				var modal = document.getElementById('id01');

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				  if (event.target == modal) {
					modal.style.display = "none";
				  }
				}
				</script>
			<!--KONIEC DODAWANIA-->
			
			<!--First name button-->
			<div id="id02" class="modal">
				  <!-- Modal Content -->
				  <form class="modal-content animate" action="fNameChange.php" method="post">
					<div class="container" style="background-color:#292929">
					  <label for="fName"><b>First Name</b></label>
					  <input type="text" placeholder="Enter new First Name" name="fName" required>
					  <button type="submit">Submit</button>
					</div>
					<div class="container" style="background-color:#171717">
					  <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
					  <?php
						if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
						?>
					</div>
				  </form>
			</div>
			
			<!--Last name button-->
			<div id="id03" class="modal">
				  <!-- Modal Content -->
				  <form class="modal-content animate" action="lNameChange.php" method="post">
					<div class="container" style="background-color:#292929">
					  <label for="lName"><b>Last Name</b></label>
					  <input type="text" placeholder="Enter new Last Name" name="lName" required>
					  <button type="submit">Submit</button>
					</div>
					<div class="container" style="background-color:#171717">
					  <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
					  <?php
						if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
						?>
					</div>
				  </form>
			</div>
			
			<!--Country button-->
			<div id="id04" class="modal">
				  <!-- Modal Content -->
				  <form class="modal-content animate" action="CountryChange.php" method="post">
					<div class="container" style="background-color:#292929">
					  <label for="country"><b>Country</b></label>
					  <input type="text" placeholder="Enter new Country" name="country" required>
					  <button type="submit">Submit</button>
					</div>
					<div class="container" style="background-color:#171717">
					  <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>
					  <?php
						if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
						?>
					</div>
				  </form>
			</div>
			
			<!--Town button-->
			<div id="id05" class="modal">
				  <!-- Modal Content -->
				  <form class="modal-content animate" action="TownChange.php" method="post">
					<div class="container" style="background-color:#292929">
					  <label for="town"><b>Town</b></label>
					  <input type="text" placeholder="Enter new Town" name="town" required>
					  <button type="submit">Submit</button>
					</div>
					<div class="container" style="background-color:#171717">
					  <button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Cancel</button>
					  <?php
						if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
						?>
					</div>
				  </form>
			</div>
			
				<script> 
				// Get the modal
				var modal2 = document.getElementById('id02');
				var modal3 = document.getElementById('id03');
				var modal4 = document.getElementById('id04');
				var modal5 = document.getElementById('id05');

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				  if ((event.target == modal2)||(event.target == modal3)||(event.target == modal4)||(event.target == modal5)) {
					modal2.style.display = "none";
					modal3.style.display = "none";
					modal4.style.display = "none";
					modal5.style.display = "none";
				  }
				  
				}
				</script>
				
			
			
		</div>
  </body>
</html>