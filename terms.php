<?php
require_once('include.php');
$active1 = 'active';
$title = 'Terms And Conditions - ' . $siteName;
$description = $siteName . ' ';
$keyword = '';
require_once('head.php'); ?>

<body>
  <?php require_once('header.php'); ?>

  <section class="common-page-hero">
    <img
      src="assets/img/bg/common-bg.png"
      class="common-hero-bg ak-bg"
      alt="..." />
    <div class="common-hero-content">
      <div class="common-hero-info">
        <div
          class="ak-section-heading ak-style-1 animation-title-content animation-style3">
          <p class="ak-section-subtitle animation-title">Terms And Conditions</p>
          <h2 class="ak-section-title animation-title">
            Read our terms and Conditions
          </h2>
        </div>
        <p class="back-btn"><a href="./">Home</a> / Terms</p>
      </div>
      <a href="tel:<?php print $sitePhone; ?>" class="phone-number"><?php print $sitePhone; ?></a>
    </div>

  </section>

  <div class="ak-height-60 ak-height-lg-50"></div>

  <div class="container">
    <div class="row">
      <center>
        <h5>Welcome to <?php print $siteName; ?> By accessing or using our website, services, or products, you agree to comply with the following Terms and Conditions. Please read them carefully.</h5>
      </center>
    </div>
  </div><br /><br />
  <div class="container">

    <div class="row">
      <h6>1. Acceptance of Terms</h6>
      <p>
        By using this website, you confirm your acceptance of these Terms and Conditions. If you do not agree, please do not use our site or services.<br /><br />
      </p>

      <h6>2. Use of Services</h6>
      <p>
        Eligibility: You must be at least 18 years old to use our services.
        Account Responsibility: Users are responsible for maintaining the confidentiality of their accounts and passwords. <br /><br />
      </p>

      <h6>3. Intellectual Property</h6>
      <p>
        All content on this website, including text, images, and logos, is the property of <?php print $siteName; ?> and may not be used without our permission.<br /><br />
      </p>

      <h6>4. Affiliate Program</h6>
      <p>
        Affiliates must adhere to all applicable laws and guidelines while promoting our products.
        Commissions are subject to our approval and may be adjusted at our discretion. <br /><br />
      </p>

      <h6>5. Product Sales</h6>
      <p>
        All sales are final unless otherwise stated.
        We reserve the right to modify product offerings and prices without prior notice.<br /><br />
      </p>

      <h6>6. Limitation of Liability</h6>
      <p>
        <?php print $siteName; ?> shall not be liable for any direct, indirect, incidental, or consequential damages arising from the use of our website or services.<br /><br />
      </p>

      <h6>7. Privacy Policy</h6>
      <p>
        Your personal information is protected under our Privacy Policy. By using our website, you consent to the collection and use of your information as described.<br /><br />
      </p>

      <h6>8. Modifications to Terms</h6>
      <p>
        We reserve the right to modify these Terms and Conditions at any time. Continued use of our services after changes constitutes acceptance of the updated terms.<br /><br />
      </p>

      <h6>9. Governing Law</h6>
      <p>
        These Terms and Conditions are governed by the laws of United State. Any disputes will be resolved in the appropriate jurisdiction.<br /><br />
      </p>

      <h6>10. Contact Information</h6>
      <p>
        For questions about these Terms and Conditions, please contact us at:<br /><br />
        Email: <?php print $siteEmail; ?><br />
        Phone: <?php print $sitePhone; ?></p>




    </div>
  </div>


  <div class="ak-height-125 ak-height-lg-80"></div>
  <?php require_once('footer.php'); ?>
</body>

</html>