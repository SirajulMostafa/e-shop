  <?php
       $category_table = "SELECT *FROM category where parent =0";
       $categories = mysqli_query($db, $category_table);
       
       //for brand
       $brand_table = "SELECT *FROM brands";
       $brands = mysqli_query($db, $brand_table);

   ?>

 <!--left side category -->
<div class=" col-md-2  " style="padding-left: 0px;padding-right: 0px;"><h4 class="text-center" style="color:#BED2CB;">Follow Us</h4>
 <hr>
 <div class="nav" style="padding-bottom:10px">
   <ul class="social text-center" style=" list-style: none;">
      <li> <a href="#"> <i class="fa fa-facebook">   </i> </a> </li>
       <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
        <li> <a href="#"> <i class="fa fa-google">   </i> </a> </li>
         <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
       </ul>
    </div>

<!--==========brand==========-->

     <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary " style="border: none;
;border-radius: none;box-shadow:none;">
        <div class="panel-heading panel-bg-change">
          <h3 class="panel-title">BRAND</h3>
          <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
        </div>
        <div class="panel-body" style="display: none;">

             <ul class="nav">
              <?php foreach ($brands as $brand): ?>
            <li><a href="brand.php?brand=<?=$brand['id']?>"><?= $brand['brand'] ?></a></li>

            <?php endforeach ?>
           
            <li><a href="#">One more separated link</a></li>
          </ul>
          

        </div>
      </div>
    </div>
  </div>
<!--/============brand===========-->

 <?php foreach ($categories as  $parent_cat):
                 $parent_id = $parent_cat['id'];
                 $childSql = "SELECT *FROM category where parent ='$parent_id'";
                 $childs = mysqli_query($db, $childSql);

                   ?>
    
    <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary  " style="border: none;
;border-radius: none;box-shadow:none;">
        <div class="panel-heading  " style=" background: #F0D22C;">
          <h3 class="panel-title"><?= ucfirst($parent_cat['category'] )  ;?></h3>
          <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
        </div>
        <div class="panel-body" style="display: none;">

             <ul class="nav">
              <?php foreach ($childs as $child): ?>
            <li><a href="category.php?category=<?=$child['id'] ?>"><?= $child['category'] ?></a></li>

            <?php endforeach ?> 
           
            <li><a href="category.php?parent-category=<?=$parent_id ?>">One more separated link</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>

     <?php endforeach ?>
  
</div><!--./left side category col-md-2 -->
