<?php  include "includes\header.php"; ?>
<!-- end header section -->
<?php 
   if(!isset($_SESSION['user_email']))
   {
      header('location:login.php');
   } 
?>

<section class="buy">
    <div class="buy-page">
        <?php
            echo $obj->buy_details($_GET['p_id']);
        ?>
    </div>
</section>


<!-- footer start -->
<?php include "includes/footer.php"; ?>
