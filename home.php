<?php

include 'config.php';
include 'common_function.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}


if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

<!-- slider -->
   


</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>Immerse Yourself In A Good Book At Our Cozy Bookshop</h3>
      <p>Where books and comfort meet</p>
      <a href="about.php" class="white-btn">discover more</a>
   </div>

</section>


<br><br>
<section class="products">

   <h1 class="title">OUR PRODUCTS</h1>
   <br>


   <div class="box-container">

      <?php  
   // call function

   get_products();
   get_unique_categories();
      ?>
   </div>
<br>
<br>
   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>
<br>
<br>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/aboutus.jpg" alt="">
      </div>

      <div class="content">
         <h3>ABOUT US</h3>
         <p>Welcome to our <b>COZY BOOKSHOP</b>, where books and readers come together! Our passion for books is evident in every corner of our store, from the hand-picked selection of novels, memoirs, and poetry to the warm and inviting atmosphere.</p>
         <a href="about.php" class="btn">Read More</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <br>
      <br>
      <p>TO KNOW MORE!</p>
      <br>
      <br>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>





<?php include 'homefooter.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>