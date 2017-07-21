

<?php include 'functions/define.php'; ?>
<?php include 'core/init.php'; ?>
<?php include 'helpers/helper.php'; ?>
<!-- ========================add to cart ========================-->

<!-- add to cart the terget product -->
<?php
/*
//net e param option e gele POST  er variable gula dekha jabe
if($_POST ){
 
//echo "string"
  $product_id = (int)$_POST['product_id'];
//$size = $_POST['size'];

$title = $_POST['title'];
//$available = $_POST['available'];
$quantity = $_POST['quantity'];
 $item = array();
  $item []= array(

    'id' =>$product_id,
    'title' =>$title,
    'quantity' =>$quantity,

    ) ;
//die();
$domain = ($_SERVER['HTTP_HOST'] !='localhost')?'.'.$_SERVER['HTTP_HOST']:false;
$query = $db->query("SELECT * FROM products WHERE id ='{$product_id}'");

$product = mysqli_fetch_assoc($query);

//$_SESSION['success_flash'] = $product['title'].'was Added to your cart.';
//$_SESSION['success_flash_msg'] = $product['title'].'was Added to your cart.';

//check to see if the cart cookie is exist cart_id = (int)$_COOKIE[CART_COOKIE];
//define in define.php set in init.php page store cookie as cart_id
if($cart_id !=''){

   $cartQ = $db->query("SELECT * FROM cart WHERE id ='{$cart_id}'") ;
    //echo $cart_id;
  //die();
   $cart = mysqli_fetch_assoc($cartQ);

   $previous_items = json_decode($cart['items'],true);
   //indexing by  true, true so instance of an object it will give a jnson object

   $item_match = 0;
   $new_items = array();
   foreach ($previous_items as $pitem) {
    //have to change here check item size
      if($item[0]['id']==$pitem['id'] ){

       //$pitem['quantity'] = $pitem['quantity'] + $item[0]['quantity'] ;
       //echo 'adasda';
        // die();
       //if($pitem['quantity'] > $quantity){
           $pitem['quantity'] = $quantity;

           $_SESSION['success_flash']="You are successfully update item of ".$pitem['title']."Quantity into your shipping basket";
      // }
       $item_match = 1;//mach hole + kore just quantity update korbe
      }
      $new_items[] = $pitem;
   }
   if($item_match !=1){
   $new_items = array_merge($item,$previous_items);
   }
   $item_json = json_encode($new_items);
   $cart_expire = date("Y-m-d H:i:s", strtotime("+30 days"));

$db->query("UPDATE cart SET items = '{$item_json}',expire_date = '{$cart_expire}' WHERE id ='{$cart_id}'");
  //unset the cookie first set the cookie
   //here second peramiter e blank string was given by cart_cookie
   // root derictory '/' thn domain
   $_SESSION['success_flash']="You are successfully add  Another item your shipping basket";
    setcookie(CART_COOKIE,'',1,"/",$domain,false);
    setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,'/',$domain,false);

   }else{
    // add the cart to the databse and set cookie

    $item_json = json_encode($item);
    $cart_expire = date("Y-m-d H:i:s", strtotime("+30 days"));

    $db->query("INSERT INTO cart (items,expire_date) VALUES('{$item_json}','{$cart_expire}')");

    $cart_id = $db->insert_id;//last insert id before this line

    setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE,"/",$domain,false);//security off here
     $_SESSION['success_flash']="You are successfully add item your shipping basket";
    }
    //$_SESSION['success_flash']='You are successfully added item into your shipping basket';
   // $_SESSION['success_flash_msg']='You are successfully added item into your shipping basket';
    header('Location: brand.php');
    //header('Location: mycart.php');

}*/
?>



<!-- ./add to cart -->
<!-- ======================== ./add to cart ========================-->




