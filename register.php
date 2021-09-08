<html>

<head>
	<title>Register</title>
	<style>
		.topnav {
  background-color: #333;
  overflow: hidden;
  height: 60px;
}

/* Style the links inside the navigation bar */
.topnav a {
  margin-top: 5px;
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  
  color: #F3C477;
}

/* Add a color to the active/current link */
/*.topnav a.active {
  background-color: #4CAF50;
  color: white;
}*/
body {
	margin: 15px;
  background-color: #EDF0F3;
}

.register {
	margin-top: 30px;
	text-align: center;
}

.register input {
	padding: 10px;
	padding-right: 50px;
	padding-left: 20px;
	margin: 10px;
	margin-left: -20px;
}
.lr {
  margin-top: -40px;
	margin-left: 1160px;
}

.topnav img {
  float: left;
}

.searchdiv {
  margin-top: 15px;
  /*margin-left: 850px;*/
  margin-left: 500px;
}

.searchInput {
  width: 500px;
  height: 30px;
}

.searchButton {
  width: 75px;
  height: 30px;
}
</style>
</head>

<body >


	<div class="topnav" >
  
<img src="helplogo.png" height="60" width="80" />
  <a href="home.php">Home</a>
  <a href="books.php">Books</a>
  <a href="contact.php">Contact</a>
  <a href="about.php">About</a>
  <div class="searchdiv">
  <input class="searchInput" type="text"  placeholder="What are you looking for?">
      <button type="submit"  class="searchButton" >
        <i>Search</i>
     </button>
   </div>
  <div class="lr">
  <a href="login.php">Log in</a>
  <a href="register.php">Register</a>
</div>
</div>





<div class="register">
<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
$db = mysqli_connect ("localhost","yusuf", "1234", "mysteryshack");
if (isset($_POST['submit'])) {
$username = $_POST['username'];                              
$email = $_POST['email'];
$password = $_POST['password'];
$r_password = $_POST['r_password'];
 if ($password==$r_password)
		{
		$result2 = mysqli_query ($db, "INSERT INTO clients (username,email, password) VALUES ('$username','$email','$password')");	
	if ($result2=='TRUE')
					{
							
	exit ("Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='home.php'>Главная страница</a>");
					
					}
	else {
		echo "Ошибка! Вы не зарегистрированы.";
	        }

			}
else { 
		die ('Passwords must match!');
			}

}
?>
	<form method="post" action="register.php">
	<input type="text" name="username" placeholder="Username" required="Username" /><br>
	<input type="text" name="email" placeholder="Email" required="Email" /><br>
	<input type="password" name="password" placeholder="Password" required="Password" /><br>
	<input type="password" name="r_password" placeholder="Retype your password" required="Retype your password" /><br>
	<input type="submit" name="submit" value="Register"/>
	</form>
</div>
	</body>
</html>