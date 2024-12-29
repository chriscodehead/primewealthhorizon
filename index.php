<?php
require_once('include.php');
$active1 = 'active';
$title = 'Welcome to ' . $siteName;
$description = $siteName . ' ';
$keyword = '';
require_once('head.php'); ?>

<body>

  <?php require_once('header.php'); ?>

  <section class="ak-slider ak-slider-hero ak-slider-hero-1">
    <div class="swiper-wrapper">

      <div class="swiper-slide">
        <div
          class="ak-hero ak-style1 slide-inner"
          data-swiper-parallax="100%">
          <div class="ak-hero-featured" data-src="assets/img/hero/hero_1.png">
            <img
              src="assets/img/hero/hero_1.png"
              class="ak-hero-bg"
              alt="..." />
          </div>
          <div class="container-md">
            <div class="hero-slider-info">
              <div class="slider-info">
                <div class="hero-title">
                  <p class="mini-title">
                    Welcome to Your Trusted Financial Partner!
                  </p>
                  <h1 class="hero-main-title">
                    Expert Guidance from
                    <span class="hero-main-title-1 style-2">
                      Our Advisors</span>
                  </h1>
                  <p class="main-desp">
                    <?php print $siteName; ?> Empowering Your Financial Future. Discover innovative consulting solutions tailored to help your business thrive in a competitive world.
                  </p>
                </div>
                <div class="ak-height-50 ak-height-lg-40"></div>
                <div>
                  <a target="_blank" href="<?php print $siteCalender; ?>" class="common-btn style-2">
                    <span>Free Consultation</span>
                    <span class="arrow-cricle">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="10"
                        height="10"
                        viewBox="0 0 10 10"
                        fill="none">
                        <path
                          d="M0.828613 5H9.16195M9.16195 5L5.16195 1M9.16195 5L5.16195 9"
                          stroke="#030917"
                          stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="10"
                        height="10"
                        viewBox="0 0 10 10"
                        fill="none">
                        <path
                          d="M0.828613 5H9.16195M9.16195 5L5.16195 1M9.16195 5L5.16195 9"
                          stroke="#030917"
                          stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="social-hero">
      <div class="content">
        <h6 class="email style-1"><?php print $sitePhone; ?></h6>
        <div class="hr style-1"></div>
        <h6 class="email style-1" style="font-size: 11px;"><?php print $siteEmail; ?></h6>
      </div>
    </div>
  </section>


  <div class="ak-height-40 ak-height-lg-80"></div>
  <section class="container">
    <div class="about-us-content">
      <div class="image-content">
        <img
          class="about-img-1"
          src="assets/img/service/service_3.png"
          alt="..." />
        <img
          class="about-img-2"
          src="assets/img/about/about_2.png"
          alt="..." />
      </div>
      <div class="info-content">
        <div
          class="ak-section-heading ak-style-1 animation-title-content animation-style3">
          <p class="ak-section-subtitle animation-title">About Us</p>
          <h2 class="ak-section-title animation-title">
            <?php print $siteName; ?>
          </h2>
          <p class="ak-section-desp">
            is more than a consulting firm – we’re your partners in growth. Our expertise spans general management consulting, innovative product sales, and affiliate marketing. With a commitment to excellence and integrity, we empower businesses and individuals to excel in a competitive world.
          </p><br />
          <p><strong>Our Vision</strong>
            To be a global leader in empowering individuals and businesses, creating wealth and opportunities that transform lives.
            <br /><br />
            <strong>Our Mission</strong>
            To deliver high-quality consulting services, premium products, and affiliate programs that drive success and foster a community of thriving partners.
          </p>
        </div>
        <div class="day-time">
          <div class="ak-height-40 ak-height-lg-10"></div>
          <p class="text-uppercase ak-font-18 ak-black-color ak-medium mb-2">
            SATURDAY: 8 AM – 10 PM
          </p>
          <p class="text-uppercase ak-font-18 ak-black-color ak-medium">
            MON-FRI: 8 AM – 10 PM
          </p>
          <div class="ak-height-50 ak-height-lg-30"></div>
          <a href="about" class="common-btn">
            <span> Get Started</span>
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="15"
                height="15"
                viewBox="0 0 15 15"
                fill="none">
                <g clip-path="url(#clip0_201_978353)">
                  <path
                    d="M1.42236 6.99728H13.089M13.089 6.99728L7.48903 1.39728M13.089 6.99728L7.48903 12.5973"
                    stroke="#030917"
                    stroke-linecap="round"
                    stroke-linejoin="round" />
                </g>
                <defs>
                  <clipPath id="clip0_201_978353">
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
    </div>
  </section>

  <div class="ak-height-125 ak-height-lg-80"></div>
  <section>
    <div class="container">
      <div class="ak-center text-center">
        <div
          class="ak-section-heading ak-style-1 animation-title-content animation-style3 ak-w-50">
          <p class="ak-section-subtitle animation-title">Projects</p>
          <h2 class="ak-section-title animation-title">Our Dedicated Projects</h2>
        </div>
      </div>
    </div>
    <div class="ak-height-60 ak-height-lg-50"></div>
    <div class="container">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <div class="col">
          <div class="feature-card style-3">
            <img
              class="feature-icon"
              src="img/Affiliate.jpeg"
              alt="..." />
            <div class="feature-body">
              <h5 class="feature-title">Join as a Marketing Affiliate</h5>
              <p>Partner with us to earn commissions by promoting our premium products.</p>
              <a href="accounts/" class="more-btn">
                <span>Become An Affiliate</span>
                <span class="svg-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="19"
                    viewBox="0 0 18 19"
                    fill="none">
                    <path
                      d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                      fill="#030917" />
                    <path
                      d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                      stroke="#030917"
                      stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="19"
                    viewBox="0 0 18 19"
                    fill="none">
                    <path
                      d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                      fill="#030917" />
                    <path
                      d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                      stroke="#030917"
                      stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </span>
              </a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="feature-card style-3">
            <img
              class="feature-icon"
              src="img/Grow-Your-Business.jpg"
              alt="..." />
            <div class="feature-body">
              <h5 class="feature-title">Let’s Grow Your Business</h5>
              <p>Fill out a form and tell us how we can help you achieve business success.</p>
              <a href="contact" class="more-btn">
                <span>Learn More</span>
                <span class="svg-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="19"
                    viewBox="0 0 18 19"
                    fill="none">
                    <path
                      d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                      fill="#030917" />
                    <path
                      d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                      stroke="#030917"
                      stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="19"
                    viewBox="0 0 18 19"
                    fill="none">
                    <path
                      d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                      fill="#030917" />
                    <path
                      d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                      stroke="#030917"
                      stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </span>
              </a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="feature-card style-3">
            <img
              class="feature-icon"
              src="img/Mirracare.jpg"
              alt="..." />
            <div class="feature-body">
              <h5 class="feature-title">Explore Our Client Projects</h5>
              <p>Learn about Mirracare USA and other exciting projects we’re managing. Let's Connect</p>
              <a target="_blank" href="https://nyccc.revoobitusa.com/" class="more-btn">
                <span>Learn More</span>
                <span class="svg-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="19"
                    viewBox="0 0 18 19"
                    fill="none">
                    <path
                      d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                      fill="#030917" />
                    <path
                      d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                      stroke="#030917"
                      stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="19"
                    viewBox="0 0 18 19"
                    fill="none">
                    <path
                      d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                      fill="#030917" />
                    <path
                      d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                      stroke="#030917"
                      stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </span>
              </a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="feature-card style-3">
            <img
              class="feature-icon"
              src="img/teacher-students-library.jpg"
              alt="..." />
            <div class="feature-body">
              <h5 class="feature-title">Find Students as an Educator</h5>
              <p>Connect with us to match your expertise with eager learners worldwide.</p>
              <a target="_blank" href="<?php print $siteCalender ?>" class="more-btn">
                <span>Learn More</span>
                <span class="svg-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="19"
                    viewBox="0 0 18 19"
                    fill="none">
                    <path
                      d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                      fill="#030917" />
                    <path
                      d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                      stroke="#030917"
                      stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="19"
                    viewBox="0 0 18 19"
                    fill="none">
                    <path
                      d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                      fill="#030917" />
                    <path
                      d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                      stroke="#030917"
                      stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </span>
              </a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="feature-card style-3">
            <img
              class="feature-icon"
              src="img/Mirracare-cant-be-fired.jpg"
              alt="..." />
            <div class="feature-body">
              <h5 class="feature-title">Can't Be Fired</h5>
              <p>Discover How I Overcame Job Loss and Found Stability</p>
              <a target="_blank" href="https://cantbefired.revoobitusa.com/" class="more-btn">
                <span>Learn More</span>
                <span class="svg-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="19"
                    viewBox="0 0 18 19"
                    fill="none">
                    <path
                      d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                      fill="#030917" />
                    <path
                      d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                      stroke="#030917"
                      stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="19"
                    viewBox="0 0 18 19"
                    fill="none">
                    <path
                      d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                      fill="#030917" />
                    <path
                      d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                      stroke="#030917"
                      stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </span>
              </a>
            </div>
          </div>
        </div>

      </div>

      <div class="ak-height-50 ak-height-lg-30"></div>
      <div class="ak-center">
        <a href="<?php print $siteCalender; ?>" class="common-btn style-2 color-3">
          <span>Book A Free Consultation</span>
          <span class="arrow-cricle">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="10"
              height="10"
              viewBox="0 0 10 10"
              fill="none">
              <path
                d="M0.828613 5H9.16195M9.16195 5L5.16195 1M9.16195 5L5.16195 9"
                stroke="#030917"
                stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="10"
              height="10"
              viewBox="0 0 10 10"
              fill="none">
              <path
                d="M0.828613 5H9.16195M9.16195 5L5.16195 1M9.16195 5L5.16195 9"
                stroke="#030917"
                stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </span>
        </a>
      </div>
    </div>
  </section>


  <div class="ak-height-125 ak-height-lg-80"></div>
  <section class="container">
    <div class="img-clip-text" data-src="assets/img/bg/img-clip-text-bg.jpg">
      Why <br />
      Join Us?
    </div>
    <div class="ak-height-50 ak-height-lg-30"></div>
    <div class="feature-content">
      <div class="feature-card">
        <img class="feature-icon" src="assets/img/icon/light.svg" alt="..." />
        <div class="feature-body">
          <h5 class="feature-title"> Personalized Business Growth Tools</h5>
          <p class="feature-desp">
            <?php print $siteName; ?> provides tailored solutions to help businesses unlock their full potential. From consulting strategies to affiliate marketing insights, our tools are designed to meet your specific needs.
          </p>
          <a href="about" class="more-btn">
            <span>Learn More</span>
            <span class="svg-icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="19"
                viewBox="0 0 18 19"
                fill="none">
                <path
                  d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                  fill="#030917" />
                <path
                  d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                  stroke="#030917"
                  stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="19"
                viewBox="0 0 18 19"
                fill="none">
                <path
                  d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                  fill="#030917" />
                <path
                  d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                  stroke="#030917"
                  stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
            </span>
          </a>
        </div>
      </div>

      <div class="ak-feature-hr"></div>
      <div class="feature-card">
        <img class="feature-icon" src="assets/img/icon/hand.svg" alt="..." />
        <div class="feature-body">
          <h5 class="feature-title">Robust Success Strategies</h5>
          <p class="feature-desp">
            We offer proven methods to drive profitability and sustain growth. Our expertise in consulting and product marketing ensures you stay ahead in your industry.
          </p>
          <a href="about" class="more-btn">
            <span>Learn More</span>
            <span class="svg-icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="19"
                viewBox="0 0 18 19"
                fill="none">
                <path
                  d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                  fill="#030917" />
                <path
                  d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                  stroke="#030917"
                  stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="19"
                viewBox="0 0 18 19"
                fill="none">
                <path
                  d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                  fill="#030917" />
                <path
                  d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                  stroke="#030917"
                  stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
            </span>
          </a>
        </div>
      </div>

      <div class="ak-feature-hr"></div>
      <div class="feature-card">
        <img class="feature-icon" src="assets/img/icon/note.svg" alt="..." />
        <div class="feature-body">
          <h5 class="feature-title">
            Transparent Partnerships and Accountability
          </h5>
          <p class="feature-desp">
            At <?php print $siteName; ?>, we prioritize integrity and transparency. Whether it’s our consulting services or affiliate programs, you can count on us for fair practices and measurable results.
          </p>
          <a href="about" class="more-btn">
            <span>Learn More</span>
            <span class="svg-icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="19"
                viewBox="0 0 18 19"
                fill="none">
                <path
                  d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                  fill="#030917" />
                <path
                  d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                  stroke="#030917"
                  stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="19"
                viewBox="0 0 18 19"
                fill="none">
                <path
                  d="M1.7085 9.01147H16.2918H1.7085ZM16.2918 9.01147L9.29183 2.01147L16.2918 9.01147ZM16.2918 9.01147L9.29183 16.0115L16.2918 9.01147Z"
                  fill="#030917" />
                <path
                  d="M1.7085 9.01147H16.2918M16.2918 9.01147L9.29183 2.01147M16.2918 9.01147L9.29183 16.0115"
                  stroke="#030917"
                  stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
            </span>
          </a>
        </div>
      </div>
    </div>
  </section>


  <div class="ak-height-125 ak-height-lg-80"></div>
  <section>
    <div class="container">
      <div class="service-top">
        <div
          class="ak-section-heading ak-style-1 animation-title-content animation-style3 ak-w-50">
          <p class="ak-section-subtitle animation-title">Services</p>
          <h2 class="ak-section-title animation-title">
            Expert Financial Consultation Tailored to Your Needs
          </h2>
          <p>At <?php print $siteName; ?>, we offer a wide range of consulting and management services designed to empower individuals, businesses and drive success. Explore our comprehensive offerings:</p>
        </div>
        <div class="service-swiper-controller">
          <button class="service-next-btn slider-btn next">
            <svg
              width="10"
              height="18"
              viewBox="0 0 10 18"
              fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M9.00928 0.73999L1.00928 8.73999L9.00928 16.74"
                stroke="#030917"
                stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
          <button class="service-prev-btn slider-btn prev">
            <svg
              width="10"
              height="18"
              viewBox="0 0 10 18"
              fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M1.00928 0.73999L9.00928 8.73999L1.00928 16.74"
                stroke="#030917"
                stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div class="ak-height-60 ak-height-lg-50"></div>
    <div class="service-bg">
      <div class="ak-white-bg-service"></div>
      <div class="container">
        <div class="ak-slider ak-slider-service">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="service-card h-100">
                <a href="service-details.html" class="service-thumb">
                  <img src="assets/img/service/service_1.png" alt="..." />
                  <div class="overlay-image">
                    <img src="assets/img/service/service_1.png" alt="..." />
                  </div>
                </a>
                <div class="service-info">
                  <a href="services" class="service-title">
                    Strategy and Planning
                  </a>
                  <p class="service-desp">
                    We provide the expertise needed to build strong foundations and achieve long-term success:
                  </p>
                </div>
                <div class="service-footer">
                  <a
                    href="services"
                    class="common-btn style-2 color-2">
                    <span>Read More</span>
                    <span class="arrow-cricle">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="15"
                        height="15"
                        viewBox="0 0 15 15"
                        fill="none">
                        <g clip-path="url(#clip0_201_97878432)">
                          <path
                            d="M1.42236 6.99728H13.089M13.089 6.99728L7.48903 1.39728M13.089 6.99728L7.48903 12.5973"
                            stroke="#030917"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                        </g>
                        <defs>
                          <clipPath id="clip0_201_97878432">
                            <rect
                              width="14"
                              height="14"
                              fill="white"
                              transform="translate(0.00927734)" />
                          </clipPath>
                        </defs>
                      </svg>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="15"
                        height="15"
                        viewBox="0 0 15 15"
                        fill="none">
                        <g clip-path="url(#clip0_201_97812313)">
                          <path
                            d="M1.42236 6.99728H13.089M13.089 6.99728L7.48903 1.39728M13.089 6.99728L7.48903 12.5973"
                            stroke="#030917"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                        </g>
                        <defs>
                          <clipPath id="clip0_201_97812313">
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
            </div>

            <div class="swiper-slide">
              <div class="service-card h-100">
                <a href="services" class="service-thumb">
                  <img src="assets/img/service/service_2.png" alt="..." />
                  <div class="overlay-image">
                    <img src="assets/img/service/service_2.png" alt="..." />
                  </div>
                </a>
                <div class="service-info">
                  <a href="services" class="service-title">Operations and Performance Improvement</a>
                  <p class="service-desp">
                    Enhance your operations and achieve better results with our targeted services:
                  </p>
                </div>
                <div class="service-footer">
                  <a
                    href="services"
                    class="common-btn style-2 color-2">
                    <span>Read More</span>
                    <span class="arrow-cricle">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="15"
                        height="15"
                        viewBox="0 0 15 15"
                        fill="none">
                        <g clip-path="url(#clip0_201_9789087)">
                          <path
                            d="M1.42236 6.99728H13.089M13.089 6.99728L7.48903 1.39728M13.089 6.99728L7.48903 12.5973"
                            stroke="#030917"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                        </g>
                        <defs>
                          <clipPath id="clip0_201_9789087">
                            <rect
                              width="14"
                              height="14"
                              fill="white"
                              transform="translate(0.00927734)" />
                          </clipPath>
                        </defs>
                      </svg>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="15"
                        height="15"
                        viewBox="0 0 15 15"
                        fill="none">
                        <g clip-path="url(#clip0_201_978369)">
                          <path
                            d="M1.42236 6.99728H13.089M13.089 6.99728L7.48903 1.39728M13.089 6.99728L7.48903 12.5973"
                            stroke="#030917"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                        </g>
                        <defs>
                          <clipPath id="clip0_201_978369">
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
            </div>

            <div class="swiper-slide">
              <div class="service-card h-100">
                <a href="services" class="service-thumb">
                  <img src="assets/img/service/service_3.png" alt="..." />
                  <div class="overlay-image">
                    <img src="assets/img/service/service_3.png" alt="..." />
                  </div>
                </a>
                <div class="service-info">
                  <a href="services" class="service-title">Organization and Talent Development</a>
                  <p class="service-desp">
                    Empower your team and build a strong organizational structure:
                  </p>
                </div>
                <div class="service-footer">
                  <a
                    href="services"
                    class="common-btn style-2 color-2">
                    <span>Read More</span>
                    <span class="arrow-cricle">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="15"
                        height="15"
                        viewBox="0 0 15 15"
                        fill="none">
                        <g clip-path="url(#clip0_201_9782130)">
                          <path
                            d="M1.42236 6.99728H13.089M13.089 6.99728L7.48903 1.39728M13.089 6.99728L7.48903 12.5973"
                            stroke="#030917"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                        </g>
                        <defs>
                          <clipPath id="clip0_201_9782130">
                            <rect
                              width="14"
                              height="14"
                              fill="white"
                              transform="translate(0.00927734)" />
                          </clipPath>
                        </defs>
                      </svg>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="15"
                        height="15"
                        viewBox="0 0 15 15"
                        fill="none">
                        <g clip-path="url(#clip0_201_9781476)">
                          <path
                            d="M1.42236 6.99728H13.089M13.089 6.99728L7.48903 1.39728M13.089 6.99728L7.48903 12.5973"
                            stroke="#030917"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                        </g>
                        <defs>
                          <clipPath id="clip0_201_9781476">
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
            </div>

          </div>
        </div>
        <div class="ak-height-100 ak-height-lg-50"></div>
        <div class="ak-border-width"></div>
        <div class="ak-slider ak-slider-client-logo">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="img/NYCCCRevoobit.png" alt="..." />
            </div>
            <div class="swiper-slide">
              <img src="img/Revoobit-Logo.webp" alt="..." />
            </div>
            <div class="swiper-slide">
              <img src="img/NYCCCRevoobit.png" alt="..." />
            </div>
            <div class="swiper-slide">
              <img src="img/Revoobit-Logo.webp" alt="..." />
            </div>
            <div class="swiper-slide">
              <img src="img/NYCCCRevoobit.png" alt="..." />
            </div>
            <div class="swiper-slide">
              <img src="img/Revoobit-Logo.webp"" alt=" ..." />
            </div>
          </div>
        </div>
        <div class="ak-border-width"></div>
        <div class="ak-height-50 ak-height-lg-50"></div>
      </div>
    </div>
  </section>


  <div class="ak-height-125 ak-height-lg-80"></div>
  <div class="container">
    <div class="testimonial-section-home-two">
      <div class="tc-home-two">
        <button class="project-next-btn slider-btn next color-2">
          <svg
            width="10"
            height="18"
            viewBox="0 0 10 18"
            fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M9.00928 0.73999L1.00928 8.73999L9.00928 16.74"
              stroke="#000000"
              stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
      </div>
      <div class="ak-slider ht-testimonial-slider">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-info-section">
              <div class="testimonial-info">
                <img
                  src="userImg/avatar.png"
                  class="testimonial-info-img"
                  alt="..." />
                <p class="short-title-one">

                </p>
                <p class="testimonial-info-subtitle">
                  <?php print $siteName; ?> has been a game-changer for my business. Their consulting expertise helped streamline my operations, while their affiliate program provided an extra income stream. The quality of their products, especially Mirracare, speaks for itself. I highly recommend them for anyone looking to grow their business and financial potential!
                </p>
                <div class="d-flex gap-5">
                  <div>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="43"
                      height="37"
                      viewBox="0 0 43 37"
                      fill="none">
                      <path
                        d="M24.3085 13.8306C24.3085 20.4725 25.9143 25.6719 29.1259 29.4288C32.3376 33.1857 36.8494 35.6547 42.6614 36.8359V30.0187C38.2479 28.6655 35.2779 26.2191 33.7514 22.6796C32.914 20.9951 32.5513 19.1143 32.7025 17.2392H42.9893L42.9893 0.000232697L24.3085 0.000232697V13.8306ZM0.549316 13.8306C0.549316 20.3852 2.11147 25.5636 5.23576 29.3658C8.36006 33.168 12.9155 35.6587 18.9022 36.8379V30.0207C14.4447 28.6209 11.4514 26.2175 9.92221 22.8105C9.14336 21.0619 8.80584 19.1488 8.93933 17.2392L19.2301 17.2392V0.000232697H0.549316L0.549316 13.8306Z"
                        fill="#485B60" />
                    </svg>
                  </div>
                  <div>
                    <h6 class="testimonial-info-title">Steven K. Roberts</h6>
                    <p class="short-title-two">Partner From USA</p>
                  </div>
                  <div>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="43"
                      height="37"
                      viewBox="0 0 43 37"
                      fill="none">
                      <path
                        d="M19.2301 13.8306C19.2301 20.4725 17.6242 25.6719 14.4126 29.4288C11.201 33.1857 6.6892 35.6547 0.87722 36.8359V30.0187C5.2907 28.6655 8.26069 26.2191 9.78717 22.6796C10.6246 20.9951 10.9872 19.1143 10.836 17.2392H0.549259L0.549259 0.000232697L19.2301 0.000232697V13.8306ZM42.9893 13.8306C42.9893 20.3852 41.4271 25.5636 38.3028 29.3658C35.1785 33.168 30.623 35.6587 24.6364 36.8379V30.0207C29.0939 28.6209 32.0872 26.2175 33.6164 22.8105C34.3952 21.0619 34.7327 19.1488 34.5992 17.2392L24.3085 17.2392V0.000232697H42.9893L42.9893 13.8306Z"
                        fill="#485B60" />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-info-section">
              <div class="testimonial-info">
                <img
                  src="userImg/avatar.png"
                  class="testimonial-info-img"
                  alt="..." />
                <p class="short-title-one">

                </p>
                <p class="testimonial-info-subtitle">
                  Working with <?php print $siteName; ?> has been an incredible experience. Their consulting services transformed my business strategy, and the results were evident within months. I’m grateful for their guidance and professionalism.
                </p>
                <div class="d-flex gap-5">
                  <div>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="43"
                      height="37"
                      viewBox="0 0 43 37"
                      fill="none">
                      <path
                        d="M24.3085 13.8306C24.3085 20.4725 25.9143 25.6719 29.1259 29.4288C32.3376 33.1857 36.8494 35.6547 42.6614 36.8359V30.0187C38.2479 28.6655 35.2779 26.2191 33.7514 22.6796C32.914 20.9951 32.5513 19.1143 32.7025 17.2392H42.9893L42.9893 0.000232697L24.3085 0.000232697V13.8306ZM0.549316 13.8306C0.549316 20.3852 2.11147 25.5636 5.23576 29.3658C8.36006 33.168 12.9155 35.6587 18.9022 36.8379V30.0207C14.4447 28.6209 11.4514 26.2175 9.92221 22.8105C9.14336 21.0619 8.80584 19.1488 8.93933 17.2392L19.2301 17.2392V0.000232697H0.549316L0.549316 13.8306Z"
                        fill="#485B60" />
                    </svg>
                  </div>
                  <div>
                    <h6 class="testimonial-info-title">Amaka E.</h6>
                    <p class="short-title-two">Business Owner From USA</p>
                  </div>
                  <div>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="43"
                      height="37"
                      viewBox="0 0 43 37"
                      fill="none">
                      <path
                        d="M19.2301 13.8306C19.2301 20.4725 17.6242 25.6719 14.4126 29.4288C11.201 33.1857 6.6892 35.6547 0.87722 36.8359V30.0187C5.2907 28.6655 8.26069 26.2191 9.78717 22.6796C10.6246 20.9951 10.9872 19.1143 10.836 17.2392H0.549259L0.549259 0.000232697L19.2301 0.000232697V13.8306ZM42.9893 13.8306C42.9893 20.3852 41.4271 25.5636 38.3028 29.3658C35.1785 33.168 30.623 35.6587 24.6364 36.8379V30.0207C29.0939 28.6209 32.0872 26.2175 33.6164 22.8105C34.3952 21.0619 34.7327 19.1488 34.5992 17.2392L24.3085 17.2392V0.000232697H42.9893L42.9893 13.8306Z"
                        fill="#485B60" />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-info-section">
              <div class="testimonial-info">
                <img
                  src="userImg/avatar.png"
                  class="testimonial-info-img"
                  alt="..." />
                <p class="short-title-one">

                </p>
                <p class="testimonial-info-subtitle">
                  The affiliate program at <?php print $siteName; ?> has exceeded my expectations! Not only have I earned consistent commissions, but I’ve also built valuable connections. Their support team is amazing, and their products are top-notch!
                </p>
                <div class="d-flex gap-5">
                  <div>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="43"
                      height="37"
                      viewBox="0 0 43 37"
                      fill="none">
                      <path
                        d="M24.3085 13.8306C24.3085 20.4725 25.9143 25.6719 29.1259 29.4288C32.3376 33.1857 36.8494 35.6547 42.6614 36.8359V30.0187C38.2479 28.6655 35.2779 26.2191 33.7514 22.6796C32.914 20.9951 32.5513 19.1143 32.7025 17.2392H42.9893L42.9893 0.000232697L24.3085 0.000232697V13.8306ZM0.549316 13.8306C0.549316 20.3852 2.11147 25.5636 5.23576 29.3658C8.36006 33.168 12.9155 35.6587 18.9022 36.8379V30.0207C14.4447 28.6209 11.4514 26.2175 9.92221 22.8105C9.14336 21.0619 8.80584 19.1488 8.93933 17.2392L19.2301 17.2392V0.000232697H0.549316L0.549316 13.8306Z"
                        fill="#485B60" />
                    </svg>
                  </div>
                  <div>
                    <h6 class="testimonial-info-title">John M.</h6>
                    <p class="short-title-two">Affiliate From USA</p>
                  </div>
                  <div>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="43"
                      height="37"
                      viewBox="0 0 43 37"
                      fill="none">
                      <path
                        d="M19.2301 13.8306C19.2301 20.4725 17.6242 25.6719 14.4126 29.4288C11.201 33.1857 6.6892 35.6547 0.87722 36.8359V30.0187C5.2907 28.6655 8.26069 26.2191 9.78717 22.6796C10.6246 20.9951 10.9872 19.1143 10.836 17.2392H0.549259L0.549259 0.000232697L19.2301 0.000232697V13.8306ZM42.9893 13.8306C42.9893 20.3852 41.4271 25.5636 38.3028 29.3658C35.1785 33.168 30.623 35.6587 24.6364 36.8379V30.0207C29.0939 28.6209 32.0872 26.2175 33.6164 22.8105C34.3952 21.0619 34.7327 19.1488 34.5992 17.2392L24.3085 17.2392V0.000232697H42.9893L42.9893 13.8306Z"
                        fill="#485B60" />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="tc-home-two prev">
        <button class="project-prev-btn slider-btn prev color-2">
          <svg
            width="10"
            height="18"
            viewBox="0 0 10 18"
            fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M1.00928 0.73999L9.00928 8.73999L1.00928 16.74"
              stroke="#000000"
              stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
      </div>
    </div>
  </div>


  <div class="ak-height-135 ak-height-lg-80"></div>
  <div class="funfact-counter">
    <div class="container">
      <div class="funfact-inner">
        <div
          class="funfact-title-content ak-section-heading animation-title-content animation-style3">
          <h3 class="funfact-title ak-section-title">
            Our Extraordinary Achievement
          </h3>
        </div>
        <div class="auto-counter-section" id="counter">
          <div class="funfact style1">
            <div class="funfact-number color-1">
              <span class="counter">30</span>
              <span>+</span>
            </div>

            <div class="funfact-text">
              <p class="text">Certified Team</p>
            </div>
          </div>
          <div class="divider-border d-none d-xxl-inline">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="38"
              height="121"
              viewBox="0 0 38 121"
              fill="none">
              <path
                opacity="0.1"
                d="M0.502868 120.342L37.2834 0.457802"
                stroke="#030917" />
            </svg>
          </div>
          <div class="funfact style1">
            <div class="funfact-number color-1">
              <span class="counter">4</span>
              <span>+</span>
            </div>
            <div class="funfact-text">
              <p class="text">Years of Experience</p>
            </div>
          </div>
          <div class="divider-border d-none d-xxl-inline">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="38"
              height="121"
              viewBox="0 0 38 121"
              fill="none">
              <path
                opacity="0.1"
                d="M0.502868 120.342L37.2834 0.457802"
                stroke="#030917" />
            </svg>
          </div>
          <div class="funfact style1">
            <div class="funfact-number color-1">
              <span class="counter">5</span>
              <span>k+</span>
            </div>
            <div class="funfact-text">
              <p class="text">Satisfied Customers</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="ak-height-125 ak-height-lg-80"></div>
  <section class="container-xxl" id="strategicCard">
    <div class="strategic-card-content">
      <div class="strategic" data-src="assets/img/bg/strategic-bg.png">
        <div class="strategic-info">
          <div class="ak-section-heading ak-style-1">
            <p class="ak-section-subtitle animation-title">Why Choose Us?</p>
            <h2 class="ak-section-title title-anim">
              Become a Partner Today
            </h2>
            <p>Whether you're a business looking for expert consulting, a customer searching for premium products, or an entrepreneur ready to earn through referrals, <?php print $siteName; ?> is your ultimate destination.</p>
          </div>
          <div class="ak-height-50 ak-height-lg-30"></div>
          <div class="personalized-long-term">
            <div class="personalized">
              <img class="icon" src="assets/img/icon/target.svg" alt="..." />
              <h5 class="title">Comprehensive services tailored to your needs</h5>
              <p class="desp">
                Expert solutions designed to maximize efficiency and drive success.
              </p>
            </div>
            <div class="personalized-divder"></div>
            <div class="personalized">
              <img class="icon" src="assets/img/icon/target.svg" alt="..." />
              <h5 class="title">Quality products that deliver value</h5>
              <p class="desp">
                Premium products ensuring customer satisfaction and exceptional results.
              </p>
            </div>
            <div class="personalized-divder"></div>
            <div class="long-term">
              <img
                class="icon"
                src="assets/img/icon/target.svg"
                alt="..." />
              <h5 class="title">A lucrative affiliate program for financial growth</h5>
              <p class="desp">
                Earn commissions by sharing our products with your network.
              </p>
            </div>
          </div>
          <div class="ak-height-50 ak-height-lg-30"></div>
          <a href="contact" class="common-btn">
            <span> Get Started</span>
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="15"
                height="15"
                viewBox="0 0 15 15"
                fill="none">
                <g clip-path="url(#clip0_201_978321290)">
                  <path
                    d="M1.42236 6.99728H13.089M13.089 6.99728L7.48903 1.39728M13.089 6.99728L7.48903 12.5973"
                    stroke="#030917"
                    stroke-linecap="round"
                    stroke-linejoin="round" />
                </g>
                <defs>
                  <clipPath id="clip0_201_978321290">
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
        <div class="strategic-img">
          <img src="assets/img/strategic/sticky-1.png" alt="..." />
        </div>
      </div>

    </div>
  </section>

  <?php require_once('footer.php'); ?>
</body>

</html>