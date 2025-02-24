<?php
require_once('include.php');
if (!isset($_SESSION)) {
     session_start();
}

if (isset($_REQUEST['action'])) {

     //saveStoreName
     if ($_REQUEST['action'] == 'saveStoreName') {
          $storeName = mysqli_real_escape_string($link, $_REQUEST['storeName']);
          $UserId = $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'user_code');

          if (!empty($storeName) && !empty($UserId)) {
               $feilds = array('affilaite_url');
               $value = array($storeName);
               $querry = $cal->update($user_tb, $feilds, $value, 'user_code', $UserId);

               if ($querry == 'Update was successful') {

                    $msg = 'Success! Your store was updated.';
                    echo  $msg;
               } else {
                    $msg =  "An unexpected error occurred. Please try again later";
                    echo $msg;
               }
          } else {
               $msg =  "An unexpected error has occurred. Please try again later.";
               echo $msg;
          }
     }


     /////////////////////////////////////////////////////////
     ////////////////////////////////////////////
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
               $msg = 'User account was successfully deleted!';
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

                    $msg = 'Success! The payment status has been updated to approved.';
                    echo json_encode(array('success' => 'Payment Approved!!!', 'msg' => $msg));
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
     if ($_REQUEST['action'] == 'setPendingApproveAfiliate') {
          $UserId = mysqli_real_escape_string($link, $_REQUEST['UserId']);
          $user_email = $cal->selectFrmDB($user_tb, 'email', 'user_code', $UserId);
          $approved_for_affiliate = 'no';

          if (!empty($UserId)) {

               $feilds = array('approved_for_affiliate');
               $value = array($approved_for_affiliate);
               $querry = $cal->update($user_tb, $feilds, $value, 'user_code', $UserId);

               if ($querry == 'Update was successful') {

                    $msg = 'Success! The affiliate status has been updated to pending.';
                    echo json_encode(array('success' => 'Update was successful!!!', 'msg' => $msg));
               } else {
                    $msg =  "An unexpected error occurred. Please try again later";
                    echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
               }
          } else {
               $msg =  "An unexpected error has occurred. Please try again later.";
               echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
          }
     }

     //setApproveAfiliate
     if ($_REQUEST['action'] == 'setApproveAfiliate') {
          $UserId = mysqli_real_escape_string($link, $_REQUEST['UserId']);
          $user_email = $cal->selectFrmDB($user_tb, 'email', 'user_code', $UserId);
          $approved_for_affiliate = 'yes';

          if (!empty($UserId)) {

               $feilds = array('approved_for_affiliate');
               $value = array($approved_for_affiliate);
               $querry = $cal->update($user_tb, $feilds, $value, 'user_code', $UserId);

               if ($querry == 'Update was successful') {

                    $subjt = 'Affiliate Account Approval!';
                    $message = '<div style="width: 80%; margin-left: 5%; margin-right: 5%;  box-shadow: 0 16px 24px rgba(51, 51, 51, .08) !important; padding:5%; border: solid #fdfdfd;">
         <img width="270" src="https://' . $domain . '/img/logo.png" /><br>
         <div style="height: 20px; background: rgba(116, 105, 105, 0.08); margin-top: 30px; box-shadow: 0 16px 24px rgba(5, 5, 1, .08) !important;"></div><br><br>

         <h4>Success! Your affiliate account has just been approved.</h4>
         <p>Congratulations! Your affiliate account has been approved successfully. You can now log in to your dashboard, add products, and start promoting.<br><br>
         Best regards,<br>' . $siteName . '</p></div>';
                    @$email_call->generalMessage($subjt, $message, $user_email);

                    $msg = 'Success! The affiliate status has been updated to approved.';
                    echo json_encode(array('success' => 'Update was successful!!!', 'msg' => $msg));
               } else {
                    $msg =  "An unexpected error occurred. Please try again later";
                    echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
               }
          } else {
               $msg =  "An unexpected error has occurred. Please try again later.";
               echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
          }
     }

     //unblockUser 
     if ($_REQUEST['action'] == 'unblockUser') {
          $UserId = mysqli_real_escape_string($link, $_REQUEST['UserId']);
          $user_email = $cal->selectFrmDB($user_tb, 'email', 'user_code', $UserId);
          $blocked_account = 0;

          if (!empty($UserId)) {

               $feilds = array('blocked_account');
               $value = array($blocked_account);
               $querry = $cal->update($user_tb, $feilds, $value, 'user_code', $UserId);

               if ($querry == 'Update was successful') {

                    $msg = 'Success! The user account has been successfully unblocked.';
                    echo json_encode(array('success' => 'Update was successful!!!', 'msg' => $msg));
               } else {
                    $msg =  "An unexpected error occurred. Please try again later";
                    echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
               }
          } else {
               $msg =  "An unexpected error has occurred. Please try again later.";
               echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
          }
     }

     //blockUser
     if ($_REQUEST['action'] == 'blockUser') {
          $UserId = mysqli_real_escape_string($link, $_REQUEST['UserId']);
          $user_email = $cal->selectFrmDB($user_tb, 'email', 'user_code', $UserId);
          $blocked_account = 1;

          if (!empty($UserId)) {

               $feilds = array('blocked_account');
               $value = array($blocked_account);
               $querry = $cal->update($user_tb, $feilds, $value, 'user_code', $UserId);

               if ($querry == 'Update was successful') {

                    $msg = 'Success! The user account has been successfully blocked.';
                    echo json_encode(array('success' => 'Update was successful!!!', 'msg' => $msg));
               } else {
                    $msg =  "An unexpected error occurred. Please try again later";
                    echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
               }
          } else {
               $msg =  "An unexpected error has occurred. Please try again later.";
               echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
          }
     }

     //approveOrderPayment
     if ($_REQUEST['action'] == 'approveOrderPayment') {
          $orderId = mysqli_real_escape_string($link, $_REQUEST['orderId']);
          $user_id = $cal->selectFrmDB($orders, 'user_id', 'order_id', $orderId);
          $user_email = $cal->selectFrmDB($user_tb, 'email', 'user_code', $user_id);
          $order_payment_status = 'yes';

          if (!empty($orderId)) {

               $feilds = array('order_payment_status');
               $value = array($order_payment_status);
               $querry = $cal->update($orders, $feilds, $value, 'order_id', $orderId);

               if ($querry == 'Update was successful') {

                    $subjt = 'Starter Pack Payment Update!';
                    $message = '<div style="width: 80%; margin-left: 5%; margin-right: 5%;  box-shadow: 0 16px 24px rgba(51, 51, 51, .08) !important; padding:5%; border: solid #fdfdfd;">
         <img width="270" src="https://' . $domain . '/img/logo.png" /><br>
         <div style="height: 20px; background: rgba(116, 105, 105, 0.08); margin-top: 30px; box-shadow: 0 16px 24px rgba(5, 5, 1, .08) !important;"></div><br><br>

         <h4>Success! Your payment has been approved.</h4>
         <p>Your payment has been successfully received. Your product will be shipped to the address you provided during the order process. Thank you for your purchase!<br><br>
         Best regards,<br>' . $siteName . '</p></div>';
                    @$email_call->generalMessage($subjt, $message, $user_email);

                    $msg = 'Success! The payment status has been updated to approved.';
                    echo json_encode(array('success' => 'Payment Approved!!!', 'msg' => $msg));
               } else {
                    $msg =  "An unexpected error occurred. Please try again later";
                    echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
               }
          } else {
               $msg =  "An unexpected error has occurred. Please try again later.";
               echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
          }
     }

     //cancelOrderPaymnet
     if ($_REQUEST['action'] == 'cancelOrderPaymnet') {
          $orderId = mysqli_real_escape_string($link, $_REQUEST['orderId']);
          $order_payment_status = 'no';

          if (!empty($orderId)) {
               $feilds = array('order_payment_status');
               $value = array($order_payment_status);
               $querry = $cal->update($orders, $feilds, $value, 'order_id', $orderId);

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

     //delOrder
     if ($_REQUEST['action'] == 'delOrder') {
          $orderId = mysqli_real_escape_string($link, $_REQUEST['orderId']);

          if (query_sql("UPDATE $orders SET `delete_status`='" . $orderId . "' WHERE `order_id`='" . $orderId . "' LIMIT 1")) {
               $msg = 'User account was successfully deleted!';
               echo json_encode(array('success' => 'Successful Update!!!', 'msg' => $msg));
          } else {
               $msg = 'User failed to delete!';
               echo json_encode(array('error' => 'Failed to delete!!!', 'msg' => $msg));
          }
     }



     //////////////////////////////ADMIN
     //delAdmin
     if ($_REQUEST['action'] == 'delAdmin') {
          $adminId = mysqli_real_escape_string($link, $_REQUEST['adminId']);

          if (query_sql("DELETE FROM $admin_tb WHERE `id`='" . $adminId . "' LIMIT 1")) {
               $msg = 'Admin account was successfully deleted!';
               echo json_encode(array('success' => 'Successful Update!!!', 'msg' => $msg));
          } else {
               $msg = 'Admin failed to delete!';
               echo json_encode(array('error' => 'Failed to delete!!!', 'msg' => $msg));
          }
     }

     //unblockAdmin 
     if ($_REQUEST['action'] == 'unblockAdmin') {
          $adminId = mysqli_real_escape_string($link, $_REQUEST['adminId']);
          $admin_email = $cal->selectFrmDB($admin_tb, 'email', 'id', $UserId);
          $blocked_account = 0;

          if (!empty($adminId)) {

               $feilds = array('blocked_account');
               $value = array($blocked_account);
               $querry = $cal->update($admin_tb, $feilds, $value, 'id', $adminId);

               if ($querry == 'Update was successful') {

                    $msg = 'Success! The admin account has been successfully unblocked.';
                    echo json_encode(array('success' => 'Update was successful!!!', 'msg' => $msg));
               } else {
                    $msg =  "An unexpected error occurred. Please try again later";
                    echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
               }
          } else {
               $msg =  "An unexpected error has occurred. Please try again later.";
               echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
          }
     }

     //blockAdmin
     if ($_REQUEST['action'] == 'blockAdmin') {
          $adminId = mysqli_real_escape_string($link, $_REQUEST['adminId']);
          $admin_email = $cal->selectFrmDB($admin_tb, 'email', 'id', $adminId);
          $blocked_account = 1;

          if (!empty($adminId)) {

               $feilds = array('blocked_account');
               $value = array($blocked_account);
               $querry = $cal->update($admin_tb, $feilds, $value, 'id', $adminId);

               if ($querry == 'Update was successful') {

                    $msg = 'Success! The admin account has been successfully blocked.';
                    echo json_encode(array('success' => 'Update was successful!!!', 'msg' => $msg));
               } else {
                    $msg =  "An unexpected error occurred. Please try again later";
                    echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
               }
          } else {
               $msg =  "An unexpected error has occurred. Please try again later.";
               echo json_encode(array('error' => 'Unexpected Error!!!', 'msg' => $msg));
          }
     }
}
