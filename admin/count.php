<?php
//$prod_table_count=0;
$products_table = " SELECT * FROM products ";
$prod_results = mysqli_query($db,$products_table);
$prod_table_count = mysqli_num_rows($prod_results)  ;

//echo $prod_table_count;

$transactions_table = "SELECT * FROM transactions ";
$transactions_results = mysqli_query($db,$transactions_table);
$transactions_table_count = mysqli_num_rows($transactions_results);
/*$cart_table = "SELECT * FROM cart WHERE shipped !=! ";
$cart_results = mysqli_query($db,$cart_table);*/
$txnQuery = "SELECT t.id ,t.cart_id,c.paid,c.shipped FROM transactions t LEFT JOIN cart c ON  t.cart_id = c.id WHERE   c.shipped !=1 ";
$cart_results = $db->query($txnQuery);
$cart_table_count = mysqli_num_rows($cart_results);
//echo $cart_table_count;
$brands_table = "SELECT * FROM brands ";
$brands_results = mysqli_query($db,$brands_table);
$brands_table_count = mysqli_num_rows($brands_results);

$users_table = "SELECT * FROM users ";
$users_results = mysqli_query($db,$users_table);
$users_table_count = mysqli_num_rows($users_results);

//die;
 ?>

<section>
  <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?=$cart_table_count ?></h3></h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?=$prod_table_count ?></h3></h3>
                  <p>Total Product</p>
                </div>
                <div class="icon">
                  <i class="ion ion-leaf"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?=$users_table_count ?></h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?= $transactions_table_count ?></h3>
                  <p>All The Transactions</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>
</section>
