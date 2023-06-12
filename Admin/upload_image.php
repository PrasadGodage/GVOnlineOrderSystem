<?php
session_start();
require_once('config.php');
//echo'<pre>';print_r($_POST);print_r($_FILES);print_r($_SESSION);die();
if($_FILES['fld_product_image']['name'] !='' && $_FILES['fld_product_image']['size'] > 0)
{
	$fld_product_image = time().'_'.$_FILES['fld_product_image']['name'];
	$upload_dir = 'images/';
	move_uploaded_file($_FILES['fld_product_image']['tmp_name'],$upload_dir.$fld_product_image);
}
$query = mysqli_query($connect,"insert into tbl_products(fld_category_id,fld_product_image,fld_product_name,fld_product_description,fld_product_stock,fld_product_price,fld_product_delete)values('".$_POST['fld_category_id']."','".$fld_product_image."','".$_POST['fld_product_name']."','".$_POST['fld_product_description']."','".$_POST['fld_product_stock']."','".$_POST['fld_product_price']."','0')");
if($query)
{
	echo'<script type="text/javascript">';
	echo'window.location.href="add_product.php";';
	echo'</script>';
}else{
	echo'<script type="text/javascript">';
	echo'alert("Record Not Saved. Please Try Once Again...!!!");';
	echo'window.location.href="add_product.php";';
	echo'</script>';
}
?>
