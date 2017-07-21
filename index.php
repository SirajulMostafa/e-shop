
<?php  $ad=$_SERVER['DOCUMENT_ROOT'];?>
<?php include 'functions/define.php'; ?>
<?php include 'core/init.php'; ?>
<?php include 'helpers/helper.php'; ?>
    <!-- =============header.php========== -->
     <?php include_once ('inc/header.php'); ?>
      <!-- =============./header.php========== -->

    <!-- =============nav.php========== -->
     <?php include_once ('inc/nav.php'); ?>
      <!-- =============./nav.php========== -->
<?php if (setGet('currentpage')):?>
  <div style="padding-top: 50px"></div>
       <?php else:  ?>
      <!-- =============jumbotron.php========== -->
     <?php include_once ('inc/jumbotron.php'); ?>
     <?php endif ?>
      <!-- =============./jumbotron.php========== -->

      <!-- =============container_head.php========== -->
     <?php include_once ('inc/container_head.php'); ?>
      <!-- =============./container_head.php========== -->

      <!-- =============left.php========== -->
     <?php include_once('inc/left.php') ?>
      <!-- =============./left.php========== -->
       <!-- =============container.php========== -->
     <?php include_once('inc/product-home.php') ?>
     <?php //include_once('inc/product-home-bck.php') ?>
      <!-- =============./container.php========== -->

      <div class="col-md-2" style="padding-left: 0px;padding-right: 0px;"> <!--right side  -->

         <!-- =============quick-cart.php========== -->
         <h4 class="text-center" style="color:#BED2CB;"> Quick Option<hr></h4>
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
