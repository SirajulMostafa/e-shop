<?php 
$sql = "SELECT * FROM category ";
$result = mysqli_query($db, $sql);  
//start
$errors = [];//to avoid undifine variables
$category = '';
$post_parent = '';
$parent_value = 0;
//$category_value = '';//use GET Method


if (isset($_POST) && !empty($_POST)) {
//for submit button check for insert
    $post_parent = $_POST['parent'];
    $category = $_POST['category'];
    $sqlform = "SELECT * FROM category WHERE category ='$category' AND parent ='$post_parent'";
   
      
    $fresult = mysqli_query($db, $sqlform);
    $count = mysqli_num_rows($fresult);
//if category is blank
    if ($category == '') {
        $errors[] .= 'The category  can not be left empty......';
    }
    //if exits in database 
    if ($count > 0) {
        $errors[] .= $category . 'already exits. please choose another category';
    }
  
   //Disply Errors or Update database   
    if (!empty($errors)) {
  //Disply Errors 
        //$display = display_errors($errors);
        $display = display_errors($errors);
  ?>

        <script>
            jQuery('document').ready(function () {
                jQuery('#errors').html('<?= $display; ?>');
            });
            
        </script>
    <?php
    } else {
        // update database

        $update_sql = "INSERT INTO category(category,parent)VALUES('$category','$post_parent')";
        // for edit update 
       /* if(isset($_GET['edit'])){
            $update_sql ="UPDATE category SET category='$category',parent='$post_parent' WHERE id='$edit_id'"; 
            
        }*/
        
        mysqli_query($db, $update_sql);
    }//end else
}//end og first isset
//end

 ?>

<div class="col-md-6 ">
        <!-- Form's col-->
        <?php $edit_id = 1; ?>
      <form class="form" action="index.php?<?= ((isset($_GET['edit']))?'edit='.$edit_id:'category=add'); ?>" method="post">
          <legend class="shadow"> <?= ((isset($_GET['edit'])) ? 'Edit' : 'Add'); ?> Category</legend> 
      <div id="errors"></div>
        <div class="form-group">
            <label for="parent">Parent</label>
            <select class=" form-control" name="parent" id="parent">
                <option value="0" <?=(($parent_value== 0)?' selected="selected"':'');?>>Parent</option>
                   <?php foreach ($result as  $parent): ?>
                        
                    <option value="<?= $parent['id']; ?>"<?=(($parent_value==$parent['id'])?' selected="selected"':'')?>><?= $parent['category']; ?></option>
                    <?php endforeach ?> 
            </select>

        </div>
        <div class="form-group ">
            <label for="category">Category</label> 

            <input type="text" class="form-control" id="category" name="category" value="<?= ((isset($_GET['edit'])) ? $category_value: ''); ?>">
        </div>

        <div class="form-group">

            <input class="btn  btn-success" value="AddCategory" type="submit">
        </div>
        </form>   

    </div>