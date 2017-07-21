
<?php
require_once '../functions/define.php';
require_once '../core/init.php';
require_once('../helpers/helper.php');
?>
<?php if (!is_logged_in()){

   // login_error_redirect();
   header('Location: login.php');
} ?>


<?php //echo $_SESSION['SBUser']; die(); ?>

<!-- ====================== header.php=========================== -->
<?php include'inc/header.php' ?>
<!-- ====================== ./header.php=========================== -->

<!-- ====================== index.php=========================== -->

     <section class="content-header">
      <h1> Dashboard </h1><br>
    </section>
<?php include 'count.php'; ?>


 <?php //endif ?>
 <?php echo flash() ;?>

 <!-- ================oreder.php ==================-->
  <?php include_once'order.php'; ?>
 <!-- ================oreder.php ==================-->
<!-- ====================== ./index.php=========================== -->

<!-- ====================== footer.php=========================== -->
<?php include'inc/footer.php' ?>
<!-- ====================== ./footer.php=========================== -->
