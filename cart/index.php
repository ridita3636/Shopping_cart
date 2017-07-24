<?php
include_once("function/fetch_items.php");
include_once("connection/db_connect.php");
include_once("cart.php");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> KpShop</title>
<link rel="icon" type="image" href="images/title_image.jpg" />
<link href="css_style/index.css" type="text/css" rel="stylesheet" media="all" />
</head>

<body style="background:url(images/shopping_bg5.jpg)">
<header id="headeing">
<!--<img src="images/kpshop.png" height="150px" width="200px" />-->
<h1>  Shopping Cart</h1>
</header>
<div id="main_div">
<h2> Shopping Cart</h2><br />

    <div id="division">
 
        <section id="main_section">
               <?php cart_items();  ?>
        </section>
        
          <aside id="side">
          <span class="my_cart">Cart Items </span> &nbsp; &nbsp; &nbsp;
          <img src="images/title_image.jpg" height="80px" width="80px" class="cart_img" /> <br /><br /><br />
          <?php products();  ?>
          </aside>
 
</div>


</div>

</body>
</html>