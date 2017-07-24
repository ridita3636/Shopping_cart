<?php
include_once("db_connect.php");
session_start();

function cart_items()
{
	global $conn;
	$items_fetch=" select * from cart_items where 'quantity'>'0' LIMIT 0,4 ";
	$run=mysqli_query($conn,$items_fetch);
	//$count=mysql_num_rows($run);

    while($row=mysqli_fetch_array($run))
	{
		$id=$row['id'];
		$image=$row['image'];
		$name=$row['name'];
		$price=$row['price'];
		
		echo " '<span class='img'> 
		<img src='prod_images/$image' height='120px' width='120px' class='img' >
		 <a href='cart.php?add_cart=$id'> Add To Cart </a> 
		 </span> "."<br>";
		echo "<h3 style='color:green'>".$name."</h3>"."<br>";
		echo "<h4 style='color:#FF3300'>".'Price='.$price."</h4>"."<br>";
	}
}

?>