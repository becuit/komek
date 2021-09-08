<html>

<head>
	<title>Contacts</title>
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
</body>
</html>
