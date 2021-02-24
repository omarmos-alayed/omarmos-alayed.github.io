<?php 
	session_start();
    if(isset($_POST["SignIn"]))
    {
		$conn = mysqli_connect("localhost","root","","requests");
        $uname = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
    
        if ($uname != "" && $password != ""){
    
            $sql_query = "SELECT count(*) as cntUser from `tbl_admin` WHERE `UserName` ='".$uname."' and `Password` ='".$password."'";
            $result = mysqli_query($conn,$sql_query);
            $row = mysqli_fetch_array($result);
    
            $count = $row['cntUser'];
    
            $res = mysqli_query($conn,$sql_query);
            if($count > 0){
                $_SESSION['username'] = $uname;
                header('Location: ControlPanel.php');
			}
			else
			{
				 ?>
				<script>
				alert("Error Please Try Again ...!");
				</script>
				<?php 
            }
    
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign IN Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>
 <div id="login"><br><br><br><br><br>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center" style="margin-left:400px">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">User Name :</label><br>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password :</label><br>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="SignIn" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="index.php" target="_blank" class="text-info">Home</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br><br><br><br>
<?php Include "Include/footer.php"; ?>
</body>
</html>
