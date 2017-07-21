
<?php include 'functions/define.php'; ?>
<?php include 'core/init.php'; ?>
<?php include 'helpers/helper.php'; ?>
<?php
if (setGet('cart_id') && !empty(get('cart_id'))) {
 $product_id =get('cart_id');

$query_cart_id = $db->query("SELECT * FROM products WHERE id ='{$product_id}'");

 $result_cart_id = mysqli_fetch_assoc($query_cart_id);
 $title = $result_cart_id['title'] ;
 $price = $result_cart_id['price'] ;
 $list_price = $result_cart_id['list_price'] ;
 $description = $result_cart_id['description'] ;
 //$details_photo = explode(',',$result_cart_id['img']) ;

//var_dump($details_photo[0]);
//die();


}


 ?>


 <!-- add to cart the terget product -->
<?php

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
    //header('Location: brand.php');
    header('Location: mycart.php');

}
?>



<!-- ./add to cart -->


<!-- add to cart the terget product -->
<?php
/*
//net e param option e gele POST  er variable gula dekha jabe
if($_POST){
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

   $previous_items = json_decode($cart['items'],true);//indexing by ,

   $item_match = 0;
   $new_items = array();
   foreach ($previous_items as $pitem) {
    //have to change here check item size
      if($item[0]['id']==$pitem['id'] //&& ($item[0]['quantity'] !=$pitem['quantity'])){

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
    header('Location: mycart.php');
    //header('Location: mycart.php');

}  */
?>


<!-- ./add to cart the terget product -->



<?php
    //for recent product
    /*$sql = "SELECT  * FROM products WHERE feature = 1 ORDER BY RAND() LIMIT 12 ";
    $results = mysqli_query($db, $sql);*/

    ?>

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

<section>

    <div class=" col-md-8  col-sm-12">
     <h4 class="text-center">Product Details</h4><hr>
     <div class="col-md-5  col-sm-12 thumbnail  " style="margin-top: 10px;">
       <div class="fotorama "  data-nav="thumbs"  data-allowfullscreen="native">

     <?php $details_photos = explode(',',$result_cart_id['img']) ; ?>
     <?php foreach ($details_photos as $details_photo): ?>

      <img  style="height: 570px " src="<?= $details_photo?>" alt="blog test c" class="img-responsive " title="" rel="lightbox" width="" height="">
      <?php endforeach ?>
      </div>
         </div>

         <div class="col-md-6  col-sm-12">
            <h4 class="text-center"><?=$title ?></h4>
          <p>
          <?= $description?>
            <br>
         </p>
         <div class="col-md-12  ">

             <h6 style="padding-left:40px "><br>
             <span  style="color:red ; " class="">Our Price:TK. <?=$price ?></span>
            <span> Price:TK. <?=$list_price ?></span>
             </h6><br>


          </div>

     </div><!--/row col-md-4-->


<!-- style="border: 1px solid#f3eeee;-->
   <div class="col-md-6  col-sm-12 " ><!--cart wrap-->

      <form action="" method="post" accept-charset="utf-8" class="form-horizontal" data-parsley-validate >
        <div class="form-group ">
          <label for="qty" class="control-label col-sm-2">Quantity<sup><span>*</span></sup></label>
          <div class="col-sm-10">
          <input type="number" class="form-control" id="qty"
             name="quantity"
            value="" data-parsley-required="true" data-parsley-type="number"  data-parsley-min="1">
          </div>
        </div>
        <input name="product_id"  value="<?=$product_id ?>" type="hidden">
        <input name="title" value="<?=$title ?>" type="hidden">

        <div class="form-group">
          <div class="col-md-offset-6">
            <input type="submit" class="btn btn-warning" name="submit" value="Add To Cart">
          </div>
        </div>
     </form>


</div><!--/cart wrap-->



  </div><!--/row col-md-8-->
  </section>

 <!-- =========================details.php================================= -->

      <div class="col-md-2" style="padding-left: 0px;padding-right: 0px;"> <!--right side  -->
 <h4 class="text-center" style="color:#BED2CB;"> Quick Option<hr></h4>
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