<?php
if ($cart_id != '') {
    $cartQ = $db->query(" SELECT * FROM cart WHERE id = '{$cart_id}'");
    $result = mysqli_fetch_assoc($cartQ);
    $item = json_decode($result['items'], true);
    //  var_dump($item);
    //die();
    $i = 1;
    $sub_total = 0;
    $item_count = 0;

}
?>

   <!-- =============header.php========== -->
     <?php include_once ('inc/header.php'); ?>
      <!-- =============./header.php========== -->

    <!-- =============nav.php========== -->

     <?php include_once ('inc/nav.php'); ?>
      <!-- =============./nav.php========== -->

      <!-- =============mycart.php========== -->
 <div style=" min-height: 60px"></div>
    <section class="col-md-12">

    <h1 class="text-center alert bg-success" style="background-color: #80b6ae;font-family:'Cookie', 'cursive';" >
    My Shopping Cart
</h1>
<?php if ($cart_id == ''): ?>

<div class="alert alert-dismissible alert-warning" >
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Warning!</h4>
  <p> Sorry no Item  is store on your shipping  cart</p>
</div>
<?php else: ?>
  <div class="success_flash"><?= flash();?></div>
<table class="table table-striped table-hover table-bordered table-responsive">
<?php  foreach ($item as $value): ?>
   <?php
     $product_id = $value['id'];
      $productQ = $db->query("SELECT * FROM products WHERE id='{$product_id}'");
      $product = mysqli_fetch_assoc($productQ);
       $photo = explode(',',$product['img']) ;

     ?>

        <thead style=" background-color: #e99210;color: #fff;">
            <tr>
                <th><span class="glyphicon glyphicon-shopping-cart text-info "></span></th>
                <th>Picture</th>
                <th>Items</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                    <td scope="row"><?php echo $i++ ?></td>
                    <td scope="row"><img width="60" height="60" src="<?= $photo[0] ?>" alt=""></td>
                    <td><?=$product['title'] ?>
                    <td ><span class="label label-success"><?= money($product['price']) ?></span></td>

                    <td ><span class="label label-warning"><?= $value['quantity'] ; ?></span></td>
                    <td style="background-color: #e1ddcd;"><mark><?= money($value['quantity'] * $product['price']) ?></mark></td>

                </tr>

          <?php
                $item_count+=$value['quantity'];
                $sub_total += ($product['price'] * $value['quantity']);
            ?>

           <?php endforeach ?>

           <?php

              $taxrate = TAXRATE;
              $tax_mult_sub_total =  $taxrate * $sub_total;
              $tax = $tax_mult_sub_total;
              $grand_total = $tax + $sub_total;
           ?>
                        </tbody>
    </table>

    <legend style="background-color: #c83d0f;
color: azure;"> Total:</legend>

    <table class="table table-striped table-hover table-bordered table-responsive">

        <thead style="background-color:#e7ae0c;color: azure;">
            <tr>

                <th >Total Quantity</th>
                <th>Sub Total</th>
                <th>TAXRATE</th>
                <th>TAX</th>
                <th>Grand Total</th>

            </tr>
        </thead>
        <tbody>
        <style>
            .label {font-size: 100%;}
        </style>
            <tr>
                <td>  <?= '<b>Total Qty:</b> '.$item_count; ?></td>
                <td> <span class=" label label-info"><?= money($sub_total ); ?></span> </td>
                <td> <span class=" label label-danger"><?='TK. '.$taxrate?></span> </td>
                <td> <span class="label label-success"><?= money($tax )?></span> </td>
                <td style="background-color: #e1ddcd;"><span class=" label label-warning"><?= money($grand_total); ?></span> </td>
            </tr>
        </tbody>
    </table>
    <a href="customer-cart-info.php">
     <button class="btn btn-success pull-right" type="button" >Shopping <span class="glyphicon glyphicon-hand-right"></span></button>
     </a>
  <?php endif ?>
      </section>
      <!-- =============./mycart.php========== -->
    <!-- =============container_head.php========== -->
     <?php include_once ('inc/container_head.php'); ?>
      <!-- =============./container_head.php========== -->
 <!-- =============container_footer.php========== -->
     <?php include_once ('inc/container_footer.php'); ?>
      <!-- =============./container_footer.php========== -->
   <!-- =============footer.php========== -->
         <?php include('inc/footer.php') ?>
  <!-- =============recent.php========== -->
