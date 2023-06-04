<?php
include 'config.php';

//getting products

function get_products()
{
    global $conn;
//condition to check isset or not
if(!isset($_GET['category']))
{
    



    $select_products = mysqli_query($conn, "SELECT * FROM `products` order by rand()  LIMIT 0,6 ") or die('query failed');
    if(mysqli_num_rows($select_products) > 0){
       while($fetch_products = mysqli_fetch_assoc($select_products)){
 ?>
<form action="" method="post" class="box">
 <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
 <div class="name"><?php echo $fetch_products['name']; ?></div>
 <div class="price">Tk.<?php echo $fetch_products['price']; ?>/-</div>
 <input type="number" min="1" name="product_quantity" value="1" class="qty">
 
 <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
 <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
 <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">

 <input type="submit"  value="add to cart" name="add_to_cart" class="btn" >
</form>
 <?php
    }
 }else{
    echo '<p class="empty">no products added yet!</p>';
 }



}
}
//getting unique products

function get_unique_categories()
{
    global $conn;
//condition to check isset or not
if(isset($_GET['category']))
{
    $category_id= $_GET['category'];



    $select_products = mysqli_query($conn, "SELECT * FROM `products` where category_id=$category_id") or die('query failed');
    if(mysqli_num_rows($select_products) > 0){
       while($fetch_products = mysqli_fetch_assoc($select_products)){
 ?>
<form action="" method="post" class="box">
 <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
 
 <div class="name"><?php echo $fetch_products['name']; ?></div>

 <div class="price">Tk.<?php echo $fetch_products['price']; ?>/-</div>
 <input type="number" min="1" name="product_quantity" value="1" class="qty">
 <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
 <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
 <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">

 <input type="submit" value="add to cart" name="add_to_cart" class="btn">
</form>
 <?php
    }
 }else{
    echo '<p class="empty">No Book is Available!</p>';
 }



}
}









?>