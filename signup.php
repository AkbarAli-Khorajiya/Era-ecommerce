<?php  include "includes\header.php"; ?>
<!-- end header section -->
<?php 
   if (isset($_POST['submit'])) {

      $alert = $obj->signup($_POST); 

   }   
?>

<section class="why_section layout_padding">
         <div class="container">
         
         <div class="main-row">
                  <div class="signup">
                     <h1>SignUp</h1>
                     <?php echo $alert;?>
                     <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <fieldset>
                           <input type="text" placeholder="Enter your full name" name="fname" required />
                           <input type="email" placeholder="Enter email address" name="email" required />
                           <input type="password" placeholder="Enter password" name="password" required />
                           <input type="password" placeholder="Enter password" name="cpassword" required />
                           <input type="submit" value="Submit" name="submit"/>
                        </fieldset>
                     </form>
                  </div>
            </div>

            <!-- <div class="row">
               <div class="ol-md-6 offset-lg-2">
                  <div class="signup">
                     <h1>SignUp</h1>
                     <form action="index.html">
                        <fieldset>
                           <input type="submit" value="Submit" />
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div> -->
         </div>
      </section>