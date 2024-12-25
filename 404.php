<?php
require_once('include.php');
$active1 = 'active';
$title = '404';
$description = $siteName . ' ';
$keyword = '';
require_once('head.php'); ?>

<body>
  <?php require_once('header.php'); ?>
  <div class="ak-height-125 ak-height-lg-90"></div>

  <section class="container">
    <div class="ak-error-content">
      <img src="assets/img/bg/404.png" alt="..." />
      <div class="error-info">
        <div
          class="d-flex gap-1 align-items-center flex-wrap justify-content-center">
          <h1 class="error-title">OOPS!</h1>
          <h3 class="error-message mb-3 mb-lg-0">But that's okay</h3>
        </div>
        <p class="error-description">
          It looks like the page you're looking for doesn't exist or has been
          moved. Don't worry, we've got plenty of resources to help you find
          your way back on track.
        </p>
        <a href="./" class="common-btn">
          <span>Back to Home</span>
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="15"
              height="15"
              viewBox="0 0 15 15"
              fill="none">
              <g clip-path="url(#clip0_201_9782324)">
                <path
                  d="M1.42236 6.99728H13.089M13.089 6.99728L7.48903 1.39728M13.089 6.99728L7.48903 12.5973"
                  stroke="#030917"
                  stroke-linecap="round"
                  stroke-linejoin="round" />
              </g>
              <defs>
                <clipPath id="clip0_201_9782324">
                  <rect
                    width="14"
                    height="14"
                    fill="white"
                    transform="translate(0.00927734)" />
                </clipPath>
              </defs>
            </svg>
          </span>
        </a>
      </div>
    </div>
  </section>

  <div class="ak-height-125 ak-height-lg-80"></div>
  <?php require_once('footer.php'); ?>

</body>

</html>