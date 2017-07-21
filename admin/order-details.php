

<?php 
require_once '../functions/define.php';
require_once '../core/init.php';
require_once('../helpers/helper.php');
?>
<?php if (!is_logged_in()){
    
   // login_error_redirect();
   header('Location: login.php');
} ?>



<?php if (setGetEqual('shipped',1)) {
	$txn_id = $txn_id = (int)get('transaction');
    		header('Location: index.php');
    		$txn_cart_id = get('cart_id');
    		$db->query("UPDATE cart SET shipped= 1 WHERE id='{$txn_cart_id}' ");
    	} ?>




<!-- ====================== header.php=========================== -->
<?php include'inc/header.php' ?>
<!-- ====================== ./header.php=========================== -->

<!-- ====================== index.php=========================== -->


     <section class="content-header">
      <h1> Order-details </h1><br>
    </section>
    <section>
    	<?php 
    	

    	$txn_id = (int)get('transaction');
    	//it is also possible that more than one same cart_id is present another t.id
    	//so fist here i collect the all t.id where is cart_id = c.id
    	$txn_cart_id_qry = $db->query("SELECT cart_id FROM transactions WHERE id = $txn_id");

    	$txn_cart_id_result = mysqli_fetch_assoc($txn_cart_id_qry);
    	$txn_cart_id =$txn_cart_id_result['cart_id'];

    	$txnQuery = "SELECT cart.* , transactions.* FROM cart LEFT JOIN transactions ON cart.id = transactions.cart_id  WHERE cart.id =$txn_cart_id ";
		$txnResults = $db->query($txnQuery);

    $result = mysqli_fetch_assoc($txnResults);
    //customer address
    $customer_name = $result['full_name'];
    $customer_name_on_cart = $result['name_on_cart'];
    $email = $result['email'];
    $city = $result['city'];
    $zip_code = $result['zip_code'];
    $street1 = $result['street1'];
    $street2 = $result['street2'];
    $country = $result['country'];

    //join result fetch here
    $sub_total = $result['sub_total'];
    $taxrate = TAXRATE;
    $tax = $result['tax'];
    $grand_total = $result['grand_total'];

    //json object
    $items = json_decode($result['items'], true);
    $i = 1;
    $sub_total = 0;
    $item_count = 0;
?>


    <div class=" col-md-6" style="padding-bottom: 40px;">

   <table class="table table-striped table-hover table-bordered table-responsive">
   <?php foreach ($items as $value): ?>

   <?php 
     $product_id = $value['id'];
      $productQ = $db->query("SELECT * FROM products WHERE id='{$product_id}'");
      $product = mysqli_fetch_assoc($productQ);
     ?>       
 
        <thead style="background-color: orange">
            <tr>
               
                <th style="color: cadetblue;">#</th>
                <th style="color: cadetblue;">Items</th>
                <th style="color: cadetblue;"><span  ></span>Price</th>
                <th style="color: cadetblue;"> <span ></span>Quantity</th>
               
            </tr>
        </thead>
        <tbody>
            
                <tr>
                    <td><?=$i++; ?>
                    <td><?=$product['title'] ?>
                    <td style="color: crimson;"><span class=" label label-info"><?= money($product['price']) ?></span></td>
                    <td><span class="label label-warning"><?= $value['quantity'] ; ?></span></td>
                </tr>
            
                <tr>
                  <td colspan="2" style="background-color: #159885;color: #fff">Sub Total:</td>
                  <td colspan="2" style="background-color: #37BFAA;color: #fff"><span label label-info></span><?= money($value['quantity'] * $product['price']) ?></td>
                </tr>

               
          <?php
                $item_count+=$value['quantity'];
                $sub_total += ($product['price'] * $value['quantity']);
            ?>

           <?php endforeach ?>
		   <tr> 
			 <td colspan="4">
				 <a href="order-details.php?transaction=<?=$txn_id ?>&shipped=1&cart_id=<?=$txn_cart_id ?>">
				 <button class="btn btn-lg btn-info pull-right">Mark Shipped</button>
				 </a>
			</td>
		 </tr>
        </tbody>
    </table>
    </div>
    <div class="col-md-6">

    <h4> <span class="label label-success">Total:</span></h4>

    <table class="table table-striped table-hover table-bordered table-responsive">
        
        <thead>
            <tr style="background-color:  #159885;color: #fff">

                <th  ><span>Quantity</span></th>
                <th ><span>Tax Rate</span></th>
                <th ><span>Sub Total</span></th>

            </tr>
        </thead>
        <tbody>

            <tr>
                <td>  <?= '<b> Qty :</b>  '.$item_count; ?></td>
                <td ><?=$taxrate ?></td>
                <td>  <?= money($sub_total ); ?></td>
              
            </tr>

                <tr><td colspan="2">Tax :</td><td><?=$tax ?></td> </tr>

                <tr> <td colspan="2">Grand Total:</td><td> <?= money($grand_total); ?></td></tr>

 
 
        </tbody>
        <tfoot></tfoot>
        	
        
    </table>

        </div>

        <div class=" col-md-6" style="color:#546556;font-style: italic; min-height: 400px;margin-top: 20px">
        	<h3 style="background-color:#159885;padding: 20px">Customer Details</h3><hr>
        	<address  style="font-size: larger; ">
        	<nav >
        		<ul >
        			<li >Customer Name:<?=$customer_name;?></li>
        			<li>Name On Cart:<?=$customer_name_on_cart;?></li>
        			<li>Email :<?=' '.$email?></li>
        			<li>Street1 :<?=' '.$street1?></li>
        			<li>Street2 :<?=' '.$street2?></li>
        			<li>Zipe Code :<?=' '.$zip_code?></li>
        			<li>City :<?=' '.$city ;?></li>
        			<li>From :<?=' '.$country?></li>
        		</ul>
        	</nav>
        	

        	
			

        		
        	</address>
        </div>
   


    </section>
<!-- ====================== ./index.php=========================== -->

<!-- ====================== footer.php=========================== -->
<?php include'inc/footer.php' ?>
<!-- ====================== ./footer.php=========================== -->





