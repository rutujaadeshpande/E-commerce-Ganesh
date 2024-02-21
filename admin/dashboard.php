<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">
   
   <style>
        body {
            background-image: url('https://imgcdn.floweraura.com/marble-divine-ganesha-murti-9867877gf-AA.jpg');
            background-size: cover; /* or 'contain' for different scaling */
            background-repeat: no-repeat;
            
            /* Optional: add other styles like background-color, text color, etc. */
        }
    </style>
      
    
</head>
<body>

<?php include '../components/admin_header.php'; ?>



<section class="dashboard">
   <div class="box-cointainer">

   <h1 class="heading">Welcome</h1>
   <h3>Ganesha (also Ganesa or Ganapati) is one of the most important gods in Hinduism. Ganesha is easily recognized with his elephant head and human body, representing the soul (atman) and the physical (maya). Ganesha is the patron of writers, travellers, students, and commerce, and he removes obstacles blocking new projects. The deity is fond of sweets, to the slight detriment of his figure.

Ganesha is also worshipped as a principal deity in both Jainism and Buddhism. For the Ganapatya Hindu sect, Ganesha is the most important deity.</h3>


      <div class="box-container"></div>

      <div class="box">
         <h3>welcome!</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn">update profile</a>
      </div>

      <div class="box">
         <?php
            $select_orders = $conn->prepare("SELECT * FROM `orders`");
            $select_orders->execute();
            $number_of_orders = $select_orders->rowCount();
         ?>
         <h3><?= $number_of_orders; ?></h3>
         <p>orders placed</p>
         <a href="placed_orders.php" class="btn">see orders</a>
      </div>


      <div class="box">
         <?php
            $select_products = $conn->prepare("SELECT * FROM `product`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount();
         ?>
         <h3><?= $number_of_orders; ?></h3>
         <p>product added</p>
         <a href="products.php" class="btn">see products</a>
      </div>

      <div class="box">
         <?php
            $select_users = $conn->prepare("SELECT * FROM `users`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount();
         ?>
         <h3><?= $number_of_users; ?></h3>
         <p>user accounts</p>
         <a href="user_accounts.php" class="btn">see users</a>
      </div>
<!--
      <div class="box">
         <?php
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $number_of_admins = $select_admins->rowCount();
         ?>
         <h3><?= $number_of_admins; ?></h3>
         <p>admins accounts</p>
         <a href="admin_accounts.php" class="btn">see admins</a>
      </div>

      
</section>

      -->

<script src="../js/admin_script.js"></script>
   
</body>
</html>