<footer>
   <section class="box-container">
      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"><i class="fas fa-angle-right">home</i></a>
         <a href="about.php"><i class="fas fa-angle-right">about</i></a>
         <a href="shop.php"><i class="fas fa-angle-right">shop</i></a>
         <a href="contact.php"><i class="fas fa-angle-right">contact</i></a>
      </div>

      <div class="box">
         <h3>quick links</h3>
         <a href="orders.php"><i class="fas fa-angle-right">orders</i></a>
         <a href="cart.php"><i class="fas fa-angle-right">cart</i></a>
         <a href="wishlist.php"><i class="fas fa-angle-right">wishlist</i></a>
         <a href="login.php"><i class="fas fa-angle-right">login</i></a>
      </div>

      <div class="box">
         <h3>contact info</h3>
         <a href="tel:1234567890"><i class="fas fa-angle-right"></i>+123-456-7890</a>
         <a href="tel:1112223344"><i class="fas fa-angle-right"></i>+111-222-3344</a>
         <a href="mailto:admin@gmail.com"><i class="fas fa-envelope"></i>admin@gmail.com</a>
         <a href="https://www.google.com/myplace"><i class="fas fa-map-market-alt">Bidar, India-400104</i></a>
         
      </div>

      <div class="box">
         <h3>Follow us</h3>
         <a href="#"><i class="fab fa-facebook"></i>orders</a>
         <a href="#"><i class="fab fa-twitter"></i>cart</a>
         <a href="#"><i class="fab fa-instagram"></i>instagram</a>
         <a href="#"><i class="fab fa-youtube"></i>youtube</a>
      </div>

   </section>


</footer>





<?php

include 'components/connect.php';



if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quick view</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   


<section class="quick-view">
<?php include 'components/user_header.php'; ?>
   <h1 class="heading">quick view</h1>

   <?php
     $pid = $_GET['pid'];
     $select_products = $conn->prepare("SELECT * FROM `products` WHERE pid = ?"); 
     $select_products->execute([$pid]);
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input  name="pid" value="<?= $fetch_product['pid']; ?>">
      <input  name="name" value="<?= $fetch_product['name']; ?>">
      <input  name="price" value="<?= $fetch_product['price']; ?>">
      <input  name="image" value="<?= $fetch_product['image_01']; ?>">
      <div class="row">
         <div class="image-container">
            <div class="main-image">
               <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
            </div>
            <div class="sub-image">
               <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
               <img src="uploaded_img/<?= $fetch_product['image_02']; ?>" alt="">
               <img src="uploaded_img/<?= $fetch_product['image_03']; ?>" alt="">
            </div>
         </div>
         <div class="content">
            <div class="name"><?= $fetch_product['name']; ?></div>
            <div class="flex">
               <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
               <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
            <div class="details"><?= $fetch_product['details']; ?></div>
            <div class="flex-btn">
               <input type="submit" value="add to cart" class="btn" name="add_to_cart">
               <input class="option-btn" type="submit" name="add_to_wishlist" value="add to wishlist">
            </div>
         </div>
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>