<?php include "includes\header.php"; ?>

<?php
    $id = 0;
    if(isset($_SESSION['user_email'])==1)
    {
        $id = $_SESSION['user_id'];   
    }
    if(isset($_SESSION['user_email'])==0)
    {
        header('location:login.php');
    }

?>

<div class="ord-container">
    <div class="container mt-5">
        <h1 class="ml-5 pl-5 mb-3">Ordered List :</h1>
        <?php
                echo $obj->list_orders($id);
            ?>
    </div>
</div>


<!-- footer start -->
<?php include "includes/footer.php"; ?>