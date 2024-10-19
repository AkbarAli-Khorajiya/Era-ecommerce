<?php include "includes\header.php"; ?>

<?php
    $p_id = $_GET['p_id'];
    $id = 0;
    if(isset($_SESSION['user_email']))
    {
        $id = $_SESSION['user_id'];   
    }
?>

<div class="container mb-3" style="margin-top:80px">
    <?php
        echo $obj->product_detail($p_id);
    ?>
</div>

<script>
    function im1() {
        document.querySelector('#im1').requestFullscreen();       
    }
    function im2() {
        document.querySelector('#im2').requestFullscreen();       
    }
    function im3() {
        document.querySelector('#im3').requestFullscreen();       
    }
</script>

<!-- footer start -->
<?php include "includes/footer.php"; ?>
