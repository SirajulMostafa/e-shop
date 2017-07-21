
<!--resigter form copy-->
<?php
require_once '../functions/define.php';
require_once '../core/init.php';
require_once('../helpers/helper.php');
?>

<?php

$hashed = $user_data['password'];
$old_password = ((isset($_POST['old_password']))?$_POST['old_password']:'');
$old_password =  trim($old_password);

$password = ((isset($_POST['password']))?$_POST['password']:'');
$password =  trim($password);
$confirm = ((isset($_POST['confirm']))?$_POST['confirm']:'');
$confirm =  trim($confirm);
$new_hashed = password_hash($password, PASSWORD_DEFAULT);
$user_id = $user_data['id'];
$errors = array();
?>


        <?php

        if($_POST){
            if(empty($_POST['old_password'])||empty($_POST['password'])||empty($_POST['confirm'])){
                $errors[] ='You must fill out all Field';
            }

            //if password is morethan 6 characters
            if(strlen($password) < 6){
                $errors[] = 'Password must be at least 6 characters!';

            }

            if(!hash_equals($password,$confirm)){
                $errors[] = 'the new Password & confirm passworddoes not match!';

            }

            if(!password_verify($old_password, $hashed)){
                $errors[] = 'old password does not on our recoreds';
            }

            //check for errors
            if (!empty($errors)){
                // echo  display_errors($errors);
                echo  $errors[] .= display_errors($errors);

            }
            else {

                $password_qry = "UPDATE users SET password = '$new_hashed' WHERE id ='$user_id'";
                mysqli_query($db, $password_qry);
                $_SESSION['success_flash'] = 'Your password has been updated !';
                header('Location: index.php');
            }
        }//end if $_POST
        ?>

<!-- ====================== header.php=========================== -->
<?php include'inc/log_reg_header.php' ?>
<!-- ====================== ./header.php=========================== -->

<!-- ====================== change_password.php=========================== -->





       <div class="row" style="padding-top: 40px;">
        <div class="col-md-6 col-md-offset-3">

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h1> <span class="glyphicon glyphicon-registration-mark">change password</span></h1>
                </div>
                <div class="box-body">
                    <form data-parsley-validate action="change_password.php" method="post">

                        <div class="form-group col-md-offset-3  col-md-6 ">
                            <label for="old_password">Password:</label>
                            <input id="old_password" type="password"  name="old_password" class="form-control" value="<?= $old_password; ?>">

                        </div>

                        <div class="form-group col-md-offset-3  col-md-6">
                            <label for="password"> New Password:</label>
                            <input id="password" type="password"  name="password" class="form-control" value="<?= $password; ?>">

                        </div>
                        <div class="form-group col-md-offset-3  col-md-6">
                            <label for="confirm">Confirm New Password:</label>
                            <input  data-parsley-equalto="#password" id="confirm" type="password"  name="confirm" class="form-control" value="<?= $confirm; ?>">

                        </div>

                        <div class="col-md-6  col-md-offset-3">
                            <div class="btn-group ">
                            <a href="<?= ADMIN_BASE_URL ?>">
                                <button class="btn btn-lg btn-warning" data-toggle="tooltip" title="Back ">
                                    <i class="fa fa-backward"></i><span> Back </span>
                                </button>
                            </a>
                            <button class="btn btn-lg btn-info " type="submit" name="submit" > <i class="fa fa-user"></i>Submit </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>






<!-- ====================== ./change_password.php=========================== -->

<!-- ====================== footer.php=========================== -->
<?php include'inc/log_reg_footer.php' ?>
<!-- ====================== ./footer.php=========================== -->
