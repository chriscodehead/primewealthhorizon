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

 //setPendingPayment
 if ($_REQUEST['action'] == 'setPendingPayment') {
  $UserId = mysqli_real_escape_string($link, $_REQUEST['UserId']);
  $payment_activation_status = 'no';

  if (!empty($UserId)) {
   $feilds = array('payment_activation_status');
   $value = array($payment_activation_status);
   $querry = $cal->update($user_tb, $feilds, $value, 'user_code', $UserId);

   if ($querry == 'Update was successful') {

    $msg = 'Success! The payment status has been updated to pending.';
    echo json_encode(array('success' => 'Payment Disapproved!!!', 'msg' => $msg));
   } else {
    $msg =  "An unexpected error occurred. Please try again later";
    echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
   }
  } else {
   $msg =  "An unexpected error has occurred. Please try again later.";
   echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
  }
 }


 //setPaidPayment
 if ($_REQUEST['action'] == 'setPaidPayment') {
  $UserId = mysqli_real_escape_string($link, $_REQUEST['UserId']);
  $user_email = $cal->selectFrmDB($user_tb, 'email', 'user_code', $UserId);
  $payment_activation_status = 'yes';

  if (!empty($UserId)) {

   $feilds = array('payment_activation_status');
   $value = array($payment_activation_status);
   $querry = $cal->update($user_tb, $feilds, $value, 'user_code', $UserId);

   if ($querry == 'Update was successful') {

    $subjt = 'Starter Pack Payment Update!';
    $message = '<div style="width: 80%; margin-left: 5%; margin-right: 5%;  box-shadow: 0 16px 24px rgba(51, 51, 51, .08) !important; padding:5%; border: solid #fdfdfd;">
         <img width="270" src="https://' . $domain . '/img/logo.png" /><br>
         <div style="height: 20px; background: rgba(116, 105, 105, 0.08); margin-top: 30px; box-shadow: 0 16px 24px rgba(5, 5, 1, .08) !important;"></div><br><br>

         <h4>Success! Your affiliate starter pack payment has been approved.</h4>
         <p>Your payment has been received, and our team is reviewing your affiliate account for approval. This process will take a few hours. Thank you for your patience!<br><br>
         Best regards,<br>' . $siteName . '</p></div>';
    @$email_call->generalMessage($subjt, $message, $user_email);

    $msg = 'Congratulations! coin transfer was confirmed by seller successfully.';
    echo json_encode(array('success' => 'Successfully Coin Confirm!!!', 'msg' => $msg));
   } else {
    $msg =  "An unexpected error occurred. Please try again later";
    echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
   }
  } else {
   $msg =  "An unexpected error has occurred. Please try again later.";
   echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
  }
 }

 //setPendingApproveAfiliate 

 //setApproveAfiliate

 //unblockUser 

 //blockUser
}
