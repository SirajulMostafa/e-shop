
<?php include 'functions/define.php'; ?>
<?php include 'core/init.php'; ?>
<?php include 'helpers/helper.php'; ?>



<?php
if (setGet('brand')) {
    $brand_id = (int)$_GET['brand'];
    $sql = "SELECT  * FROM products WHERE feature = 1 AND deleted!=0 AND brand_id=$brand_id  ORDER BY RAND() ";
    $results = mysqli_query($db, $sql);
    $count = mysqli_num_rows($results);
   
}else{
      header("Location:404.php");
    }

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
       <!-- =============brand.php========== -->

<div class=" col-md-8 col-sm-12">
<?php if ($count ==0): ?>

<h4 class="text-center" > Product By brand  <hr></h4>

<div class="col-md-12">
    <div class="alert  alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Sorry dear customer!</strong>
        <h3 class="text-center">No Product Available For this brand</h3>
        <h4 class="text-center" ><a href="<?= BASE_URL?>">Please try this link...</a></h4>
    </div>

</div>
<?php else: ?>

 <!-- BEGIN PRODUCTS -->
    <h4 class="text-center" > Product By brand  <hr></h4>
<?php foreach ($results as  $result): ?>
          <?php $photos = explode(',',$result['img']) ; ?>
      <div class="col-md-4 col-sm-6 ">
          <span class="thumbnail">
            <a href="details.php?cart_id=<?=$result['id']?>">
              <img style=" height: 200px;width: 180px;" src="<?= $photos[0] ; ?>" alt=".......">
            </a>
              <h4>Product Tittle</h4>
              <div class="ratings " style="color: #efa40d;">
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                  </div>
              <div class="row">
                  <div class="col-md-12  ">
                      <p><?= substr($result['description'],0,70).' ....' ?></p>
                  <p class="price">
                    <span style="color:orange"> <mark>Price: <?=$result['price'] ?></mark>
                  </span>
                   <span >
                     <mark style=" background-color: #f3f0f0;color: #99bcb5;" >List Price: <del><?=$result['list_price'] ?></del>
                     </mark>
                    </span>
                  </p>
                </div>
    <hr class="line">
                <div class="col-md-12  ">
                <a href="details.php?cart_id=<?=$result['id'] ?>">
                  <button class="btn  btn-info  pull-right" >
                    <span class="glyphicon glyphicon-shopping-cart">

                    </span>BUY NOW</button>
                  </a>
                </div>
              </div>
          </span>
        </div>

<?php endforeach ?>
<?php endif ?>


<!-- /BEGIN PRODUCTS -->
</div><!--/col-8-->


      <!-- =============./brand.php========== -->

<div class="col-md-2" style="padding-left: 0px;padding-right: 0px;"> <!--right side  -->
    <h4 class="text-center" > Quick Option  <hr></h4>

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
