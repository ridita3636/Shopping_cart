<?php
include_once("connection/db_connect.php");
include_once("index.php");

//session_start();
//session_destroy();

function display_items()
{
	//global $conn;
	$items_fetch=" select * from cart_items where 'quantity'>'0' LIMIT 0,4 ";
	$run=mysqli_query($conn,$items_fetch);
	$count=mysqli_num_rows($run);

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

if(isset($_GET['add_cart']))
{
	$id=$_GET['add_cart'];
	
	$fetch_qty=" select * from cart_items where id='$id' ";
	$run=mysqli_query($conn,$fetch_qty);
	while($qty_row=mysqli_fetch_array($run))
	{
		$qty=$qty_row['quantity'];
		if($qty!=@$_SESSION['cart_'.$id])
		{
			echo @$_SESSION['cart_'.$id]+=1;
		}
		header('location:index.php');
	}
	
	
}
if(isset($_GET['sub']))
{
	$id=$_GET['sub'];
	
	$fetch_qty=" select * from cart_items where id='$id' ";
	$run=mysqli_query($conn,$fetch_qty);
	while($qty_row=mysqli_fetch_array($run))
	{
		$qty=$qty_row['quantity'];
		if($qty!=@$_SESSION['cart_'.$id] OR $qty==@$_SESSION['cart_'.$id])
		{
			echo @$_SESSION['cart_'.$id]--;
		}
		header('location:index.php');
	}
	
}
if(isset($_GET['add']))
{
	
   $id=$_GET['add'];
	
	$fetch_qty=" select * from cart_items where id='$id' ";
	$run=mysqli_query($conn,$fetch_qty);
	while($qty_row=mysqli_fetch_array($run))
	{
		$qty=$qty_row['quantity'];
		if($qty!=@$_SESSION['cart_'.$id])
		{
			echo @$_SESSION['cart_'.$id]++;
		}
		header('location:index.php');
	}
	
}
// Function For Showing Items In Paypal Start Here
function paypal_item()
{
	$item_no=0;
	foreach($_SESSION as $name=>$value)
	{
		//echo $name."&nbsp;&nbsp;".$value."<br>";
		if($value>0)
		{
			if(substr($name,0,5)=='cart_')
			{
				//echo substr('quantity',0,5)."<br>";
				$id=substr($name,5,(strlen($name-5)));
				//echo $id."<br>";
				$qty=" select * from cart_items where id='$id' ";
				$run=mysqli_query($conn,$qty);
				while($get_item=mysqli_fetch_array($run))
				{
					$item_no++;
					$id=$get_item['id'];
					$name=$get_item['name'];
					$price=$get_item['price'];
					$ship=$get_item['shipping'];
					$qty=$get_item['quantity'];
					
				echo ' <input type="hidden" name="item_number_'.$item_no.'"  value="'.$item_no.'"> ';
				
				echo ' <input type="hidden" name="item_name_'.$item_no.'"  value="'.$get_item['name'].'"> ';
				
				echo ' <input type="hidden" name="amount_'.$item_no.'"  value="'.$get_item['price'].'"> ';
				
				echo ' <input type="hidden" name="shipping_'.$item_no.'"  value="'.$get_item['shipping'].'"> ';
				
				echo ' <input type="hidden" name="quantity_'.$item_no.'"  value="'.$value.'"> ';
					
					
				}
			}
		}
	}
	
}
// Function For Showing Items In Paypal End Here

function products()
{
	$total_payment=0;
	foreach($_SESSION as $name=>$value)
	{
		//echo $name."&nbsp;&nbsp;".$value."<br>";
		if($value>0)
		{
			if(substr($name,0,5)=='cart_')
			{
				//echo substr('quantity',0,5)."<br>";
				$id=substr($name,5,(strlen($name-5)));
				//echo $id."<br>";
				$qty=" select * from cart_items where id='$id' ";
				$run=mysqli_query($conn,$qty);
				while($get=mysqli_fetch_array($run))
				{
					
					$name=$get['name'];
					$quantity=$get['quantity'];
					$total=$value*$get['price'];
					$shipping=$get['shipping'];
					echo  " $name &nbsp;*$value &nbsp;= $total 
					&nbsp;&nbsp;
					<a href='cart.php?add=$id' style='text-decoration:none' title='Add More Quantity'>[+] </a> &nbsp;&nbsp;
					<a href='cart.php?sub=$id' style='text-decoration:none' title='Reduce Quantity'>[-] </a> &nbsp;&nbsp;
					<a href='cart.php?del=$id' style='text-decoration:none' title='Delete Quantity'>[X] </a> <br> <br>
					
					";
					
				}
			}
			$total_payment+=$total;
			
		}
	}
	if($total_payment==0)
	{
		echo "Your Cart Is Empty... Please Buy Some Products. ! ";
		
	}
	else
	{
	echo "Total Price=".$total_payment."<br /><br />";
	}
	?>
    <!-- PDN Paypal Checkout Code Here -->
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
       <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="hrishi.singh14889@gmail.com">
   <input type="hidden" name="upload" value="1">
     
   <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="amount" value="<?php echo $total_payment; ?>">
   <input type="image" src="images/checkout_paypal.png" height="40px" width="170px" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
    <!-- PDN Paypal Checkout Code End Here -->
    
    
    <?php
	}


?>
