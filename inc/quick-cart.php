
<?php if ($cart_id != ''): ?>

<?php

    $cartQ = $db->query(" SELECT * FROM cart WHERE id = '{$cart_id}'");
    $result = mysqli_fetch_assoc($cartQ);
    $item = json_decode($result['items'], true);
    $i = 1;
    $sub_total = 0;
    $item_count = 0;
?>

    <div class="row" style=" margin-left: -30px; margin-right: -25px">
    <div class="col-md-12">
      <div class="panel panel-primary" style="border: none;border-radius:0px;box-shadow:none;">
        <div class="panel-heading" style="background-color:#F0D22C">
          <h3 class="panel-title"><span class="pull-left "><i class="glyphicon glyphicon-shopping-cart " style="color: #5BB1A0E6;padding-top: 20px;font-size: 5.3rem;"></i></span>Shopping cart</h3>
        </div>
        <div class="panel-body" style="padding:0px">

   <table class="table table-striped table-hover  table-responsive">

<?php  foreach ($item as $value): ?>

   <?php
     $product_id = $value['id'];
      $productQ = $db->query("SELECT * FROM products WHERE id='{$product_id}'");
      $product = mysqli_fetch_assoc($productQ);
     ?>
        <thead>
            <tr>

                <th>Items</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>

                <tr>
                    <td><?=$product['title'] ?>
                    <td><?= money($product['price']) ?></td>
                    <td><span class="label label-warning"><?= $value['quantity'] ; ?></span></td>
                </tr>

                <tr>
                  <td  style="background-color: #2cafec;color: #fff">Sub Total:</td>
                  <td colspan="2" style="background-color: #f0d22c;color: #fff"><?= money($value['quantity'] * $product['price']) ?></td>
                </tr>
          <?php
                $item_count+=$value['quantity'];
                $sub_total += ($product['price'] * $value['quantity']);
            ?>
           <?php endforeach ?>
           <?php
              $taxrate = TAXRATE;
              $tax_mult_sub_total =  $taxrate * $sub_total;
              $tax = $tax_mult_sub_total;
              $grand_total = $tax + $sub_total;
           ?>
        </tbody>
    </table>

    <h4><span class="label label-warning ">Total:</span> </h4>

    <table class="table table-striped table-hover  table-responsive">

        <thead>
            <tr style="background-color: #f0d22c;color: #fff">

                <th>Quantity</th>
                <th>Sub Total</th>
                <th>Grand Total</th>

            </tr>
        </thead>
        <tbody>

            <tr >
                <td> <span class="label label-warning" ><?= $item_count ; ?></span> </td>
                <td>  <?= money($sub_total ); ?></td>
                <td>  <?= money($grand_total); ?></td>

            </tr>

             <tr style="background-color: #F5F5F5">
                <td colspan="2" >TAXRATE :</td>
                <td ><?= money($taxrate) ?></td>
                </tr>

                <tr>
                <td colspan="2" style="background-color: #2cafec;color: #fff">Tax :</td>
                <td  style="background-color: #f0d22c;color: #fff"><?=money($tax )?></td>
                </tr>


        </tbody>

    </table>

        </div>
    </div>
  </div>
  </div>

<?php endif ?>
