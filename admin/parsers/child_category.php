
<?php include_once '../../core/init.php'; ?>

<?php

$parentID = (int) $_POST['parentID'];
$selected = $_POST['selected'];
//parent !=0 na dewa hole parent print hobe
$child_qry1 = "SELECT * FROM category WHERE parent = '$parentID' AND parent !=0 ORDER BY category";

$child_qry_con = mysqli_query($db, $child_qry1);

ob_start();
?>
<option value=""></option>
<?php foreach ($child_qry_con as $child_row): ?>
    <option value="<?= $child_row['id']; ?>" <?=(($selected==$child_row['id'])?' selected':'') ;?>><?= $child_row['category']; ?></option>

<?php endforeach; ?>

<?php echo ob_get_clean(); ?>
