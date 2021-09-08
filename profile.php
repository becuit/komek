<?php 
  
  session_start();
  if (!$_SESSION['m_un']){
  header('Location: login.php');
  exit;
}

?> 



<html>

<head>
	<title>Profile</title>
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

.about {
  margin: 20px;
  margin-left: 50px;
  margin-right: 50px;
  display: inline-block;
}

.about-p {

  margin-left: 500px;
}

.about img {
  float: left;
}

.mission {
  margin: 20px;
  margin-left: 50px;
  margin-right: 50px;
  display: inline-block;
}

.mission img {
  float: right;
}
table {
  margin-left: 200px;
  border: pixels;
  padding-top: 50px;
  margin-right: 30px;
}

td {
  padding-left: 20px;
}





</style>
</head>

<body >


	<div class="topnav" >
  
<img src="helplogo.png"  height="60" width="80" />
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
  <a href="register.php">Register</a>
</div>
</div>

<?php  

    $name = $_SESSION['m_un'];
    $db = mysqli_connect("localhost","bolat","1234","komek"); 
    $sql = "select * from volunteers where volunteer_name='$name'";
    $sth = $db->query($sql);
    while($result=mysqli_fetch_array($sth)){  
        
        ?>
        <table>
        <tr>
          <td><?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['volunteer_image'] ).'" height="250" width="165"/> 
        ';?>
      </td>
      <td>
        <p><strong>Name:</strong> 
        <?php echo $result["volunteer_name"]?> </p> 
        <?php
        ?> 
        <p> <strong>Surname:</strong>  
        <?php echo $result["volunteer_surname"] ?> </p>
        <p> <strong>Age:</strong> 
        <?php echo $result["volunteer_age"]?> </p> 
        <p> <strong>Email:</strong> 
        <?php echo $result["volunteer_email"]?> </p> 
        <form method="post">
        <input type="submit" name="button1"
                class="button" value="Log out" />
    </form>
      </td>
    </tr>
    </table>
    <?php

    }   

     if(array_key_exists('button1', $_POST)) {
            button1();
        }
        
        function button1() {
            

unset($_SESSION["m_un"]);


        }
?>

</div>
</body>
</html>
