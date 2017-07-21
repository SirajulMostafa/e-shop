
<?php

    $sql = "SELECT  * FROM products WHERE feature = 1 AND deleted!=1  ORDER BY  RAND()  LIMIT 10";
    $results = mysqli_query($db, $sql);
    $count = mysqli_num_rows($results);

  ?>

<?php if ($count > 0): ?>

<div class="row" style="border: 1px solid#1071;"><!--right side option recent post-->
    <div class="col-md-12" style="padding-left: 2px; padding-right:2px ">

            <!-- Fluid width widget -->
          <div class="panel  panel-primary " style="border: none;border-radius:0px;box-shadow:none;">
                <div class="panel-heading">
                    <h3 class="panel-title" style="padding-top: 15px">
                      <span class="pull-left ">
                        <i class="glyphicon glyphicon-time" style="color: #3b906fcc;font-size: 5.3rem;">

                        </i>
                      </span>
                        <span style="color: #FBFBFB;margin-top: -20px;font-size: 23px;">
                            Recent Post
                        </span>
                      </h3>
                </div>
                <div class="panel-body">

                    <ul class="media-list">
                <?php foreach ($results as $recent_product): ?>

                   <?php $photos = explode(',',$recent_product['img']) ; ?>

                        <li class="media">

                            <div class="  col-md-12 text-center col-md-offset-3 ">
                    <img  style=" width: 60px; height: 60px" src="<?= $photos[0] ; ?>" class="img-circle img-responsive  ">
                            </div>
                           <div class="media-left  col-md-12 ">
                            <div class="media-body  text-center">
                                <h4 class="media-heading">
                                    <small>
                                      <a href="details.php?cart_id=<?=$recent_product['id'] ?>">Post Title</a>
                                    </small>
                                </h4>
                                <p>
                                   <?=substr($recent_product['description'],0,50) ?> ....
                            </div>
                            </div>
                        </li>
                <?php endforeach ?>
                    </ul>

                </div>
            </div>
            <!-- End fluid width widget -->
    </div>
    </div><!--/right side option recent post-->


    <?php endif ?>
