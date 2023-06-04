<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"style="color:black;"></a>
            <a href="#" class="fab fa-twitter"style="color:black;"></a>
            <a href="#" class="fab fa-instagram"style="color:black;"></a>
            
         </div>

        
      <a href="home.php" class="logo"style="font-weight: bold;text-decoration: none;color:#21618f;
   font-family: 'Verdana';font-size: 28px;" >
      
      COZY BOOKSHOP
   </a>
 



         <p><a href="login.php">LOGIN</a> | <a href="register.php">REGISTER</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
        

         <nav class="navbar"style="padding: -1.5rem;margin: -1.5rem;  ">
         <ul>

        
<li><a href="home.php"style="color:black;">Home</a> </li>
 <li><a href="about.php"style="color:black;">About</a></li>
 <li><a href="shop.php"style="color:black;">Shop</a>
 <ul >
  <!-- fetching category from database -->
 <?php
$select_categories="Select * from categories";
$result_categories=mysqli_query($conn,$select_categories);


while($row_data=mysqli_fetch_assoc($result_categories))
{
$category_title=$row_data['category_title'];
$category_id=$row_data ['category_id'];
echo " <li><a href='home.php?category=$category_id'>  $category_title   </a></li>";
}
    ?>
    </ul>
   </li> 
 

 <li><a href="contact.php"style="color:black;">Contact</a></li>
 <li><a href="orders.php"style="color:black;">Orders</a></li>
  </ul>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"style="color:black;"></div>
            <a href="search_page.php" class="fas fa-search"style="color:black;"></a>
            <div id="user-btn" class="fas fa-user"style="color:black;"></div>
            <!-- cart number update  -->
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"style="color:black;"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p>Username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>

</header>