



<?php include 'functions/define.php'; ?>
<?php include 'core/init.php'; ?>
<?php include 'helpers/helper.php'; ?>


<!-- shipping info functionality -->

    <!-- =============header.php========== -->
     <?php include_once ('inc/header.php'); ?>
      <!-- =============./header.php========== -->

    <!-- =============nav.php========== -->
     <?php include_once ('inc/nav.php'); ?>
      <!-- =============./nav.php========== -->

      <!-- =============jumbotron.php========== -->
     <?php include_once ('inc/jumbotron.php'); ?>
      <!-- =============./jumbotron.php========== -->

      <!-- =============container_head.php========== -->
     <?php include_once ('inc/container_head.php'); ?>
      <!-- =============./container_head.php========== -->

      <!-- =============left.php========== -->
     <?php include_once('inc/left.php') ?>
      <!-- =============./left.php========== -->
       <!-- =============thankyou.php========== -->


<?php if ( isset($_GET['cart_id_token']) ): ?>
<?php $cart_id_token = (int)$_GET['cart_id_token']?>

       <div class="col-md-8" style="padding:50px; margin-top:50px">
       	<div class="row" >
               <div class="jumbotron" >
                   <h1 class="text-center" style="color:#F89406;">! Thank You  Dear Customer!</h1>
                   <h2 style="color:#19B5FE;" class="text-center">For support us </h2>
                    <h1 style="color:#19B5FE;"></h1>
                   <center><div class="btn-group" style="margin-top:50px;">
                       <a href="index.php" class="btn btn-lg btn-primary">Back Home</a>
                       <a href="thankyou.php?cart_details_id=<?=$cart_id_token ?>" class="btn btn-lg btn-info">Visit Your shipping details</a>

                   </div></center>
               </div>
       	</div>
       </div>
     <?php elseif(isset($_GET['cart_details_id'])): ?>

    
       <?php 
       $cart_details_id = $_GET['cart_details_id'];
      // echo $cart_details_id ;//die; 
        $tran = $db->query("SELECT * FROM transactions WHERE cart_id='{$cart_details_id}' ");
        $row= mysqli_fetch_assoc($tran );
        //var_dump($rows);
       // die;

     
          $email = $row['email'];
        

          $country = $row['country'];

          
          $street1 = $row['street1'];

          
          $street2 = $row['street2'];
         
          
           $city = $row['city'];
        
          $full_name = $row['full_name'];

          
          $tax = $row['tax'];

          
          $sub_total = $row['sub_total'];

          
          $grand_total = $row['grand_total'];

     

        ?>
      <div class="col-md-8" style="padding:30px; ">
       	<div class="row" >
               <div class="jumbotron">

                 <center>
                   <div class="btn-group "  >
                   <h2 style="color:#B39675E6;"> Your Information</h2>
                    <h1 style="color:#19B5FE;"></h1>

                   <address class="address" >

                     <h5 style="color:#19B5FE; font-style: italic;font-size: 20px;">
                     Username:<?=$full_name .'<hr>'?>
                     Email:<?=$email.'<hr>' ?>
                     city:<?=$city.'<hr>' ?>
                     street1:<?=$street1 .'<hr>'?>
                     street2:<?=$street2 .'<hr>'?>
                     </h5>

                   </address>
                   <p>
                   <span class="price">
                    <?= "Tax  is $tax  the total price without tax is $sub_total  And the total cost for your shopping is $grand_total "?> 

                   </span>
                   </p>
   <p style="color: #BCCED7;background-color: #248c9e;">Please Check your email we send you a email </p>

                    <h1 style="color:#19B5FE;">Thank  You Again!</h1>


                   </div></center>

               </div>
       	</div>
       </div>


     <?php endif; ?>












      <!-- =============./thankyou.php========== -->

      <div class="col-md-2" style="padding-left: 0px;padding-right: 0px;"> <!--right side  -->

         <!-- =============quick-cart.php========== -->
         <?php include_once('inc/quick-cart.php') ?>
          <!-- =============./quick-cart.php========== -->

        <!-- =============recent.php========== -->
         <?php include('inc/recent.php') ?>
          <!-- =============./recent.php========== -->

    </div><!--/right side  -->

     <!-- =============container_footer.php========== -->
     <?php include_once ('inc/container_footer.php'); ?>
      <!-- =============./container_footer.php========== -->

 <!-- =============footer.php========== -->
         <?php include('inc/footer.php') ?>
  <!-- =============recent.php========== -->
