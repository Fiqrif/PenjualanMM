<?php 

    include "connection/connection.php";
    session_start();

    $login_massage = "";
    if (isset($_SESSION["is_login"])) {
        header("location: index.php");
    }

    if (isset($_POST ['login'])) {
        $username = $_POST ['username'];
        $password = $_POST ['password'];

        $hash_password = hash("sha256", $password);

        $sql = "select * from tb_users where username = '$username' and password = '$hash_password' ";

        $result = $db->query($sql);
    
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_login"] = true;

            header("location: index.php");

        }else{
            $login_massage = "akun tidak ditemukan";
        }
        $db->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
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
		            <h3 style="background-color: white;">Login</h3>
		            <form style="background-color: white;" action="login.php" method="POST">
		                <input style="background-color: white;" class="input" type="text" name="username"
			                placeholder="Username" />
	                    <input style="background-color: white;" class="input" type="password" name="password"
			                placeholder="Password" />
		                <button type="submit" class="btn_login2" name="login"  
                            id="login"> Login
		                </button>
						<i><?= $login_massage ?></i>
		            </form>
					<br>
					<p style="background-color: white; text-align: center;">Belum punya akun? Silakan <a style="background-color: white;" href="register.php" class="link-register">Register Disini</a></p>
	            </div>
	        </div>
	    </main>
	    <footer>
			<!-- nambah class -->
            <h4 class="footer">&copy;ProboLezat MFF15</h4>
        </footer>
    </div>
</body>
</html>
