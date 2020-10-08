<!DOCTYPE html>
<?php
	session_start();
	$conn = mysqli_connect('localhost', 'root', 'root', 'bank');
	$acc_no = $_SESSION['acc_no'];
	$_SESSION['flag'] = 0;
	if(isset($_POST['transfer']))
	{
		$_SESSION['flag'] = 1;
		header("Location: transfer-money.php");
	}
	
?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Website Title -->
    <title>Banking Website</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.php"><img src="images/image.png" alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php#header">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php#services">Services</a>
                </li>
                
                

               <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="index.php#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">View All customer</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="view-all-customers.php"><span class="item-text">Customers</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="transfer-money.php"><span class="item-text">Transfer Money</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->   

                   
               <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php#ourteam">Team</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php#contact">Contact</a>
                </li>
            </ul>
            
                
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->


    <!-- Header -->
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>User 
</br>Information</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->
</br>
</br>
</br>

   
<!--Table starts-->


  <div class=container>
  
<?php
	$sql = "SELECT * from info where ID='$acc_no'";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo"<form method='POST'>";
		//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		
		   
			//echo"<input type='hidden' name='accno' value=".$row['ID']."ID :".$row['ID'];
            //echo "</br>";
            //echo "Name: &nbsp&nbsp".$row['Name'];
			//echo "</br>";
			//echo "Age: &nbsp&nbsp".$row['Age']."</br>";
			//echo "Email: &nbsp&nbsp ".$row['Email']."</br>";
			//echo "Current Balance: &nbsp&nbsp  ".$row['CurrentBal']."</br>";
			//echo "MobileNumber:  &nbsp&nbsp ".$row['MobileNo']."</br>";
			//echo "Address: &nbsp&nbsp".$row['Address']."</br>";
			
			//echo"<input type=submit name='transfer' value='Transfer Money'>";
            //echo"</form>";
			
			echo '<div class="col-sm-10">';
echo '<div class="card">';
echo '<div class="card-body">';
echo '<h5 class="card-title"><u>User Account Information</u></h5>';
echo '<p class="card-text"></p>';
echo "<b>Name:</b> &nbsp&nbsp".$row['Name']."</br>";
echo "<b>Age:</b> &nbsp&nbsp".$row['Age']."</br>";
echo "<b>Email:</b> &nbsp&nbsp ".$row['Email']."</br>";
echo "<b>Current Balance:</b> &nbsp&nbsp  ".$row['CurrentBal']."</br>";
echo "<b>MobileNumber:</b>  &nbsp&nbsp ".$row['MobileNo']."</br>";
echo "<b>Address:</b> &nbsp&nbsp".$row['Address']."</br>";
echo"<br/>";
echo"<input type=submit name='transfer' value='Transfer Money'>";
 
echo '</div>';
echo '</div>';
echo '</div>';
			
		}
	}
	
  ?>
 
  </div>
  

 
<!-- end of table -->


</br>
</br>
</br>
</br>
</br>


    


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a><i class="fa fa-angle-double-right"></i><span>User Information</span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->

    
    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                
                
                
                    <div class="col-md-12">
                        <h4>Social Media</h4>
                        <span class="fa-stack">
                            <a href="https://www.facebook.com/Aayu30/">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://twitter.com/luckey0_0">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                       
                       
                        <span class="fa-stack">
                            <a href="https://www.instagram.com/l.uckey/">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://www.linkedin.com/in/aayush-dehariya-166061122/">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> 
                
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->



    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright ©Aayush Dehariya 2020 - All rights reserved</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->

	
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
    
</body>
</html>