<?php 
session_start();

if (!$_SESSION['m_un']){
  header('Location: login.php');
  exit;
}
  

?>


<html>

<head>
	<title>Orders</title>
	<style>
		.topnav {
  background-color: #7E8CF2;
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
  background-color: #F8F8FF;
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
  margin-top: -50px;
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

table {
  margin-left: 150px;
  border: pixels;
  padding-top: 50px;
  margin-right: 30px;
}

td {
  
}

.nick {
  text-align: center;
}


</style>
</head>

<body >


	<div class="topnav" >
  
<img src="logo.png"  height="60" width="80" />
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

<h1 class="nick">Welcome, <?php echo $_SESSION['m_un']?> !</h1>

<?php  
    $db = mysqli_connect("localhost","bolat","1234","komek"); 
    $sql = "select o.order_id, o.order_date, c.client_name, c.client_image, o.order_address_from, o.order_address_to, o.order_status from orders o join clients c on c.client_id = o.client_id where o.order_status = 'active'";
    $sth = $db->query($sql);
    $i = 0;
    
  //   if(isset($_POST["confirmation"]))
  // {
  //     $ans = confirm('Are you sure to take this order?');
  //     if ($ans == true) {
  //       header('location: home.php');
  //     }

  // }
    // echo $_SESSION['m_un']; , o.order_status = 'in progress'

    $id_of_volunteer = $_SESSION['id'];

    // $net = mysqli_fetch_array($sth) ;
    $message_success = 'The operation ended successfully';
    $message_error = 'Please try again';
    
    $button_ar = array(1=> 'button1', 2=> 'button2', 3=>'button3', 4=>'button4', 5=>'button5', 6=>'button5', 7=>'button5');
    
    
    $n = 1;
	$column_1 = array(1,4,7,10,13,16,19);
	$column_2 = array(2,5,8,11,14,17,20);
	$column_3 = array(3,6,9,12,15,18,21);
	
    while($result= mysqli_fetch_array($sth)){  
        


        $id_of_order = $result['order_id'];
        

        
       if(isset($_POST["$button_ar[$n]"])){
            
           $sqltake = "update orders set volunteer_id = '$id_of_volunteer', order_status = 'in_progress' where order_id = '$id_of_order'";
            if (mysqli_query($db, $sqltake)) {
               echo 'хэллоу';
            } 
            else {
               echo 'гудбай';
            }
         }
        
        if (in_array($n, $column_1)){ 
        ?>
		<table>
			<th>
				<table class = "table1">
					<tr>
						<td>
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['client_image'] ).'" height="240" width="180"/> ';?>
						</td>
						<td>
					<p><strong>Name:</strong> 
					<?php echo $result["client_name"]; $name = $result["client_name"]?> </p> 
					<?php
					?> 
					<p> <strong>From:</strong>  
					<?php echo $result["order_address_from"] ?> </p>
					<p> <strong>To:</strong> 
					<?php echo $result["order_address_to"]?> </p> 
					<p> <strong>Date:</strong> 
					<?php echo $result["order_date"]?> </p> 
					<p> <strong>Order status:</strong> 
					<?php echo $result["order_status"]?> </p> 
					<form method="post" action="orders.php">
					<!-- <button onclick="confirmation()">Take the order</button> -->
					<input name="$button_ar[$n]" type="submit" value="Take the order">
					<!-- onclick="return confirm('Are you sure?')" -->
				  </form>
				  </td>
				</tr>
				</table>
			</th>
	<?php
	}
	if (in_array($n, $column_2)){
	?> 
			<th>
				<table class = "table2">
					<tr>
						<td>
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['client_image'] ).'" height="240" width="180"/> ';?>
						</td>
						<td>
							<p><strong>Name:</strong> 
							<?php echo $result["client_name"]; $name = $result["client_name"]?> </p> 
							<?php
							?> 
							<p> <strong>From:</strong>  
							<?php echo $result["order_address_from"] ?> </p>
							<p> <strong>To:</strong> 
							<?php echo $result["order_address_to"]?> </p> 
							<p> <strong>Date:</strong> 
							<?php echo $result["order_date"]?> </p> 
							<p> <strong>Order status:</strong> 
							<?php echo $result["order_status"]?> </p> 
							<form method="post" action="orders.php">
								<!-- <button onclick="confirmation()">Take the order</button> -->
								<input name="$button_ar[$n]" type="submit" value="Take the order">
								<!-- onclick="return confirm('Are you sure?')" -->
							</form>
						</td>
					</tr>
				</table>
			</th>
			
			<?php
			}
			if (in_array($n, $column_3)){
			?>
			
			<th>
				<table class = "table1">
					<tr>
						<td>
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['client_image'] ).'" height="240" width="180"/> ';?>
						</td>
						<td>
					<p><strong>Name:</strong> 
					<?php echo $result["client_name"]; $name = $result["client_name"]?> </p> 
					<?php
					?> 
					<p> <strong>From:</strong>  
					<?php echo $result["order_address_from"] ?> </p>
					<p> <strong>To:</strong> 
					<?php echo $result["order_address_to"]?> </p> 
					<p> <strong>Date:</strong> 
					<?php echo $result["order_date"]?> </p> 
					<p> <strong>Order status:</strong> 
					<?php echo $result["order_status"]?> </p> 
					<form method="post" action="orders.php">
					<!-- <button onclick="confirmation()">Take the order</button> -->
					<input name="$button_ar[$n]" type="submit" value="Take the order">
					<!-- onclick="return confirm('Are you sure?')" -->
				  </form>
				  </td>
				</tr>
				</table>
			</th>
			
    <?php
	}
      $n = $n + 1;
    }    
?>

<!-- function confirm_delete(){
    if(confirm("Are you sure you want to delete this..?") === true){
        return true;
    }else{
        return false;
   }
 }

 <input type="button" Onclick="confirm_delete()"> -->

</body>
</html>

<!-- where o.order_status = 'active' -->
