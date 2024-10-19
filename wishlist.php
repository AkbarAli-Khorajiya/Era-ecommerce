<?php include "includes\header.php"; ?>

<?php

if(isset($_SESSION['user_email']))
{

    $p_id = $_GET['p_id'];
    $id = 0;
    if(isset($p_id))
    {

        echo $obj->add_wishlist($p_id);
    }
    if(isset($_SESSION['user_email']))
    {
        $id = $_SESSION['user_id'];   
    }
}
else{
    header('location:login.php');
}
?>

<div class="ord-container">
    <h1>WishList</h1>
    <table style="border-collapse:collapse;">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Product</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                echo $obj->list_wish($id);
            ?>
        </tbody>
    </table>
</div>


<!-- footer start -->
<?php include "includes/footer.php"; ?>
