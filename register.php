<?php
    include "connection/connection.php";
    session_start();

    $register_massage = "";
    if (isset($_SESSION["is_login"])) {
        header("location: index.php");
    }

    if(isset($_POST["register"])){
        $username = $_POST ["username"];
        $password = $_POST ["password"];

        $hash_password = hash("sha256", $password);

        try {
            $sql = "INSERT INTO tb_users (username, password) VALUES ('$username', '$hash_password')";

            if($db->query($sql)){
                $register_massage = "daftar akun berhasil, silakan login";
            }else{
                $register_massage = "daftar akun gagal, silakan coba lagi";
            }
        }catch(mysqli_sql_exception){
            $register_massage = "username telah digunakan, silahkan ganti yang lain";
        }
        $db->close(); 
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  	<title>Register</title>
  	<link rel="stylesheet" href="css/style.css" />
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
		  			<form style="background-color: white;" action="register.php" method="POST">
		    			<input style="background-color: white;" class="input" type="text" name="username"
							placeholder="Username"/>
		    			<input style="background-color: white;" class="input" type="password" name="password"
				      		placeholder="Password" />
  		    			<button type="submit" class="btn_login3" name="register"
							id="register">Register
		    			</button>
						<i><?= $register_massage ?></i>
		  			</form>
					<br>
					<p style="background-color: white; text-align: center;">Udah punya akun? Silakan 
					<a style="background-color: white;" href="login.php" class="link-register">Login Disini</a></p>
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
