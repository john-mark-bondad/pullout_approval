<?php

$brid=$this->db->escape_str($_POST['brid']);
$containerid=$this->db->escape_str($_POST['containerid']);
$user_accountid=$this->db->escape_str($_POST['user_accountid']);

$approved_date=date("Y-m-d H:i:s");
$pullout_nums=$this->db->escape_str($_POST['pullout_num']);
$across_pullout_pid=(empty($_POST['pullout_id']))?array():$_POST['pullout_id'];

$pullout_qty=$this->db->escape_str($_POST['pullout_qty']);



$inv_id=$this->db->escape_str($_POST['inv_id']);
$inv_sku=$this->db->escape_str($_POST['inv_sku']);
$current_stock=$this->db->escape_str($_POST['current_stock']);
$pullout_items_qty=$this->db->escape_str($_POST['pullout_items_qty']);
$new_qtyP=$_POST['new_qtyP'];


var_dump($new_qtyP);
// $new_qty=$pullout_items_qty-$current_stock;

	




$sql .= "UPDATE `across_pullout` 
SET approved_date='$approved_date', approved_by='$user_accountid', status='1'  where pullout_id='$across_pullout_pid' and pullout_num='$pullout_nums' and  remark='1';";

$sql1 .="UPDATE `across_product_inventory` 
	SET new_qty='$new_qtyP' where inv_id='$inv_id' and sku='$inv_sku'  and remark='1';";


$this->mainmodel->database_update1($sql1);

if ($msg == "") {
	$this->mainmodel->database_update1($sql);
}



// echo json_encode($a);

?>