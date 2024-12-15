<?php
require_once('include.php');
if (!isset($_SESSION)) {
 session_start();
}

if (isset($_REQUEST['action'])) {

 ///deleteProduct
 if ($_REQUEST['action'] == 'deleteProduct') {
  $productId = mysqli_real_escape_string($link, $_REQUEST['productId']);
  $passportIn = $cal->selectFrmDB($product, 'product_thumbnail', 'product_id', $productId);
  $passportIn2 = $cal->selectFrmDB($product, 'product_image', 'product_id', $productId);
  if (!empty($passportIn)) {
   $bassic->unlinkFile($passportIn, '../../photo/');
  }
  if (!empty($passportIn2)) {
   $bassic->unlinkFile($passportIn2, '../../photo/');
  }

  if (query_sql("DELETE FROM $product WHERE `product_id`='" . $productId . "' LIMIT 1")) {
   $msg = 'Product was successfully deleted!';
   echo json_encode(array('success' => 'Successful Update!!!', 'msg' => $msg));
  } else {
   $msg = 'Product failed to delete!';
   echo json_encode(array('error' => 'Failed to delete!!!', 'msg' => $msg));
  }
 }

 ///deleteUser
 if ($_REQUEST['action'] == 'deleteUser') {
  $UserId = mysqli_real_escape_string($link, $_REQUEST['UserId']);

  if (query_sql("DELETE FROM $user_tb WHERE `user_code`='" . $UserId . "' LIMIT 1")) {
   $msg = 'User was successfully deleted!';
   echo json_encode(array('success' => 'Successful Update!!!', 'msg' => $msg));
  } else {
   $msg = 'User failed to delete!';
   echo json_encode(array('error' => 'Failed to delete!!!', 'msg' => $msg));
  }
 }
}
