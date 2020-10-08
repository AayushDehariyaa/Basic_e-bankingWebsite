<!DOCTYPE html>
<?php
	session_start();
	$conn = mysqli_connect('localhost', 'root', 'root', 'bank');
	$acc_no = $_SESSION['acc_no'];
	$_SESSION['transaction_done'] = 0;
	if(isset($_POST['transfer']))
	{
		if(isset($_POST['confirm']))
		{
			$accfrom = $_POST['accountfrom'];
			$accto = $_POST['accountto'];
			$amount = $_POST['amount'];
			$success = 1;
			$acc1_exists = 0;
			$acc2_exists = 0;
			if(empty($accfrom) || empty($accto) || empty($amount))
			{
				echo"<script>alert('Please enter all the fields.')</script>";
				$success = 0;
			}
			else
			{
				$sql = "SELECT * from info";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						if(($row['ID'] == $accfrom) && $row['CurrentBal'] < $amount)
						{
							echo"<script>alert('Current balance in account in less than the amount entered')</script>";
							$success = 0;
							break;
						}
						if(($row['ID'] == $accfrom))
						{
							$balance1 = $row['CurrentBal'];
							$acc1_exists = 1;
						}
						if(($row['ID'] == $accto))
						{
							$balance2 = $row['CurrentBal'];
							$acc2_exists = 1;
						}
					}
				}
				if($acc1_exists==0 || $acc2_exists==0)
				{
					echo"<script>alert('Please enter valid account number')</script>";
					$success = 0;
				}
			}
			if($success==1)
			{
				$balance1 = $balance1 - $amount;
				$balance2 = $balance2 + $amount;
				$sql = "UPDATE info SET CurrentBal='$balance1' WHERE ID='$accfrom'";
				$result = mysqli_query($conn, $sql);
				$sql = "UPDATE info SET CurrentBal='$balance2' WHERE ID='$accto'";
				$result = mysqli_query($conn, $sql);
				$_SESSION['transaction_done'] = 1;
				echo"<script>alert('Transaction Successfull'); location.href='index.php';</script>";


			}
		}
		else
		{
			echo"<script>alert('Please select the checkbox')</script>";
		}
	}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    

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
                    <h1>Money 
					<br/>Transfer</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

<!-- start of form -->

   <form method=post>
<div class="container" align="centre">


  <div class="form-group">
<div class="col-6">
    <label for="Account from"><b>Account Number from money to be sent</b></label>
    <input type="number" class="form-control" name="accountfrom"  placeholder="" value=<?php if($_SESSION['flag'] == 1){ echo $acc_no; } ?>>
    </div>
</div>



  <div class="form-group">
<div class="col-6">
    <label for="Account to"><b>Account Number for money to be received</b></label>
    <input type="number" class="form-control" name="accountto"  placeholder="">
  </div>
</div>



<div class="form-group">
<div class="col-6">
    <label for="Amount"><b>Amount</b></label>
    <input type="number" class="form-control" id="amount" placeholder="in ₹" name=amount>
  </div>
</div>


<!--checkbox-->
  <div class="form-group form-check">
<div class="col-6">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name=confirm value=confirm>
    <label class="form-check-label" for="exampleCheck1">Are you sure you want to perform transection?</label>
</div>
  </div>


<!--button-->
<div class="col-6">
  <input type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" name=transfer value=Transfer>
  
  <!-- Modal -->
  
  
  
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Transection Sucessfull</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
      </div>
      <div class="modal-body">
        Your Transaction is Successfull You'll be redirected to Home page (Press ok)
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

    </div>
  </div>
</div>
</div>
</div>




</form>

<!--end of form -->


<br/>
<br/>
<br/>
<br/>
<br/>
    


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a><i class="fa fa-angle-double-right"></i><span>Money Transfer</span>
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