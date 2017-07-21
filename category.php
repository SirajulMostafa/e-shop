
<?php include 'functions/define.php'; ?>
<?php include 'core/init.php'; ?>
<?php include 'helpers/helper.php'; ?>

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
       <!-- =============category.php========== -->

<?php
if (setGet('category')) {
    $category_id = (int)$_GET['category'];
    $sql = "SELECT  * FROM products WHERE feature = 1 AND category_id=$category_id  ORDER BY RAND() ";
    $results = mysqli_query($db, $sql);
    $count = mysqli_num_rows($results);
}

elseif(setGet('parent-category')) {
    $parent_category_id = (int)$_GET['parent-category'];

    $sql ="SELECT products.*,category,parent FROM category LEFT JOIN products ON category.id=products.category_id WHERE products.feature =1 AND category.parent =$parent_category_id ";

    $results = mysqli_query($db, $sql);
    $count = mysqli_num_rows($results);
   //die('skjcncks'. $count);
    if ($count !=0) {
    $results = mysqli_query($db, $sql);
 }

    /*$p_sql = "SELECT  * FROM category WHERE parent=$parent_category_id  ";
    $parent_results = mysqli_query($db, $p_sql);
    $count = mysqli_num_rows($parent_results);
    if ($count !=0) {

    foreach ($parent_results as $value) {
     $pid = $value['id'] ;
    $sql = "SELECT * FROM products WHERE category_id= $pid ";
    }
    $results = mysqli_query($db, $sql);
     $results = mysqli_query($db, $sql);
    //die('skjcncks');
    $count = mysqli_num_rows($results);
    echo "count=". $count;
    die('skjcncks');
 }//($count !=0)*/
  }//end setGet('parent-category')



  ?>

<div class=" col-md-8 col-sm-12">
<?php if ($count ==0): ?>

<h4 class="text-center" > Product By category  <hr></h4>

<div class="col-md-12">
<h2 class=" alert  bg-warning text-danger">
   No Product Available For this category
</h2>
</div>
<?php else: ?>
    <!-- BEGIN PRODUCTS -->
    <h4 class="text-center" > Product By category  <hr></h4>
<?php foreach ($results as  $result): ?>

        <?php $photos = explode(',',$result['img']) ; ?>
      <div class="col-md-4 col-sm-6 " style="height: ">
        <span class="thumbnail">
          <a href="details.php?cart_id=<?=$result['id']?>">
            <img style=" height: 200px;width: 180px;" src="<?= $photos[0] ; ?>" alt=".......">
          </a>
            <h5><?= $result['title']?></h5>
           <div class="ratings " style="color: #efa40d;">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </div>

            <div class="row">
              <div class="col-md-12  ">
                <p class="price">
                  <span style="color:orange"> <mark>Price: <?=money($result['price']) ?></mark>
                </span>
                 <span >
                   <mark style=" background-color: #f3f0f0;color: #bc1633;" >List: <del><?=money($result['list_price']) ?></del>
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


      <!-- =============./category.php========== -->

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
