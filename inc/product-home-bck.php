<?php

//
////http://www.phpfreaks.com/tutorial/basic-pagination
////http://stackoverflow.com/questions/23186133/how-to-use-bootstrap-pagination-with-php
////for bootstrap solution
//// find out how many rows are in the table
//$sql = "SELECT COUNT(*) FROM products";
//$result = mysqli_query($db, $sql) ;
//$r = mysqli_fetch_row($result);
//$numrows = $r[0];
//
//// number of rows to show per page
//$rowsperpage = 10;
//// find out total pages
//$totalpages = ceil($numrows / $rowsperpage);
//
//// get the current page or set a default
//if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
//    // cast var as int
//    $currentpage = (int) $_GET['currentpage'];
//} else {
//    // default page num
//    $currentpage = 1;
//} // end if
//
//// if current page is greater than total pages...
//if ($currentpage > $totalpages) {
//    // set current page to last page
//    $currentpage = $totalpages;
//} // end if
//// if current page is less than first page...
//if ($currentpage < 1) {
//    // set current page to first page
//    $currentpage = 1;
//} // end if
//
//// the offset of the list, based on current page
//$offset = ($currentpage - 1) * $rowsperpage;
//
//// get the info from the db
//$sql = "SELECT id, title FROM products LIMIT $offset, $rowsperpage";
//$result = mysqli_query($db, $sql);
//
//// while there are rows to be fetched...
//while ($list = mysqli_fetch_assoc($result)) {
//    // echo data
//    echo $list['id'] . " : " . $list['title'] . "<br />";
//} // end while
//
///******  build the pagination links ******/
//// range of num links to show
//$range = 3;
//
//// if not on page 1, don't show back links
//if ($currentpage > 1) {
//    // show << link to go back to page 1
//    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
//    // get previous page num
//    $prevpage = $currentpage - 1;
//    // show < link to go back to 1 page
//    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
//} // end if
//
//// loop to show links to range of pages around current page
//for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
//    // if it's a valid page number...
//    if (($x > 0) && ($x <= $totalpages)) {
//        // if we're on current page...
//        if ($x == $currentpage) {
//            // 'highlight' it but don't make a link
//            echo " [<b>$x</b>] ";
//            // if not current page...
//        } else {
//            // make it a link
//            echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
//        } // end else
//    } // end if
//} // end for
//
//// if not on last page, show forward and last page links
//if ($currentpage != $totalpages) {
//    // get next page
//    $nextpage = $currentpage + 1;
//    // echo forward link for next page
//    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
//    // echo forward link for lastpage
//    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
//} // end if
///****** end build pagination links ******/
?>






<?php
//$sql = "SELECT  * FROM products WHERE feature = 1 ORDER BY RAND() LIMIT 12 ";
$sql = "SELECT  * FROM products WHERE feature = 1 AND deleted!=1   ORDER BY RAND()  LIMIT 12 ";
$results = mysqli_query($db, $sql);

?>

<div class=" col-md-8 col-sm-12">
    <h4 class="text-center" style="font-family: 'Quicksand',san-serif" > Product Future category 1 <hr></h4>

    <!-- BEGIN PRODUCTS -->
    <?php foreach ($results as  $result): ?>

        <?php $photos = explode(',',$result['img']) ; ?>
        <div class="col-md-4 col-sm-6 ">
        <span class="thumbnail">
          <a href="details.php?cart_id=<?=$result['id']?>">
            <img style=" height: 200px;width: 180px;" src="<?= $photos[0] ; ?>" alt=".......">
          </a>
            <h4 >Product Tittle</h4>
           <div class="ratings " style="color: #efa40d;">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </div>

            <div class="row">
              <div class="col-md-12  ">
                <p class="price">
                  <span style="color:orange"> <mark>Price: <?=$result['price'] ?></mark>
                </span>
                 <span >
                   <mark style=" background-color: #f3f0f0;color: #bc1633;" >List Price: <del><?=$result['list_price'] ?></del>
                   </mark>
                  </span>
                </p>
              </div>
  <hr class="line">
              <div class="col-md-12  ">
              <a href="details.php?cart_id=<?=$result['id'] ?>">
                <button class="btn  btn-info  pull-right" >
                  <span class="glyphicon glyphicon-shopping-cart">
                  </span>BUY NOW</button>
                </a>
              </div>
            </div>
        </span>
        </div>

    <?php endforeach ?>

    <!-- /BEGIN PRODUCTS -->
</div><!--/col-8-->






