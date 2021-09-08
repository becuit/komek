<!DOCTYPE html>​

<html>​

<head>​

<title> ​

  Log in

</title>​
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

.login-form {
	margin-top: 30px;
	text-align: center;
}

.login-form input {
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

.welcome {
  text-align: center;
  
}

</style>
</head>​




<body >



<?php 

$db = mysqli_connect("localhost","bolat","1234","komek");




if(isset($_POST["Submit1"]))
{
  $email = $_POST['email'];
  $password = $_POST['password'];
  $array = array(
  1 =>  $email,
  2 =>  $password);
  
  $sql = "select * from volunteers where volunteer_email='$array[1]'";

  $sth = $db->query($sql);
  $result=mysqli_fetch_array($sth);
  
  if ($result['volunteer_password']==$array[2]) {
    session_start();
    $_SESSION['m_un'] = $result['volunteer_name'];
    $_SESSION['id'] = $result['volunteer_id'];

    header('Location: home.php');

  }
  else {
  echo "Your password is wrong";
}



}




 

?>
	<div class="topnav" >
  
<img src="helplogo.png" height="60" width="80" />
  <a href="home.php">Home</a>
  <a href="orders.php">Orders</a>
  <a href="contacts.php">Contacts</a>
  <a href="profile.php">Profile</a>
  <div class="searchdiv">
  <input class="searchInput" type="text"  placeholder="What are you looking for?">
      <button type="submit"  class="searchButton" >
        <i>Search</i>
     </button>
   </div>
  <div class="lr">
  <a href="login.php">Log in</a>
  
</div>
</div>
<div class="login-form">

<form method="POST" action="login.php">​

    <input type="text" name="email"  placeholder="email"   required="email" /><br><br>​

   <input type="password" name="password"  placeholder="password" required="password" /><br><br>​

<input  type="submit"   name="Submit1"      value="Log in"/>​ 



</form>​

</div>
 


</body>​

</html>
