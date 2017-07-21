<?php 
require_once '../functions/define.php';
require_once '../core/init.php';
require_once('../helpers/helper.php');
?>

<?php 
      $errors = array();
      //$email = ((isset($_POST['email']))?$_POST['email']:'');
      $email = ((setPost('email'))? post('email'):'');
      $email = trim($email);//blank speace remove
      $password = ((isset($_POST['password']))?$_POST['password']:'');
      $password =  trim($password);


 ?>



   <?php

   if(setPostEqual('submit','submit')){
      if(empty(post('email'))||empty(post('password'))){
                  $errors[] ='You must provide email & password';
        }
          //validate email
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
              $errors[] = 'You must enter a valid email!';
               }
               //if password is morethan 6 characters
                if(strlen($password) < 6){
                    $errors[] = 'Password must be at least 6 characters!';
                }
        //chek if email exist in datbase
        $user_qry ="SELECT * FROM users WHERE email='$email' ";
        $user_db_con = mysqli_query($db,$user_qry);
         $user = mysqli_fetch_assoc($user_db_con);   
         //var_dump($user) ;
        $user_count = mysqli_num_rows($user_db_con );
      
       if ($user_count<1){
          $errors[] .='You must provide email does not exist database';
         }
         //varify password
         if(!password_verify($password,$user['password'])){
                $errors[] .=' wrong password !!!!' ;
                }
              
       //check for errors
       if (!empty($errors)){
       // echo  display_errors($errors);
         echo  $errors[] .= display_errors($errors);

       }
        else {
            //log in
            //echo'login success';
            $user_id = $user['id'];
            login($user_id);//function from helpers/helper.php

              }
        }//end if $_POST
        ?>
        
<!-- ====================== header.php=========================== -->
<?php include'inc/log_reg_header.php' ?>
<!-- ====================== ./header.php=========================== -->

<!-- ====================== register.php=========================== -->
<style> body{
        background-color:;
    }</style>
<div class="row" style="padding-top: 150px;"> 
<div class="col-md-4 col-md-offset-4">

<div class="box box-warning">
        <div class="box-header with-border">
        <h1> <span class="glyphicon glyphicon-user">  Login</span></h1>
        </div>

        <div class="box-body">
           <form class="form-signin" action="#" method="post"> 
           
            <div class="form-group">
             <label for="inputText" class="sr-only">Username</label>
             <input type="email" id="email" name="email" class="form-control" value="<?= $email; ?>" placeholder="Email">
              </div>
              
              <div class="form-group">
              <label for="inputPassword" class="sr-only">Password</label>
           <input type="password"  name="password" class="form-control" value="<?= $password; ?>">
          </div>

           <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <input  type="submit" name="submit" value="submit" class="btn btn-lg btn-primary btn-block">

          </form>


        </div>
    </div>


    <!-- /.box-->
    </section>
</div>
</div>
</div>

<!-- ====================== ./register.php=========================== -->

<!-- ====================== footer.php=========================== -->
<?php include'inc/log_reg_footer.php' ?>
<!-- ====================== ./footer.php=========================== -->

           