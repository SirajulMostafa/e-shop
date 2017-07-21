

<?php include 'functions/define.php'; ?>
<?php include 'core/init.php'; ?>
<?php include 'helpers/helper.php'; ?>

<!-- shipping info functionality -->

<?php
  $amount_for_transaction = 0;
  $tax = 0;
  $sub_total = 0;
  $grand_total = 0;
if ($cart_id != '') {
    $cartQ = $db->query(" SELECT * FROM cart WHERE id = '{$cart_id}'");
    $result = mysqli_fetch_assoc($cartQ);
    $item = json_decode($result['items'], true);
    $i = 1;
    $sub_total = 0;
    $item_count = 0;


?>
<?php  foreach ($item as $value): ?>

   <?php
     $product_id = $value['id'];
      $productQ = $db->query("SELECT * FROM products WHERE id='{$product_id}'");
      $product = mysqli_fetch_assoc($productQ);

      $item_count+=$value['quantity'];
      $sub_total += ($product['price'] * $value['quantity']);

     ?>

     <?php endforeach ?>

     <?php

          $taxrate = TAXRATE;
          $tax =  $taxrate * $sub_total;
          $amount_for_transaction =$tax+$sub_total;
          $transaction_charge =  $amount_for_transaction*TRANSACTION_RATE;
          $grand_total = $transaction_charge + $amount_for_transaction;//totalamount and charge of that amount

          }

       ?>



<?php
if ($_POST) {

  $full_name =$_POST['full_name'];
  $email = $_POST['email'];
  $name_on_cart = $_POST['name_on_cart'];
  $street1 = $_POST['street1'];
  $street2 = $_POST['street2'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $zip_code = $_POST['zip_code'];
  $country = $_POST['country'];
  $total_tax = $_POST['tax'];
  $sub_total = $_POST['sub_total'];
  $grand_total = $_POST['grand_total'];
  $cart_id = $_POST['cart_id'];
  $charge_id = $_POST['charge_id'];
  $charge_amount = $_POST['charge_amount'];
 $transaction_type='Paypal';
 $cart_id_token  = $cart_id;

$db->query("UPDATE cart SET paid = 1 WHERE id='{$cart_id}' ");

$db->query(" INSERT INTO transactions
  (charge_id ,cart_id, full_name, email, street1, street2, city, state,zip_code, country, sub_total, tax, grand_total, transaction_type,name_on_cart)
  VALUES('$charge_id','$cart_id','$full_name','$email','$street1','$street2'
,'$city','$state','$zip_code','$country','$sub_total','$total_tax','$grand_total','$transaction_type','$name_on_cart') " );

/*var_export($a);
die;*/
$domain = ($_SERVER['HTTP_HOST'] !='localhost')?'.'.$_SERVER['HTTP_HOST']:false;
setcookie(CART_COOKIE,'',1,"/",$domain,false);
header('Location: thankyou.php?cart_id_token='.$cart_id_token) ;

}


 ?>




<!-- ./shipping info functionality -->


    <!-- =============header.php========== -->
     <?php include_once ('inc/header.php'); ?>
      <!-- =============./header.php========== -->

    <!-- =============nav.php========== -->
     <?php include_once ('inc/nav.php'); ?>
      <!-- =============./nav.php========== -->

      <!-- =============jumbotron.php========== -->
      <div style="padding-top: 50px"></div>
     <?php //include_once ('inc/jumbotron.php'); ?>
      <!-- =============./jumbotron.php========== -->

      <!-- =============container_head.php========== -->
     <?php include_once ('inc/container_head.php'); ?>
      <!-- =============./container_head.php========== -->

      <!-- =============left.php========== -->
     <?php include_once('inc/left.php') ?>
      <!-- =============./left.php========== -->

<!-- =================================details.php==========================-->
     <?php //include_once('inc/details.php') ?>

<div class=" col-md-8 " style="padding-left: 30px;">
     <h4 class="text-center bg-info" style="padding: 10px">Shipping Information :</h4>

   <div class=" col-md-12 well well-lg" style=" ">
        <form class="" action="customer-cart-info.php" method="post" data-parsley-validate >
            <span class="text-md-center bg-danger" id="payment-errors"></span>
                    <h4 >Address:</h4> <hr>
                <div class="form-group col-md-6">
                    <label for="full_name">Full Name:</label>
                        <input class="form-control" id="full_name" name="full_name" type="text"  data-parsley-required="true">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Email:</label>
                                <input class="form-control" id="email" name="email" type="email"  data-parsley-required="true">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="street1"> Street Address1:</label>
                                <input class="form-control" id="street1" name="street1" type="text"  data-parsley-required="true">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="street2">Street Address2:</label>
                                <input class="form-control" id="street2" name="street2" type="text"  data-parsley-required="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="state">State:</label>
                                <input class="form-control" id="state" name="state" type="text"  data-parsley-required="true">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="city">City:</label>
                                <input class="form-control" id="city" name="city" type="text"  data-parsley-required="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="zip_code">Zip Code:</label>
                                <input class="form-control" id="zip_code" name="zip_code" type="text"  data-parsley-required="true">
                            </div>

                             <div class="form-group col-md-6">
                                <label for="country">Country:</label>
                                <input class="form-control" id="country" name="country" type="text"  data-parsley-required="true">
                            </div>
                            <h4>Cart information:</h4><hr>

                           <div class="form-group col-md-3">
                             <label for="name"> Name on Cart:</label>
                             <input id="name" name="name_on_cart" class="form-control" type="text"  data-parsley-required="true">
                           </div>
                           <div class="form-group col-md-3">
                             <label for="number">  Cart Number:</label>
                             <input id="number" class="form-control" type="text"  data-parsley-required="true">
                           </div>


                             <input type="hidden" name="charge_id" value="<?=TRANSACTION_CHARGE_ID?>">
                             <input type="hidden" name="charge_amount" value="<?=  $amount_for_transaction ;?>">
                             <input type="hidden" name="cart_id" value="<?=$cart_id ?>">
                             <input type="hidden" name="tax" value="<?= $tax ?>">
                             <input type="hidden" name="sub_total" value="<?= $sub_total ?>">
                             <input type="hidden" name="grand_total" value="<?= $grand_total ?>">


                         <button type="submit" class="btn btn-primary pull-right " name="submit">
                         <i class=" glyphicon glyphicon-shopping-cart"></i> Check Out </button>


        </form>

     </div>


</div><!--/row col-md-8-->


 <!-- =========================details.php================================= -->

    <div class="col-md-2" style="padding-left: 0px;padding-right: 0px;"> <!--right side  -->

         <!-- =============quick-cart.php========== -->
         <?php include_once('inc/quick-cart.php') ?>
          <!-- =============quick-cart.php========== -->

        <!-- =============recent.php========== -->
         <?php include('inc/recent.php') ?>
          <!-- =============./recent.php========== -->

    </div><!--/right side  -->

      <!-- =============container_footer.php========== -->
         <?php include('inc/container_footer.php') ?>
  <!-- =============container_footer.php========== -->

      <!-- =============footer.php========== -->
         <?php include('inc/footer.php') ?>
  <!-- =============./footer.php========== -->
