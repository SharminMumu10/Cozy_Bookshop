<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">Home</a> / About </p>
</div>
<br>
<br>
<br>
<br>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/aboutus.jpg" alt=""style="height: 435px;">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>We believe that books have the power to transport us to new worlds, broaden our perspectives, and spark meaningful conversations. That's why we take great care in selecting only the best books for our shelves. In addition to our in-store selection, we also offer hand-picked books delivered right to your door. Whether you're looking for the latest bestseller or a hidden gem, we've got you covered.</p>
         <p>So come on in, grab a cup of coffee, and lose yourself in a good book. We can't wait to share our love of books with you!</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>