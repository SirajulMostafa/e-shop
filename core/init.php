
<?php
$host= "localhost";
 $password="sirajul@@mostafa";
  $user="root";
 $database= "id1232644_ecm_project1";
 //$con = mysqli_connect($host, $user, $password, $database, $port, $socket);
 $db= mysqli_connect($host,$user, $password, $database);
//mysqli_close($link);

 if(mysqli_connect_error()){
    echo 'Database connection faild with following errors:'.  mysqli_connect_error();

     die();

 }
session_start();
  //require_once $_SERVER['DOCUMENT_ROOT'].'/e-shop/config.php';

 $cart_id  = '';
 if(isset($_COOKIE[CART_COOKIE])){
    //this COOKIE is define in define.php page
     //id comes from databse but in this case this code goes to the add_cart.php
     $cart_id = (int)$_COOKIE[CART_COOKIE];
 }

if(isset($_SESSION['SBUser'])){
//$_SESSION['SBUser'] is set id from users table in login page
   $user_id = $_SESSION['SBUser'];
   //echo "string".$user_id;  die;
     $query = $db->query("SELECT * FROM users WHERE id ='$user_id'");
     $user_data = mysqli_fetch_assoc($query);

     $fn = explode(' ', $user_data['full_name']);
     $user_data['first'] = $fn[0];
      $user_data['last'] = $fn[1];
    $email =  $user_data['email'] ;
 }



 /*if(isset($_SESSION['success_flash'])){

     echo '<div class="bg-success"><p class="text-success text-md-center">'.$_SESSION['success_flash'].'</p>';
     unset($_SESSION['success_flash']);
     }

     if(isset($_SESSION['error_flash'])){

     echo '<div class="bd-danger"><p class="text-danger text-md-center">'.$_SESSION['error_flash'].'</p>';
     unset($_SESSION['error_flash']);
     }*/


function flash(){
    if(isset($_SESSION['error_flash'])){
     $flash='<div class="bg-danger"><p class="text-danger text-md-center">'.$_SESSION['error_flash'].'</p>'.'</div>';
     unset($_SESSION['error_flash']);
     }
     if(isset($_SESSION['success_flash'])){

     $flash='<div class="bg-success text-center" style="padding:20px"><h class="text-success text-md-center">'.$_SESSION['success_flash'].'</p>'.'</div>';
     unset($_SESSION['success_flash']);
     }
     /*if(isset($_SESSION['success_msg'])){
     $flash='<div class="bg-success"><p class="text-success text-md-center">'.$_SESSION['success_msg'].'</p>'.'</div>';
     unset($_SESSION['success_msg']);
     }*/


     else{
        $flash='';
     }

    return $flash;
}

    //session_destroy();

