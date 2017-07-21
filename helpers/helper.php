<?php
function display_errors($errors){
    $display= '<div class="alert text-danger bg-danger alert-dismissable">'.
    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.
                   '<h4><i class="icon fa fa-ban"></i> Alert!</h4>'.'<ul>';

    foreach ($errors as $error){
        $display.='<li>'.$error.'</li>';
    }
    $display.="</ul>"."</div>";
    return $display;
}

function display_success_msg($msg){

    $display_success_msg= '<div class="alert text-success bg-success alert-success">'.
    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.
        '<h4><i class="icon fa fa-ban"></i> Alert!</h4>'.$msg;
    $display_success_msg.="</div>";
    return $display_success_msg;
}

function money($number){
    return'TK. '.  number_format($number,2);

}
function login($user_id){
    $_SESSION['SBUser'] = $user_id;

    global $db ;
   $date = date("Y-m-d H:i:s");
   //echo var_dump($db);
   // die();
    $sql ="UPDATE users SET last_login='$date' WHERE id='$user_id' ";
    mysqli_query($db, $sql);

    $_SESSION['success_flash'] = 'You are log in';
    header('Location: index.php');
}
//logout
function logout(){
   unset($_SESSION['SBUser'])  ;
   session_destroy();
}


function is_logged_in(){

    if(isset($_SESSION['SBUser']) && $_SESSION['SBUser']>0){
        return true;
    }
 else {
        return false;
    }
}

function login_error_redirect($url = 'login.php'){

 $_SESSION['error_flash'] = 'you must be loged in  to access that page';
 header('Location: '.$url);
}

function permission_error_redirect($url = 'login.php'){
    //global $user_data;
    $_SESSION['error_flash'] = 'you do not permisson to access the page';
    header('Location: '.$url);
}

function has_permission($permission='admin'){
    global $user_data;
    $permissions = explode(',',$user_data['permissions']);
    if(in_array($permission, $permissions,true)){

        return true;

    }else {  return false;}
}

function pretty_date($date){
    return date("M d, Y h:i A",  strtotime($date));
    //A is for am pm
}
/*function get_category ($child_id){
    //this function include for parent child category for category.php
    global  $db;
    $id = $child_id;
    $sql= "SELECT p.id AS 'pid',p.category AS 'parent',c.id AS 'child' ,c.category AS 'child' FROM category c INNER JOIN category p ON c.parent = p.id WHERE c.id ='$id'";

    $query = mysqli_query($db,$sql);
    $category = mysqli_fetch_assoc($query);
    return $category;
}*/

function sanitize($dirty){

    return htmlspecialchars($dirty,ENT_QUOTES,"utf-8");

}
//not use yet
function post($posted_value){
    $posted_check  = sanitize($posted_value);
    $check_post = $_POST[$posted_check];
    return $check_post;
}

//not use yet
function get($get_value){
    $posted_value  = sanitize($get_value);
    $check_get = $_GET[$posted_value];
    return $check_get;

}
//not use yet
function setPost($posted_value){
    $posted_check = sanitize( $posted_value);
    $check_post = isset($_POST[$posted_check]);
    return $check_post ;

}
//not use yet
function setGet($get_value){
    $posted_value = sanitize($get_value);
    $check_get = isset($_GET[$posted_value]);
    return  $check_get;

}

//not use yet setGetEqual
function setGetEqual($get_value,$check_value){
    //if(isset($_GET['get_value']) && ($_GET['get_value']=='check_value'))
      $get =  sanitize($get_value);
      $check =  sanitize($check_value);
      $value =(isset($_GET[$get]) && ($_GET[$get]==$check));
      return $value;


}
function setPostEqual($post_value,$check_value){
    //if(isset($_POST['post_value']) && ($_POST['post_value']=='check_value'))
      $post =  sanitize($post_value);
      $check =  sanitize($check_value);
      $value =(isset($_POST[$post]) && ($_POST[$post]==$check));
      return $value;


}

//not use yet
function email_validation($darty_email){

  $check_email =filter_var($darty_email,FILTER_VALIDATE_EMAIL)  ;
  return $check_email;
}


//session_destroy();
?>
