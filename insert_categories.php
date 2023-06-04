<?php
include 'config.php';


session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['insert_cat']))
{  $category_title=$_POST['cat_title'];
     //select data from database
    $select_query="Select * from `categories` where category_title='$category_title'";
   $result_select=mysqli_query($conn,$select_query);
  
    $number=mysqli_num_rows($result_select);
    if($number>0)
    {
        echo "<script>alert('This Category has already been Added ')</script>";
    }
    else{
        $insert_query="insert into `categories` (category_title)values('$category_title')";
    $result=mysqli_query($conn,$insert_query);
    if($result)
    {
        echo"<script>alert('Category has been Inserted Successfully')</script>";

    }

    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Insert Categories</title>
     <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom admin css file link  -->
<link rel="stylesheet" href="css/admin_style.css">
</head>

<body>
<?php include 'admin_header.php'; ?>
<br><br>
<section class="add-products">
<h1 class="title">insert categories</h1>

<form action=""method="post">

<input type="text" name="cat_title" class="box" placeholder="Insert A Category" required>
 
  <input type="submit" value="Insert " name="insert_cat" class="btn">





</form>
</section>
<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>
</body>
</html>
