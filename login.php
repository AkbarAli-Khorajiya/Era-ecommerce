<?php 
session_start();
if(isset($_SESSION['user_email']))
{
   header('location:index.php');
   exit();
}

include "includes\header.php"; ?>
<?php 

   if (isset($_POST['submit'])) {

      $alert = $obj->login($_POST); 

   }   
?>

<!-- end header section -->

<section class="why_section layout_padding">
    <div class="container">

        <div class="main-row">
            <div class="">
                <div class="login">
                    <h1>LogIn</h1>
                    <?php echo $alert;?>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <fieldset>
                            <input type="email" placeholder="Enter email address" name="email" required />
                            <input type="password" placeholder="Enter password" name="password" required />
                            <br>
                            <div class="row">
                                <div class="col-md-6"><a href="">Forget password?</a></div>
                                <div class="col-md-6"><a href="signup.php">Don't have an account? Sign Up</a></div>
                            </div>
                            <br>
                            <input type="submit" value="Submit" name="submit" />

                            <!-- <p class="text-center"><a href="">Forget password?</a></p>

                           <div class="text-center"><a href="signup.php">Don't have an account? Sign Up</a></div> -->
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
   document.querySelector('#login').classList.add('active');  
   document.querySelector('#home').classList.remove('active');  
</script>

</body>

</html>