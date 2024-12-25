<?php
require_once('include.php');
$active1 = 'active';
$title = 'Contact Us - ' . $siteName;
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
          <p class="ak-section-subtitle animation-title">Contact Us</p>
          <h2 class="ak-section-title animation-title">
            Feel Free to Send 🗯️ Message to Us
          </h2>
        </div>
        <p class="back-btn"><a href="./">Home</a> / Contact</p>
      </div>
      <a href="tel:<?php print $sitePhone; ?>" class="phone-number"><?php print $sitePhone; ?></a>
    </div>
  </section>

  <div class="ak-height-125 ak-height-lg-80"></div>
  <section class="container">
    <div class="feature-content">
      <div class="feature-card">
        <img class="feature-icon" src="assets/img/icon/phone.svg" alt="..." />
        <div class="feature-body">
          <h5 class="feature-title ak-bold">
            <?php print $sitePhone; ?>
          </h5>
          <p class="feature-desp">
            Please feel free to contact us for any inquiries or
            assistance you may need.
          </p>
          <a
            href="tel:<?php print $sitePhone; ?>"
            class="ak-black-color ak-medium ak-font-18 d-flex align-items-center gap-2">
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="19"
                height="19"
                viewBox="0 0 19 19"
                fill="none">
                <g clip-path="url(#clip0_339_217)">
                  <path
                    d="M16.3777 12.3022C15.3337 12.3022 14.3086 12.1389 13.3371 11.8179C12.8611 11.6555 12.276 11.8044 11.9854 12.1028L10.068 13.5503C7.84441 12.3633 6.47469 10.994 5.30392 8.78706L6.70876 6.91962C7.07375 6.55512 7.20467 6.02267 7.04782 5.52308C6.72542 4.54655 6.56164 3.52193 6.56164 2.47745C6.56169 1.72292 5.94783 1.10907 5.19334 1.10907H2.0617C1.30721 1.10907 0.693359 1.72292 0.693359 2.47741C0.693359 11.1258 7.72926 18.1617 16.3777 18.1617C17.1322 18.1617 17.746 17.5479 17.746 16.7934V13.6705C17.746 12.916 17.1321 12.3022 16.3777 12.3022Z"
                    fill="#030917" />
                </g>
                <defs>
                  <clipPath id="clip0_339_217">
                    <rect
                      width="18"
                      height="18"
                      fill="white"
                      transform="translate(0.21875 0.577881)" />
                  </clipPath>
                </defs>
              </svg>
            </span>
            <span> call us </span>
          </a>
        </div>
      </div>

      <div class="ak-feature-hr"></div>
      <div class="feature-card">
        <img class="feature-icon" src="assets/img/icon/email.svg" alt="..." />
        <div class="feature-body">
          <h5 class="feature-title ak-bold" style="font-size: 20px;">
            <?php print $siteEmail; ?>
          </h5>
          <p class="feature-desp">
            Please feel free to contact us for any inquiries or
            assistance you may need.
          </p>
          <a
            href="mailTo:<?php print $siteEmail; ?>"
            class="ak-black-color ak-medium ak-font-18 d-flex align-items-center gap-2">
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="19"
                height="19"
                viewBox="0 0 19 19"
                fill="none">
                <g clip-path="url(#clip0_339_219)">
                  <path
                    d="M17.9141 4.15399L12.4551 9.57786L17.9141 15.0017C18.0128 14.7955 18.0727 14.5674 18.0727 14.324V4.83177C18.0727 4.58824 18.0128 4.36025 17.9141 4.15399Z"
                    fill="#030917" />
                  <path
                    d="M16.4903 3.24976H1.65434C1.41081 3.24976 1.18282 3.30963 0.976562 3.40831L7.95378 10.3504C8.5707 10.9673 9.57392 10.9673 10.1908 10.3504L17.1681 3.40831C16.9618 3.30963 16.7338 3.24976 16.4903 3.24976Z"
                    fill="#030917" />
                  <path
                    d="M0.23082 4.15399C0.132137 4.36025 0.0722656 4.58824 0.0722656 4.83177V14.324C0.0722656 14.5675 0.132137 14.7955 0.23082 15.0017L5.68985 9.57786L0.23082 4.15399Z"
                    fill="#030917" />
                  <path
                    d="M11.709 10.3236L10.9365 11.0961C9.9086 12.124 8.23598 12.124 7.20804 11.0961L6.43559 10.3236L0.976562 15.7475C1.18282 15.8462 1.41081 15.906 1.65434 15.906H16.4903C16.7338 15.906 16.9618 15.8462 17.1681 15.7475L11.709 10.3236Z"
                    fill="#030917" />
                </g>
                <defs>
                  <clipPath id="clip0_339_219">
                    <rect
                      width="18"
                      height="18"
                      fill="white"
                      transform="translate(0.0722656 0.577881)" />
                  </clipPath>
                </defs>
              </svg>
            </span>
            <span> Email Us </span>
          </a>
        </div>
      </div>

      <div class="ak-feature-hr"></div>
      <div class="feature-card">
        <img
          class="feature-icon"
          src="assets/img/icon/location.svg"
          alt="..." />
        <div class="feature-body">
          <h5 class="feature-title ak-bold">
            <?php print $siteAddress; ?>
          </h5>
          <p class="feature-desp">
            Our team is here to help you <br />
            Mon - Fri: 9AM - 5PM, <br />
            Sat: 9AM - 4PM
          </p>
          <a
            href="https://www.google.com/maps"
            class="ak-black-color ak-medium ak-font-18 d-flex align-items-center gap-2">
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="19"
                height="19"
                viewBox="0 0 19 19"
                fill="none">
                <g clip-path="url(#clip0_339_224)">
                  <path
                    d="M9.92578 0.577881C6.76295 0.577881 4.125 3.12565 4.125 6.37866C4.125 7.61623 4.49688 8.71979 5.21059 9.75387L9.48186 16.4188C9.68907 16.7428 10.1629 16.7422 10.3697 16.4188L14.6595 9.7312C15.3578 8.74397 15.7266 7.58477 15.7266 6.37866C15.7266 3.18011 13.1243 0.577881 9.92578 0.577881ZM9.92578 9.01538C8.47196 9.01538 7.28906 7.83248 7.28906 6.37866C7.28906 4.92485 8.47196 3.74194 9.92578 3.74194C11.3796 3.74194 12.5625 4.92485 12.5625 6.37866C12.5625 7.83248 11.3796 9.01538 9.92578 9.01538Z"
                    fill="#030917" />
                  <path
                    d="M14.0483 12.696L11.393 16.8475C10.7056 17.9192 9.14211 17.9157 8.45808 16.8486L5.79837 12.6971C3.45823 13.2382 2.01562 14.2293 2.01562 15.4138C2.01562 17.4691 6.09122 18.5779 9.92578 18.5779C13.7603 18.5779 17.8359 17.4691 17.8359 15.4138C17.8359 14.2285 16.3913 13.2368 14.0483 12.696Z"
                    fill="#030917" />
                </g>
                <defs>
                  <clipPath id="clip0_339_224">
                    <rect
                      width="18"
                      height="18"
                      fill="white"
                      transform="translate(0.925781 0.577881)" />
                  </clipPath>
                </defs>
              </svg>
            </span>
            <span> Get Direction </span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <div class="ak-height-125 ak-height-lg-80"></div>
  <div class="container-fluid px-md-0">
    <div class="contact-form-content">
      <div class="contact-form-img">
        <img src="assets/img/contact/contact-img.png" alt="Contact Image" />
      </div>
      <div class="contact-form">
        <div>
          <h5 class="contact-title">
            Ready to take control of your financial future? Our team of
            seasoned experts is here to guide you every step of the way. Fill
            out the form below to get in touch with us today!
          </h5>
          <div class="ak-height-40 ak-height-lg-30"></div>
        </div>

        <form method="post" enctype="multipart/form-data">
          <div class="form-inputs">
            <div class="type_1">
              <label for="fullname" class="form-label">Your Name*</label>
              <input
                type="text"
                name="name"
                id="fullname"
                class="csame"
                placeholder="Write your name here..." />
            </div>
          </div>

          <div class="form-inputs">
            <div class="type_1">
              <label for="YourPhone" class="form-label">Your Phone*</label>
              <input
                type="tel"
                name="phone"
                id="YourPhone"
                class="csame"
                placeholder="Write your phone number here..." />
            </div>
            <div class="type_1">
              <label for="emailInput" class="form-label">Your Email*</label>
              <input
                type="email"
                name="email"
                id="emailInput"
                class="csame"
                placeholder="Write your email here..."
                required />
            </div>
          </div>

          <div class="form-inputs">
            <div class="type_1">
              <label for="country" class="form-label">Your Country*</label>
              <input
                type="text"
                name="country"
                id="country"
                class="csame"
                placeholder="Write your country here..." />
            </div>
            <div class="type_1">
              <label for="emailInput" class="form-label">Your State*</label>
              <input
                type="text"
                name="state"
                id="state"
                class="csame"
                placeholder="Write your state here..."
                required />
            </div>
          </div>

          <div class="form-textarea">
            <div class="type_1">
              <label for="textareaInput" class="form-label">Description*</label>
              <textarea
                name="message"
                rows="3"
                id="message"
                class="csame"
                placeholder="Write description details..."></textarea>
            </div>
          </div>
          <div class="ak-height-40 ak-height-lg-40"></div>
          <button type="submit" name="sub" class="common-btn border-0">
            <span>Send Message</span>
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="15"
                height="15"
                viewBox="0 0 15 15"
                fill="none">
                <g clip-path="url(#clip0_201_978fsdf)">
                  <path
                    d="M1.42236 6.99728H13.089M13.089 6.99728L7.48903 1.39728M13.089 6.99728L7.48903 12.5973"
                    stroke="#030917"
                    stroke-linecap="round"
                    stroke-linejoin="round" />
                </g>
                <defs>
                  <clipPath id="clip0_201_978fsdf">
                    <rect
                      width="14"
                      height="14"
                      fill="white"
                      transform="translate(0.00927734)" />
                  </clipPath>
                </defs>
              </svg>
            </span>
          </button>
        </form>
      </div>
    </div>
  </div>

  <div class="ak-google-map ak-bg">
    <iframe
      class="map"
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96652.27317354927!2d-74.33557928194516!3d40.79756494697628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3a82f1352d0dd%3A0x81d4f72c4435aab5!2sTroy+Meadows+Wetlands!5e0!3m2!1sen!2sbd!4v1563075599994!5m2!1sen!2sbd"
      allowfullscreen
      loading="lazy">
    </iframe>
  </div>

  <?php require_once('footer.php'); ?>
</body>

</html>