<!DOCTYPE html>
<html lang="en">

<head>
  	<title>Register</title>
  	<link rel="stylesheet" href="../css/style.css" />
</head>

<body>
  	<div class="container">
		<header>
   	  		<nav>
	    		<div class="logo">
					<h1>ProboLezat</h1>
	    		</div>
	      		<input type="checkbox" id="click" />
				<label for="click" class="menu-btn">
		  			<i class="fas fa-bars"></i>
				</label>
				<ul>
            		<li><a href="index.php">Home</a></li>
            		<li><a href="#">Categories</a></li>
            		<li><a href="#">About</a></li>
            		<li><a href="login.php" class="btn_login">Login</a></li>
				</ul>
	   		</nav>
      	</header>
		<main>
  	  		<div class="center">
	     		<div class="form-login">
		  			<h3 style="background-color: white;">Register</h3>
		  			<form style="background-color: white;" action="register-proses.php" method="POST">
					  	<input style="background-color: white;" class="input" type="email" name="email" placeholder="Email" />
		    			<input style="background-color: white;" class="input" type="text" name="username"
							placeholder="Username"/>
		    			<input style="background-color: white;" class="input" type="password" name="password"
				      		placeholder="Password" />
						<button type="submit" class="btn_login4" name="register"
							id="register">Register for Admin
		    			</button>
		  			</form>
					<p style="background-color: white; text-align: center;">Udah punya akun? Silakan 
					<a style="background-color: white;" href="login-admin.php" class="link-register">Login Disini</a></p>
	     		</div>
	   		</div>
		</main>
		<footer>
			<div >
				<!-- nambah class -->
				<h4 class="footer">&copy;ProboLezat MFF15</h4>
			</div>
		</footer>
   </div>
</body>
</html>
