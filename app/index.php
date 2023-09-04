<?php 

    require_once __DIR__.'/database/database.php';
    $productDB = require_once __DIR__.'/database/models/productDB.php';
    $product = $productDB->fetchAll();
    $authDB = require_once __DIR__.'/database/security.php';
    $isCurrentCustomer = $authDB->isLoggedin();
  
    require_once __DIR__.'/utils/functions.php';
    

    // if (count($product)) {
    //     $category = category($product);
    //     $productPerCategory = productPerCategory($product);
    //      print_r($caegory);
    //      print_r($productPerCategory);
    // }

   

?>




<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
 <?= require_once __DIR__.'/include/head.php' ?>
 <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body class="body header-fixed counter-scroll">

    <!-- preloade -->
    <div class="preload preload-container">
        <div class="preload-logo"></div>
    </div>
    <!-- /preload -->

    <div id="wrapper" class="wrapper-style">
        
            
        <?= require_once __DIR__.'/include/header.php' ?>

            <section class="tf-slider home3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="swiper-container slider-home ">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-slider-item style-3">
                                                <div class="content-inner">
                                                    
                                                    <h1 class="heading mb0">
                                                        <span class="animationtext clip">
                                                            <span class="cd-words-wrapper">
                                                                <span class="item-text is-visible">STREET</span>
                                                                <span class="item-text is-hidden">STREET</span>
                                                                <span class="item-text is-hidden">STREET</span>
                                                            </span>                                          
                                                        </span>
                                                    </h1>
                                                    <h1 class="heading" style="color: black;"> COLLECTION D'OUTILS </h1>
                                                    <p class="sub-heading" style="color: green;">Le meuilleurs espaces de vente d'outils</p>
                                                    <div class="counter-wrap">
                                                        <div class="tf-counter">
                                                            <div class="content" style="color: green;">
                                                                <span class="counter-number" data-to="2240" data-speed="2000" style="color: black;" >220</span>+
                                                            </div>
                                                            <h6 style="color: black;">Outils</h6>
                                                        </div> 
                                                        <div class="tf-counter">
                                                            <div class="content" style="color: green;">
                                                                <span class="counter-number" data-to="1000" data-speed="2000" style="color: black;" >40</span>+
                                                            </div>
                                                            <h6 style="color: black;">Services</h6>
                                                        </div>  
                                                    </div>
                                                    <!-- <div class="btn-slider ">
                                                        <a href="#" class="tf-button " data-toggle="modal" data-target="#popup_bid">CONNECT WALLET</a>
                                                        <a href="collection.html" class="tf-button style-2">WHITELIST NOW</a>
                                                    </div> -->
                                                </div>
                                                <div class="image">
                                                    <img src="assets/images/slider/slider-8.png" alt="Image" class="img ani5">
                                                    <img src="assets/images/slider/slider-7.png" alt="Image" class="ani4 img-1">
                                                    <img src="assets/images/slider/slider-6.png" alt="Image" class="ani5 img-2">
                                                    
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>

            <section class="tf-collection-ss">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-md-12 wow fadeInUp">
                            <div class="swiper-container collection-1 visible">
                                <div class="swiper-wrapper ">

                                    <?php foreach($product as $prod) :?>

                                        <div class="swiper-slide">
                                         
                                            <div class="slider-item">
                                                <div class="tf-product active">
                                                    <div class="image">
                                                      <div class="image-container" style="background-image: url(<?= $prod['image']?>);"></div>
                                                    </div>
                                                    <h6  class="name"><a href="item-detail.php?id=<?=$prod['id']?>"><?= $prod['name']?></a></h6>
                                            </div>
                                            </div><!-- item-->

                                            
                                            
                                    </div>

                                    <?php endforeach; ?>    
                                    
                                    
                                  
                                   
                                    
                                    
                        
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="tf-about-ss">
                <div class="icon">
                    <svg width="254" height="426" viewBox="0 0 254 426" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_f_2258_552)">
                        <path d="M162.226 50.3816L109.596 154.133L220.194 117.978L241.73 183.858L131.132 220.012L234.883 272.642L203.529 334.452L99.7779 281.822L135.932 392.42L70.0528 413.956L33.8982 303.358L-18.7318 407.109L-80.541 375.755L-27.911 272.004L-138.509 308.158L-160.045 242.279L-49.4471 206.124L-153.198 153.494L-121.844 91.6849L-18.0931 144.315L-54.2477 33.7168L11.632 12.1807L47.7866 122.779L100.417 19.0276L162.226 50.3816Z" fill="url(#paint0_linear_2258_552)"/>
                        </g>
                        <defs>
                        <filter id="filter0_f_2258_552" x="-172.045" y="0.180664" width="425.775" height="425.775" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feGaussianBlur stdDeviation="6" result="effect1_foregroundBlur_2258_552"/>
                        </filter>
                        <linearGradient id="paint0_linear_2258_552" x1="-137.521" y1="122.589" x2="219.206" y2="303.547" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="var(--primary-color35)"/>
                        <stop offset="1" stop-color="var(--primary-color35)" stop-opacity="0"/>
                        </linearGradient>
                        </defs>
                    </svg>
                </div>
                
                    
                
            </section>

            <section class="tf-work-ss">
                <div class="tf-container">
                    <div class="row">   
                        <div class="col-md-12">
                            <div class="title-ss wow fadeInUp">
                                <h3>COMMENT <span>STREET SHOP</span> MARCHE</h3>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 ">
                           <div class="tf-work style-2  wow fadeInUp">
                                <div class="image">
                                    <img id="work-5" src="assets/images/svg/work-5.svg" alt="Image">
                                </div>
                                <h5 class="step">ETAPE 1</h5>
                                <h4 class="title"><a href="#">Connectez Vous</a></h4>
                           </div>
                        </div>   
                        <div class="col-xl-3 col-md-6 ">
                            <div class="tf-work style-2 wow fadeInUp">
                                 <div class="image">
                                     <img id="work-6" src="assets/images/svg/work-6.svg" alt="Image">
                                 </div>
                                 <h5 class="step">ETAPE 2</h5>
                                 <h4 class="title"><a href="#">Selectionnez un Produit</a></h4>
 
                            </div>
                         </div>   
                         <div class="col-xl-3 col-md-6 ">
                            <div class="tf-work style-2 wow fadeInUp">
                                 <div class="image">
                                     <img id="work-7" src="assets/images/svg/work-7.svg" alt="Image">
                                 </div>
                                 <h5 class="step">ETAPE 3</h5>
                                 <h4 class="title"><a href="#">Payer en cryto</a></h4>
 
                            </div>
                         </div>   
                         <div class="col-xl-3 col-md-6 ">
                            <div class="tf-work style-2 mb30 wow fadeInUp">
                                 <div class="image">
                                     <img id="work-8" src="assets/images/svg/work-8.svg" alt="Image">
                                 </div>
                                 <h5 class="step">ETAPE 4</h5>
                                 <h4 class="title"><a href="#">Recevez Le Lien De Téléchargement</a></h4>
                            </div>
                         </div>   
                    </div>
                </div>
            </section>

            <section class="tf-roadmap-ss section-bg-1">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title-ss wow fadeInUp">
                                <h3>PACK D'OUTILS</h3>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="tf-roadmap-style-thumb wow fadeInUp">
                                <div class="swiper sl-roadmap3-thumb">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="content-rm-thumb">
                                                <div class="content-left">
                                                    <div class="thumb-left">
                                                        <img src="assets/images/roadmap/rm-4.jpg" alt="images">
                                                    </div>
                                                    <div class="thumb-right">
                                                        <div class="top">
                                                            <img src="assets/images/roadmap/rm-5.jpg" alt="images">
                                                        </div>
                                                        <div class="bottom">
                                                            <img src="assets/images/roadmap/rm-6.jpg" alt="images">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-right">
                                                    <h3>PHASE 1</h3>
                                                    <ul class="list-infor">
                                                        <li>
                                                            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <g clip-path="url(#clip0_2569_3142)">
                                                                <g clip-path="url(#clip1_2569_3143)">
                                                                <path d="M23.7586 13.2116V17.1713C23.7586 17.2169 23.7577 17.2626 23.755 17.3082C23.7541 17.3172 23.7541 17.327 23.7532 17.3359C23.7515 17.3628 23.7497 17.3896 23.747 17.4174C23.7443 17.4442 23.7416 17.4711 23.738 17.4979C23.7353 17.5239 23.7309 17.5498 23.7273 17.5749C23.721 17.6134 23.7148 17.6509 23.7067 17.6894C23.7022 17.7136 23.6969 17.7368 23.6915 17.761C23.6861 17.7816 23.6808 17.8031 23.6754 17.8245C23.6709 17.8442 23.6656 17.863 23.6593 17.8827C23.6351 17.9695 23.6056 18.0554 23.5716 18.1395C23.5644 18.1574 23.5573 18.1762 23.5492 18.1941C23.5286 18.2433 23.5063 18.2917 23.4821 18.3391C23.4705 18.3632 23.4579 18.3865 23.4454 18.4098L23.4445 18.4089L18.9649 15.9158L11.9492 12.0107L17.2253 9.58203L23.6638 13.1597L23.7586 13.2116Z" fill="url(#paint0_linear_2569_3141)"/>
                                                                <path d="M23.6783 5.82134L22.3127 6.87369L21.1038 8.77436L9.60938 2.37615L13.9772 -0.691406L16.617 0.833426H16.6179L21.4555 3.62627L22.4568 4.20434C23.0734 4.56049 23.5083 5.14752 23.6783 5.82134Z" fill="url(#paint1_linear_2569_3141)"/>
                                                                <path d="M16.6183 0.834005L0 10.3544V6.45817C0 5.52841 0.495749 4.66935 1.30022 4.20492L10.579 -1.15168C11.3834 -1.61611 12.3749 -1.61611 13.1803 -1.15168L16.6183 0.834005Z" fill="#21E786"/>
                                                                <path d="M23.7584 6.45827V7.8104L2.29172 19.9974L1.30022 19.4247C0.495749 18.9594 0 18.1012 0 17.1715V15.822L21.4568 3.62695L22.4582 4.20503C23.2626 4.66946 23.7584 5.52852 23.7584 6.45827Z" fill="#21E786"/>
                                                                <path d="M23.7602 13.1035V17.1706C23.7602 17.2163 23.7593 17.2619 23.7566 17.3075C23.7557 17.3165 23.7557 17.3263 23.7548 17.3353C23.753 17.3621 23.7513 17.389 23.7486 17.4167C23.7459 17.4436 23.7432 17.4704 23.7396 17.4973C23.7369 17.5232 23.7325 17.5492 23.7289 17.5742C23.7226 17.6127 23.7164 17.6503 23.7083 17.6888C23.7038 17.7129 23.6985 17.7362 23.6931 17.7603C23.6877 17.7809 23.6824 17.8024 23.677 17.8239C23.6725 17.8436 23.6671 17.8624 23.6609 17.882C23.6367 17.9688 23.6072 18.0547 23.5732 18.1389C23.566 18.1568 23.5589 18.1756 23.5508 18.1934C23.5302 18.2427 23.5079 18.291 23.4837 18.3384C23.4721 18.3626 23.4595 18.3858 23.447 18.4091C23.4327 18.4351 23.4184 18.461 23.4032 18.4861C23.3888 18.512 23.3727 18.5371 23.3575 18.5621C23.3253 18.6113 23.2922 18.6606 23.2573 18.708C23.2215 18.7563 23.1848 18.8028 23.1472 18.8476C23.1275 18.8709 23.1079 18.8932 23.0882 18.9147C23.0685 18.9371 23.0479 18.9585 23.0273 18.98C22.9862 19.023 22.9432 19.065 22.8985 19.1044C22.8815 19.1205 22.8636 19.1357 22.8457 19.1509C22.8349 19.1599 22.8242 19.1688 22.8135 19.1778C22.792 19.1966 22.7696 19.2145 22.7463 19.2315C22.724 19.2494 22.7016 19.2664 22.6774 19.2825C22.6327 19.3156 22.5862 19.3469 22.5387 19.3764C22.5128 19.3926 22.4868 19.4087 22.46 19.4239L13.1821 24.7805C12.3768 25.2449 11.3853 25.2449 10.5808 24.7805L7.1875 22.8216L18.9665 15.9151L23.6654 13.159L23.7602 13.1035Z" fill="#21E786"/>
                                                                <path d="M4.66577 2.26172V21.3669L2.29172 19.9968L1.30022 19.4241C0.495749 18.9588 0 18.1006 0 17.1709V6.45769C0 5.52794 0.495749 4.66888 1.30022 4.20445L4.66577 2.26172Z" fill="#21E786"/>
                                                                </g>
                                                                </g>
                                                                <defs>
                                                                <linearGradient id="paint0_linear_2569_3141" x1="23.0427" y1="16.1288" x2="13.5125" y2="9.59634" gradientUnits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#00FFA3"/>
                                                                <stop offset="1" stop-color="#00FFA3" stop-opacity="0"/>
                                                                </linearGradient>
                                                                <linearGradient id="paint1_linear_2569_3141" x1="21.4752" y1="7.09024" x2="12.8398" y2="1.4974" gradientUnits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#00FFA3"/>
                                                                <stop offset="1" stop-color="#00FFA3" stop-opacity="0"/>
                                                                </linearGradient>
                                                                <clipPath id="clip0_2569_3143">
                                                                <rect width="24" height="24" fill="white"/>
                                                                </clipPath>
                                                                <clipPath id="clip1_2569_3144">
                                                                <rect width="24" height="26.6667" fill="white" transform="translate(0 -1.5)"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg></div>
                                                            Befriending & Chat Functions
                                                        </li>
                                                        <li>
                                                            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <g clip-path="url(#clip0_2569_3143)">
                                                                <g clip-path="url(#clip1_2569_3144)">
                                                                <path d="M23.7586 13.2116V17.1713C23.7586 17.2169 23.7577 17.2626 23.755 17.3082C23.7541 17.3172 23.7541 17.327 23.7532 17.3359C23.7515 17.3628 23.7497 17.3896 23.747 17.4174C23.7443 17.4442 23.7416 17.4711 23.738 17.4979C23.7353 17.5239 23.7309 17.5498 23.7273 17.5749C23.721 17.6134 23.7148 17.6509 23.7067 17.6894C23.7022 17.7136 23.6969 17.7368 23.6915 17.761C23.6861 17.7816 23.6808 17.8031 23.6754 17.8245C23.6709 17.8442 23.6656 17.863 23.6593 17.8827C23.6351 17.9695 23.6056 18.0554 23.5716 18.1395C23.5644 18.1574 23.5573 18.1762 23.5492 18.1941C23.5286 18.2433 23.5063 18.2917 23.4821 18.3391C23.4705 18.3632 23.4579 18.3865 23.4454 18.4098L23.4445 18.4089L18.9649 15.9158L11.9492 12.0107L17.2253 9.58203L23.6638 13.1597L23.7586 13.2116Z" fill="url(#paint0_linear_2569_3142)"/>
                                                                <path d="M23.6783 5.82134L22.3127 6.87369L21.1038 8.77436L9.60938 2.37615L13.9772 -0.691406L16.617 0.833426H16.6179L21.4555 3.62627L22.4568 4.20434C23.0734 4.56049 23.5083 5.14752 23.6783 5.82134Z" fill="url(#paint1_linear_2569_3142)"/>
                                                                <path d="M16.6183 0.834005L0 10.3544V6.45817C0 5.52841 0.495749 4.66935 1.30022 4.20492L10.579 -1.15168C11.3834 -1.61611 12.3749 -1.61611 13.1803 -1.15168L16.6183 0.834005Z" fill="#21E786"/>
                                                                <path d="M23.7584 6.45827V7.8104L2.29172 19.9974L1.30022 19.4247C0.495749 18.9594 0 18.1012 0 17.1715V15.822L21.4568 3.62695L22.4582 4.20503C23.2626 4.66946 23.7584 5.52852 23.7584 6.45827Z" fill="#21E786"/>
                                                                <path d="M23.7602 13.1035V17.1706C23.7602 17.2163 23.7593 17.2619 23.7566 17.3075C23.7557 17.3165 23.7557 17.3263 23.7548 17.3353C23.753 17.3621 23.7513 17.389 23.7486 17.4167C23.7459 17.4436 23.7432 17.4704 23.7396 17.4973C23.7369 17.5232 23.7325 17.5492 23.7289 17.5742C23.7226 17.6127 23.7164 17.6503 23.7083 17.6888C23.7038 17.7129 23.6985 17.7362 23.6931 17.7603C23.6877 17.7809 23.6824 17.8024 23.677 17.8239C23.6725 17.8436 23.6671 17.8624 23.6609 17.882C23.6367 17.9688 23.6072 18.0547 23.5732 18.1389C23.566 18.1568 23.5589 18.1756 23.5508 18.1934C23.5302 18.2427 23.5079 18.291 23.4837 18.3384C23.4721 18.3626 23.4595 18.3858 23.447 18.4091C23.4327 18.4351 23.4184 18.461 23.4032 18.4861C23.3888 18.512 23.3727 18.5371 23.3575 18.5621C23.3253 18.6113 23.2922 18.6606 23.2573 18.708C23.2215 18.7563 23.1848 18.8028 23.1472 18.8476C23.1275 18.8709 23.1079 18.8932 23.0882 18.9147C23.0685 18.9371 23.0479 18.9585 23.0273 18.98C22.9862 19.023 22.9432 19.065 22.8985 19.1044C22.8815 19.1205 22.8636 19.1357 22.8457 19.1509C22.8349 19.1599 22.8242 19.1688 22.8135 19.1778C22.792 19.1966 22.7696 19.2145 22.7463 19.2315C22.724 19.2494 22.7016 19.2664 22.6774 19.2825C22.6327 19.3156 22.5862 19.3469 22.5387 19.3764C22.5128 19.3926 22.4868 19.4087 22.46 19.4239L13.1821 24.7805C12.3768 25.2449 11.3853 25.2449 10.5808 24.7805L7.1875 22.8216L18.9665 15.9151L23.6654 13.159L23.7602 13.1035Z" fill="#21E786"/>
                                                                <path d="M4.66577 2.26172V21.3669L2.29172 19.9968L1.30022 19.4241C0.495749 18.9588 0 18.1006 0 17.1709V6.45769C0 5.52794 0.495749 4.66888 1.30022 4.20445L4.66577 2.26172Z" fill="#21E786"/>
                                                                </g>
                                                                </g>
                                                                <defs>
                                                                <linearGradient id="paint0_linear_2569_3142" x1="23.0427" y1="16.1288" x2="13.5125" y2="9.59634" gradientUnits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#00FFA3"/>
                                                                <stop offset="1" stop-color="#00FFA3" stop-opacity="0"/>
                                                                </linearGradient>
                                                                <linearGradient id="paint1_linear_2569_3142" x1="21.4752" y1="7.09024" x2="12.8398" y2="1.4974" gradientUnits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#00FFA3"/>
                                                                <stop offset="1" stop-color="#00FFA3" stop-opacity="0"/>
                                                                </linearGradient>
                                                                <clipPath id="clip0_2569_3144">
                                                                <rect width="24" height="24" fill="white"/>
                                                                </clipPath>
                                                                <clipPath id="clip1_2569_3145">
                                                                <rect width="24" height="26.6667" fill="white" transform="translate(0 -1.5)"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg></div>
                                                            Challenging Feature
                                                        </li>
                                                        <li>
                                                            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <g clip-path="url(#clip0_2569_3144)">
                                                                <g clip-path="url(#clip1_2569_3145)">
                                                                <path d="M23.7586 13.2116V17.1713C23.7586 17.2169 23.7577 17.2626 23.755 17.3082C23.7541 17.3172 23.7541 17.327 23.7532 17.3359C23.7515 17.3628 23.7497 17.3896 23.747 17.4174C23.7443 17.4442 23.7416 17.4711 23.738 17.4979C23.7353 17.5239 23.7309 17.5498 23.7273 17.5749C23.721 17.6134 23.7148 17.6509 23.7067 17.6894C23.7022 17.7136 23.6969 17.7368 23.6915 17.761C23.6861 17.7816 23.6808 17.8031 23.6754 17.8245C23.6709 17.8442 23.6656 17.863 23.6593 17.8827C23.6351 17.9695 23.6056 18.0554 23.5716 18.1395C23.5644 18.1574 23.5573 18.1762 23.5492 18.1941C23.5286 18.2433 23.5063 18.2917 23.4821 18.3391C23.4705 18.3632 23.4579 18.3865 23.4454 18.4098L23.4445 18.4089L18.9649 15.9158L11.9492 12.0107L17.2253 9.58203L23.6638 13.1597L23.7586 13.2116Z" fill="url(#paint0_linear_2569_3143)"/>
                                                                <path d="M23.6783 5.82134L22.3127 6.87369L21.1038 8.77436L9.60938 2.37615L13.9772 -0.691406L16.617 0.833426H16.6179L21.4555 3.62627L22.4568 4.20434C23.0734 4.56049 23.5083 5.14752 23.6783 5.82134Z" fill="url(#paint1_linear_2569_3143)"/>
                                                                <path d="M16.6183 0.834005L0 10.3544V6.45817C0 5.52841 0.495749 4.66935 1.30022 4.20492L10.579 -1.15168C11.3834 -1.61611 12.3749 -1.61611 13.1803 -1.15168L16.6183 0.834005Z" fill="#21E786"/>
                                                                <path d="M23.7584 6.45827V7.8104L2.29172 19.9974L1.30022 19.4247C0.495749 18.9594 0 18.1012 0 17.1715V15.822L21.4568 3.62695L22.4582 4.20503C23.2626 4.66946 23.7584 5.52852 23.7584 6.45827Z" fill="#21E786"/>
                                                                <path d="M23.7602 13.1035V17.1706C23.7602 17.2163 23.7593 17.2619 23.7566 17.3075C23.7557 17.3165 23.7557 17.3263 23.7548 17.3353C23.753 17.3621 23.7513 17.389 23.7486 17.4167C23.7459 17.4436 23.7432 17.4704 23.7396 17.4973C23.7369 17.5232 23.7325 17.5492 23.7289 17.5742C23.7226 17.6127 23.7164 17.6503 23.7083 17.6888C23.7038 17.7129 23.6985 17.7362 23.6931 17.7603C23.6877 17.7809 23.6824 17.8024 23.677 17.8239C23.6725 17.8436 23.6671 17.8624 23.6609 17.882C23.6367 17.9688 23.6072 18.0547 23.5732 18.1389C23.566 18.1568 23.5589 18.1756 23.5508 18.1934C23.5302 18.2427 23.5079 18.291 23.4837 18.3384C23.4721 18.3626 23.4595 18.3858 23.447 18.4091C23.4327 18.4351 23.4184 18.461 23.4032 18.4861C23.3888 18.512 23.3727 18.5371 23.3575 18.5621C23.3253 18.6113 23.2922 18.6606 23.2573 18.708C23.2215 18.7563 23.1848 18.8028 23.1472 18.8476C23.1275 18.8709 23.1079 18.8932 23.0882 18.9147C23.0685 18.9371 23.0479 18.9585 23.0273 18.98C22.9862 19.023 22.9432 19.065 22.8985 19.1044C22.8815 19.1205 22.8636 19.1357 22.8457 19.1509C22.8349 19.1599 22.8242 19.1688 22.8135 19.1778C22.792 19.1966 22.7696 19.2145 22.7463 19.2315C22.724 19.2494 22.7016 19.2664 22.6774 19.2825C22.6327 19.3156 22.5862 19.3469 22.5387 19.3764C22.5128 19.3926 22.4868 19.4087 22.46 19.4239L13.1821 24.7805C12.3768 25.2449 11.3853 25.2449 10.5808 24.7805L7.1875 22.8216L18.9665 15.9151L23.6654 13.159L23.7602 13.1035Z" fill="#21E786"/>
                                                                <path d="M4.66577 2.26172V21.3669L2.29172 19.9968L1.30022 19.4241C0.495749 18.9588 0 18.1006 0 17.1709V6.45769C0 5.52794 0.495749 4.66888 1.30022 4.20445L4.66577 2.26172Z" fill="#21E786"/>
                                                                </g>
                                                                </g>
                                                                <defs>
                                                                <linearGradient id="paint0_linear_2569_3143" x1="23.0427" y1="16.1288" x2="13.5125" y2="9.59634" gradientUnits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#00FFA3"/>
                                                                <stop offset="1" stop-color="#00FFA3" stop-opacity="0"/>
                                                                </linearGradient>
                                                                <linearGradient id="paint1_linear_2569_3143" x1="21.4752" y1="7.09024" x2="12.8398" y2="1.4974" gradientUnits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#00FFA3"/>
                                                                <stop offset="1" stop-color="#00FFA3" stop-opacity="0"/>
                                                                </linearGradient>
                                                                <clipPath id="clip0_2569_3145">
                                                                <rect width="24" height="24" fill="white"/>
                                                                </clipPath>
                                                                <clipPath id="clip1_2569_3146">
                                                                <rect width="24" height="26.6667" fill="white" transform="translate(0 -1.5)"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg></div>
                                                            Corsair Wheel
                                                        </li>
                                                        <li>
                                                            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <g clip-path="url(#clip0_2569_3145)">
                                                                <g clip-path="url(#clip1_2569_3146)">
                                                                <path d="M23.7586 13.2116V17.1713C23.7586 17.2169 23.7577 17.2626 23.755 17.3082C23.7541 17.3172 23.7541 17.327 23.7532 17.3359C23.7515 17.3628 23.7497 17.3896 23.747 17.4174C23.7443 17.4442 23.7416 17.4711 23.738 17.4979C23.7353 17.5239 23.7309 17.5498 23.7273 17.5749C23.721 17.6134 23.7148 17.6509 23.7067 17.6894C23.7022 17.7136 23.6969 17.7368 23.6915 17.761C23.6861 17.7816 23.6808 17.8031 23.6754 17.8245C23.6709 17.8442 23.6656 17.863 23.6593 17.8827C23.6351 17.9695 23.6056 18.0554 23.5716 18.1395C23.5644 18.1574 23.5573 18.1762 23.5492 18.1941C23.5286 18.2433 23.5063 18.2917 23.4821 18.3391C23.4705 18.3632 23.4579 18.3865 23.4454 18.4098L23.4445 18.4089L18.9649 15.9158L11.9492 12.0107L17.2253 9.58203L23.6638 13.1597L23.7586 13.2116Z" fill="url(#paint0_linear_2569_3144)"/>
                                                                <path d="M23.6783 5.82134L22.3127 6.87369L21.1038 8.77436L9.60938 2.37615L13.9772 -0.691406L16.617 0.833426H16.6179L21.4555 3.62627L22.4568 4.20434C23.0734 4.56049 23.5083 5.14752 23.6783 5.82134Z" fill="url(#paint1_linear_2569_3144)"/>
                                                                <path d="M16.6183 0.834005L0 10.3544V6.45817C0 5.52841 0.495749 4.66935 1.30022 4.20492L10.579 -1.15168C11.3834 -1.61611 12.3749 -1.61611 13.1803 -1.15168L16.6183 0.834005Z" fill="#21E786"/>
                                                                <path d="M23.7584 6.45827V7.8104L2.29172 19.9974L1.30022 19.4247C0.495749 18.9594 0 18.1012 0 17.1715V15.822L21.4568 3.62695L22.4582 4.20503C23.2626 4.66946 23.7584 5.52852 23.7584 6.45827Z" fill="#21E786"/>
                                                                <path d="M23.7602 13.1035V17.1706C23.7602 17.2163 23.7593 17.2619 23.7566 17.3075C23.7557 17.3165 23.7557 17.3263 23.7548 17.3353C23.753 17.3621 23.7513 17.389 23.7486 17.4167C23.7459 17.4436 23.7432 17.4704 23.7396 17.4973C23.7369 17.5232 23.7325 17.5492 23.7289 17.5742C23.7226 17.6127 23.7164 17.6503 23.7083 17.6888C23.7038 17.7129 23.6985 17.7362 23.6931 17.7603C23.6877 17.7809 23.6824 17.8024 23.677 17.8239C23.6725 17.8436 23.6671 17.8624 23.6609 17.882C23.6367 17.9688 23.6072 18.0547 23.5732 18.1389C23.566 18.1568 23.5589 18.1756 23.5508 18.1934C23.5302 18.2427 23.5079 18.291 23.4837 18.3384C23.4721 18.3626 23.4595 18.3858 23.447 18.4091C23.4327 18.4351 23.4184 18.461 23.4032 18.4861C23.3888 18.512 23.3727 18.5371 23.3575 18.5621C23.3253 18.6113 23.2922 18.6606 23.2573 18.708C23.2215 18.7563 23.1848 18.8028 23.1472 18.8476C23.1275 18.8709 23.1079 18.8932 23.0882 18.9147C23.0685 18.9371 23.0479 18.9585 23.0273 18.98C22.9862 19.023 22.9432 19.065 22.8985 19.1044C22.8815 19.1205 22.8636 19.1357 22.8457 19.1509C22.8349 19.1599 22.8242 19.1688 22.8135 19.1778C22.792 19.1966 22.7696 19.2145 22.7463 19.2315C22.724 19.2494 22.7016 19.2664 22.6774 19.2825C22.6327 19.3156 22.5862 19.3469 22.5387 19.3764C22.5128 19.3926 22.4868 19.4087 22.46 19.4239L13.1821 24.7805C12.3768 25.2449 11.3853 25.2449 10.5808 24.7805L7.1875 22.8216L18.9665 15.9151L23.6654 13.159L23.7602 13.1035Z" fill="#21E786"/>
                                                                <path d="M4.66577 2.26172V21.3669L2.29172 19.9968L1.30022 19.4241C0.495749 18.9588 0 18.1006 0 17.1709V6.45769C0 5.52794 0.495749 4.66888 1.30022 4.20445L4.66577 2.26172Z" fill="#21E786"/>
                                                                </g>
                                                                </g>
                                                                <defs>
                                                                <linearGradient id="paint0_linear_2569_3144" x1="23.0427" y1="16.1288" x2="13.5125" y2="9.59634" gradientUnits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#00FFA3"/>
                                                                <stop offset="1" stop-color="#00FFA3" stop-opacity="0"/>
                                                                </linearGradient>
                                                                <linearGradient id="paint1_linear_2569_3144" x1="21.4752" y1="7.09024" x2="12.8398" y2="1.4974" gradientUnits="userSpaceOnUse">
                                                                <stop offset="1" stop-color="#00FFA3"/>
                                                                <stop offset="1" stop-color="#00FFA3" stop-opacity="0"/>
                                                                </linearGradient>
                                                                <clipPath id="clip0_2569_3146">
                                                                <rect width="24" height="24" fill="white"/>
                                                                </clipPath>
                                                                <clipPath id="clip1_2569_3147">
                                                                <rect width="24" height="26.6667" fill="white" transform="translate(0 -1.5)"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg></div>
                                                            Mobile Version Launch
                                                        </li>
                                                    </ul>
                                                    <a href="item-detail.html" class="tf-button style-2">READ MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                      
                                        
                                <div class="swiper sl-roadmap3">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                <div class="thumb-rm">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                            <circle class="fill-pri" opacity="0.1" cx="15.5" cy="15" r="15" fill="var(--product-color21)"/>
                            <circle class="fill-pri" cx="15.5" cy="15" r="7.5" fill="#888B8E"/>
                        </svg>
                    </div>
                    <h5>PHASE 1</h5>
                </div>
                                        </div>
                                        <div class="swiper-slide">
                <div class="thumb-rm">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                            <circle class="fill-pri" opacity="0.1" cx="15.5" cy="15" r="15" fill="var(--product-color21)"/>
                            <circle class="fill-pri" cx="15.5" cy="15" r="7.5" fill="#888B8E"/>
                        </svg>
                    </div>
                    <h5>PHASE 2</h5>
                </div>
                                        </div>
                                        <div class="swiper-slide">
                <div class="thumb-rm">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                            <circle class="fill-pri" opacity="0.1" cx="15.5" cy="15" r="15" fill="var(--product-color21)"/>
                            <circle class="fill-pri" cx="15.5" cy="15" r="7.5" fill="#888B8E"/>
                        </svg>
                    </div>
                    <h5>PHASE 3</h5>
                </div>
                                        </div>
                                        <div class="swiper-slide">
                <div class="thumb-rm">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                            <circle class="fill-pri" opacity="0.1" cx="15.5" cy="15" r="15" fill="var(--product-color21)"/>
                            <circle class="fill-pri" cx="15.5" cy="15" r="7.5" fill="#888B8E"/>
                        </svg>
                    </div>
                    <h5>PHASE 4</h5>
                </div>
                                        </div>
                                        <div class="swiper-slide">
                <div class="thumb-rm">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                            <circle class="fill-pri" opacity="0.1" cx="15.5" cy="15" r="15" fill="var(--product-color21)"/>
                            <circle class="fill-pri" cx="15.5" cy="15" r="7.5" fill="#888B8E"/>
                        </svg>
                    </div>
                    <h5>PHASE 5</h5>
                </div>
                                        </div>
                                        <div class="swiper-slide">
                <div class="thumb-rm">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                            <circle class="fill-pri" opacity="0.1" cx="15.5" cy="15" r="15" fill="var(--product-color21)"/>
                            <circle class="fill-pri" cx="15.5" cy="15" r="7.5" fill="#888B8E"/>
                        </svg>
                    </div>
                    <h5>PHASE 6</h5>
                </div>
                                        </div>
                                        <div class="swiper-slide">
                <div class="thumb-rm">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                            <circle class="fill-pri" opacity="0.1" cx="15.5" cy="15" r="15" fill="var(--product-color21)"/>
                            <circle class="fill-pri" cx="15.5" cy="15" r="7.5" fill="#888B8E"/>
                        </svg>
                    </div>
                    <h5>PHASE 7</h5>
                </div>
                                        </div>
                                        <div class="swiper-slide">
                <div class="thumb-rm">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                            <circle class="fill-pri" opacity="0.1" cx="15.5" cy="15" r="15" fill="var(--product-color21)"/>
                            <circle class="fill-pri" cx="15.5" cy="15" r="7.5" fill="#888B8E"/>
                        </svg>
                    </div>
                    <h5>PHASE 8</h5>
                </div>
                                        </div>
                                        <div class="swiper-slide">
                <div class="thumb-rm">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                            <circle class="fill-pri" opacity="0.1" cx="15.5" cy="15" r="15" fill="var(--product-color21)"/>
                            <circle class="fill-pri" cx="15.5" cy="15" r="7.5" fill="#888B8E"/>
                        </svg>
                    </div>
                    <h5>PHASE 9</h5>
                </div>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- <section class="tf-section team tf-team-ss">
                <div class="icon">
                    <svg width="250" height="473" viewBox="0 0 250 473" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_f_2673_3126)">
                        <path d="M149.737 53.4772L90.521 170.211L214.959 129.532L239.19 203.656L114.752 244.335L231.486 303.551L196.209 373.095L79.4746 313.879L120.153 438.317L46.0298 462.548L5.35093 338.11L-53.865 454.844L-123.409 419.566L-64.1928 302.832L-188.631 343.511L-212.862 269.388L-88.4239 228.709L-205.158 169.493L-169.881 99.949L-53.1464 159.165L-93.8253 34.727L-19.7016 10.4959L20.9773 134.934L80.1932 18.1996L149.737 53.4772Z" fill="url(#paint0_linear_2673_3126)"/>
                        </g>
                        <defs>
                        <filter id="filter0_f_2673_3126" x="-222.861" y="0.496094" width="472.051" height="472.052" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feGaussianBlur stdDeviation="5" result="effect1_foregroundBlur_2673_3126"/>
                        </filter>
                        <linearGradient id="paint0_linear_2673_3126" x1="-187.519" y1="134.721" x2="213.848" y2="338.323" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="var(--primary-color35)"/>
                        <stop offset="1" stop-color="var(--primary-color35)" stop-opacity="0"/>
                        </linearGradient>
                        </defs>
                    </svg>                              
                </div>
                <div class="tf-container">
                    <div class="row justify-content-center">   
                        <div class="col-md-12 ">
                            <div class="tf-heading mb60 wow fadeInUp">
                                <h2 class="heading">OUR TEAM</h2>
                            </div>
                        </div> 
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
                           <div class="tf-team">
                                <div class="image">
                                    <img src="assets/images/team/team-1.jpg" alt="Image">
                                </div>
                                <h4 class="name"><a href="team.html">Ralph Edwards</a></h4>
                                <p class="position">Founder</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-telegram"></i></a></li>
                                </ul>
                           </div>
                        </div>   
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <div class="tf-team active">
                                 <div class="image">
                                     <img src="assets/images/team/team-2.jpg" alt="Image">
                                 </div>
                                 <h4 class="name"><a href="team.html">Jason Smith</a></h4>
                                 <p class="position">Co - Founder</p>
                                 <ul class="social">
                                     <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                     <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                     <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                     <li><a href="#"><i class="fab fa-telegram"></i></a></li>
                                 </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <div class="tf-team">
                                <div class="image">
                                    <img src="assets/images/team/team-3.jpg" alt="Image">
                                </div>
                                <h4 class="name"><a href="team.html">Tony Wings</a></h4>
                                <p class="position">Web Designer</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <div class="tf-team">
                                <div class="image">
                                    <img src="assets/images/team/team-4.jpg" alt="Image">
                                </div>
                                <h4 class="name"><a href="team.html">Esther Howard</a></h4>
                                <p class="position">Project Manager</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <div class="tf-team">
                                <div class="image">
                                    <img src="assets/images/team/team-5.jpg" alt="Image">
                                </div>
                                <h4 class="name"><a href="team.html">Jenny Wilson</a></h4>
                                <p class="position">Artist</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>  

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <div class="tf-team">
                                <div class="image">
                                    <img src="assets/images/team/team-6.jpg" alt="Image">
                                </div>
                                <h4 class="name"><a href="team.html">Robert Fox</a></h4>
                                <p class="position">UI/UX Designer</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>  
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <div class="tf-team">
                                <div class="image">
                                    <img src="assets/images/team/team-7.jpg" alt="Image">
                                </div>
                                <h4 class="name"><a href="team.html">Devon Lane</a></h4>
                                <p class="position">Ux Architect</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                          
                    </div>
                </div>
            </section> -->

            <!-- <section class=" tf-section tf-partner-sec tf-partner-ss">
                <div class="icon">
                    <svg width="126" height="308" viewBox="0 0 126 308" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_f_2679_13668)">
                        <path d="M-15.1902 297.004L-36.5388 217.33L-77.7885 288.777L-120.347 264.205L-79.0973 192.759L-158.771 214.107L-171.49 166.642L-91.8156 145.293L-163.262 104.043L-138.691 61.485L-67.2445 102.735L-88.5931 23.0606L-41.1276 10.3423L-19.779 90.0164L21.4708 18.5697L64.0293 43.1409L22.7795 114.588L102.454 93.239L115.172 140.704L35.4978 162.053L106.945 203.303L82.3734 245.861L10.9267 204.612L32.2753 284.286L-15.1902 297.004Z" fill="url(#paint0_linear_2679_13668)"/>
                        </g>
                        <defs>
                        <filter id="filter0_f_2679_13668" x="-181.49" y="0.342773" width="306.662" height="306.661" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feGaussianBlur stdDeviation="5" result="effect1_foregroundBlur_2679_13668"/>
                        </filter>
                        <linearGradient id="paint0_linear_2679_13668" x1="108.813" y1="116.972" x2="-165.131" y2="190.375" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="var(--primary-color35)"/>
                        <stop offset="1" stop-color="var(--primary-color35)" stop-opacity="0"/>
                        </linearGradient>
                        </defs>
                    </svg>       
                </div>
                <div class="tf-container">
                    <div class="row">   
                        <div class="col-md-12 ">
                            <div class="tf-heading mb60 wow fadeInUp">
                                <h2 class="heading"><span>BINABOX</span> PARTNER</h2>
                            </div>
                        </div>
                        <div class="col-md-12 wow fadeInUp">
                            <div class="swiper-container partner ">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-1.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-2.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-3.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-4.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-5.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-6.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
                        <div class="col-md-12 ">
                            <div class="swiper-container partner-2 style-2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-7.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-8.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-9.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-10.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-11.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-12.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 
                        </div> 
                        <div class="col-md-12 ">
                            <div class="swiper-container partner ">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-13.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-14.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-15.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-16.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-17.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="tf-partner">
                                                <img src="assets/images/partner/partner-18.png" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 
                        </div>                  
                        
                    </div>
                </div>
            </section> -->

            <!-- <section class="tf-faq tf-section tf-faq-ss">
                
                <div class="tf-container">
                   <div class="row justify-content-center">

                    <div class="col-md-12">
                        <div class="title-ss wow fadeInUp">
                            <h3>FAQS</h3>
                            
                        </div>
                    </div>

                        <div class="col-md-8">
                            <div class="tf-flat-accordion2 wow fadeInUp">
                                <div class="flat-toggle2 active">
                                    <h6 class="toggle-title active">What are the NFTs?</h6>
                                    <div class="toggle-content">
                                    <p>Urna vitae erat et lacus, consectetur ac nulla vestibulum lobortis. Nulla dapibus urna volutpat venenatis, risus faucibus.
                                    </p>
                                    </div>
                                </div>
                                <div class="flat-toggle2">
                                    <h6 class="toggle-title">How do i get NFTs?</h6>
                                    <div class="toggle-content">
                                    <p>Urna vitae erat et lacus, consectetur ac nulla vestibulum lobortis. Nulla dapibus urna volutpat venenatis, risus faucibus.
                                    </p>
                                    </div>
                                </div>
                                <div class="flat-toggle2">
                                    <h6 class="toggle-title">How can we buy your NFTs?</h6>
                                    <div class="toggle-content">
                                    <p>Urna vitae erat et lacus, consectetur ac nulla vestibulum lobortis. Nulla dapibus urna volutpat venenatis, risus faucibus.
                                    </p>
                                    </div>
                                </div>
                                <div class="flat-toggle2">
                                    <h6 class="toggle-title">Who are the team behind the project?</h6>
                                    <div class="toggle-content">
                                    <p>Urna vitae erat et lacus, consectetur ac nulla vestibulum lobortis. Nulla dapibus urna volutpat venenatis, risus faucibus.
                                    </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </section> -->

            <!-- Footer -->
            <?= include './include/footer.php'?>
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <a id="scroll-top"></a>

    <div class="modal fade popup" id="popup_bid" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                
                <div class="modal-body ">
                    <a href="#" class="btn-close" data-dismiss="modal"><i class="fal fa-times"></i></a>
                    <h3>Connect Your Wallet</h3>  
                    <p class="sub-heading">Select what network and wallet you want to connect below</p>
                    
                    <div class="tf-wallet">
                        <div class="image">
                            <img src="assets/images/svg/icon-wallet-1.svg" alt="Image">
                        </div>
                        <div class="content">
                            <div class="title">Meta Mask</div>
                            <div class="sub">Conntect to you Metamask wallet</div>
                        </div>
                    </div>
                    <div class="tf-wallet">
                        <div class="image">
                            <img src="assets/images/svg/icon-wallet-2.svg" alt="Image">
                        </div>
                        <div class="content">
                            <div class="title">Fortmatic</div>
                            <div class="sub">Conntect to you Fortmatic wallet</div>
                        </div>
                    </div>
                    <div class="tf-wallet">
                        <div class="image">
                            <img src="assets/images/svg/icon-wallet-3.svg" alt="Image">
                        </div>
                        <div class="content">
                            <div class="title">Bitski</div>
                            <div class="sub">Conntect to you Bitski wallet</div>
                        </div>
                    </div>
                    <div class="tf-wallet mb30">
                        <div class="image">
                            <img src="assets/images/svg/icon-wallet-4.svg" alt="Image">
                        </div>
                        <div class="content">
                            <div class="title">Wallet Connect</div>
                            <div class="sub">Scan with your mobile device to connect</div>
                        </div>
                    </div>
                    <div class="bottom">By connecting your wallet, you agree to our <a href="#">Terms of Service</a> and our <a href="#">Privacy Policy.</a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>

    <script src="assets/js/textanimation.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/switchmode.js"></script>
    <script src="assets/js/countto.js"></script>
    <script src="assets/js/plugin.js"></script>
    <script src="assets/js/shortcodes.js"></script>
    <script src="assets/js/main.js"></script>
    

</body>

</html>