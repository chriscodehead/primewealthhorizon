<?php if ($sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'email_activation') == 'no') { ?>
 <div class="col-xxl-12 col-sm-12 ">
  <div class="card widgets-card">
   <div class="card-body">
    <div class="">
     Activate your email to have full access to your account.<button onclick="resendEmailActivation('<?php print $sqli->getEmail($_SESSION['user_code']); ?>');" name="sendmailac" class="btn btn-sm btn-danger pull-right" type="button">Resend Activation Email?</button>
    </div>
   </div>
  </div>
 </div>
<?php } ?>