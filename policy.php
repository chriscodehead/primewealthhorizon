<?php
require_once('include.php');
$active1 = 'active';
$title = 'Privacy Policy - ' . $siteName;
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
          <p class="ak-section-subtitle animation-title">Privacy Policy</p>
          <h2 class="ak-section-title animation-title">
            Read our Privacy Policy
          </h2>
        </div>
        <p class="back-btn"><a href="./">Home</a> / Policy</p>
      </div>
      <a href="tel:<?php print $sitePhone; ?>" class="phone-number"><?php print $sitePhone; ?></a>
    </div>

  </section>

  <div class="ak-height-60 ak-height-lg-50"></div>

  <div class="container">
    <div class="row">
      <center>
        <h5>At <?php print $siteName; ?>, we are committed to protecting your privacy. This Privacy Policy outlines how we collect, use, and safeguard your personal information when you visit our website, use our services, or interact with our affiliate program.</h5>
      </center>
    </div>
  </div><br /><br />
  <div class="container">

    <div class="row">
      <h6>1. Information We Collect</h6>
      <p>
        We may collect the following types of information:<br /><br />

        - Personal Information: Name, email address, phone number, and other details you provide when registering, making purchases, or filling out forms.<br />
        - Usage Data: Information about how you use our website, including IP address, browser type, and pages visited.<br />
        - Cookies: Small data files stored on your device to enhance your browsing experience.

        <br /><br />
      </p>

      <h6>2. How We Use Your Information</h6>
      <p>
        We use the information collected for:<br /><br />

        - Providing and improving our services.<br />
        - Processing transactions and affiliate commissions.<br />
        - Communicating updates, offers, and promotional materials.<br />
        - Analyzing website usage to enhance user experience.<br /><br />
      </p>

      <h6>3. Sharing Your Information</h6>
      <p>
        We do not sell or share your personal information with third parties except:<br /><br />

        - When required by law or legal processes.<br />
        - With trusted partners who assist in providing our services, under strict confidentiality agreements.<br /><br />
      </p>

      <h6>4. Cookies and Tracking Technologies</h6>
      <p>
        Cookies and similar technologies help us personalize your experience. You can manage your cookie preferences in your browser settings. Disabling cookies may affect certain functionalities on our website.<br /><br />
      </p>

      <h6>5. Data Security</h6>
      <p>
        We employ advanced security measures to protect your information from unauthorized access, alteration, or disclosure. However, no method of transmission over the internet is completely secure, and we cannot guarantee absolute security.<br /><br />
      </p>

      <h6>6. Your Rights</h6>
      <p>
        You have the right to:<br /><br />

        - Access and review your personal information.<br />
        - Request corrections or updates to your data.<br />
        - Opt-out of receiving marketing communications.<br />
        To exercise these rights, contact us at <?php print $siteEmail; ?>.<br /><br />
      </p>

      <h6>7. Third-Party Links</h6>
      <p>
        Our website may contain links to third-party websites. We are not responsible for the privacy practices of those sites. Please review their policies before sharing your information.<br /><br />
      </p>

      <h6>8. Updates to This Privacy Policy</h6>
      <p>
        We may update this Privacy Policy periodically. Changes will be posted on this page with the updated effective date. Your continued use of our website constitutes acceptance of the revised policy.

        <br /><br />
      </p>

      <h6>9. Contact Us</h6>
      <p>
        For questions or concerns about this Privacy Policy, please reach out to us:<br /><br />
        Email: <?php print $siteEmail; ?><br />
        Phone: <?php print $sitePhone; ?><br />
      </p>


    </div>
  </div>


  <div class="ak-height-125 ak-height-lg-80"></div>
  <?php require_once('footer.php'); ?>
</body>

</html>