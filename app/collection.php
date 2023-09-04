<?php
    require_once __DIR__.'/database/database.php';
     $productDB = require_once __DIR__.'/database/models/productDB.php';
    require_once __DIR__.'/utils/functions.php';
     $authDB = require_once __DIR__.'/database/security.php';
     $isCurrentCustomer = $authDB->isLoggedin();

  
  
  $_GET = filter_input_array(INPUT_GET,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $categ = $_GET['cat'] ?? '';
    
  $productOn = $productDB->fetchAllCategory($categ);
  $product = $productDB->fetchAll();

  //Trie les categorie
  function category($product):array{
      $catgrp = array_map(fn($a)=>$a['category'],$product);
      $category = array_reduce($catgrp,function($acc,$cat){
          if (isset($acc[$cat])) {
              $acc[$cat]++;
          }else{
              $acc[$cat] = 1;
          }
          return $acc;
      },[]);
      return $category;
  }
  
  //Trie les Produits Par Categorie
//   function productPerCategory($product):array{
      
//      $tab = array_reduce($product,function($acc,$prod){
//           if (isset($acc[$prod['category']])) {
//               $acc[$prod['category']] = [...$acc[$prod['category']],$prod];
              
//           } else{
//               $acc[$prod['category']] = $prod;
//           }
         
//         return $acc;
//        },[]);
      
//       return $tab;
//   }

 $category = category($product);
 

 
?>





<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <?= require_once __DIR__.'/include/head.php' ?>
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body class="body header-fixed">

    <!-- preloade -->
    <div class="preload preload-container">
        <div class="preload-logo"></div>
    </div>
    <!-- /preload -->

    <div id="wrapper" class="wrapper-style">
        <div id="page" class="clearfix">
         
                <?= require_once __DIR__.'/include/header.php' ?>
         
                
            <!-- title page -->
            <section class="tf-page-title">    
                <div class="tf-container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="page-title-heading"> COLLECTION DE <?= strtoupper($categ) ?></h2>
                            <ul class="breadcrumbs">
                                <li><a href="index.php">HOME</a></li>
                                <li>COLLECTIONS</li>
                            </ul> 
                        </div>
                    </div>
                </div>                    
            </section>

            <section class="tf-collection-inner">
                <div class="tf-container">
                    <div class="row ">
                        <div class="col-lg-8 col-md-4">
                            <div class="sidebar sidebar-collection">
                                <div class="widget widget-clothing widget-accordion">
                                    <h6 class="widget-title active">OUTILS</h6>
                                    <div class="widget-content">
                                        <form action="#" class="form-checkbox">
                                        <?php foreach ($category as $cat => $catvalues ) : ?>
                                           
                                            <label class="checkbox-item">
                                         
                                            <a href="collection.php?cat=<?=$cat?>"> 
                                                <!-- <span class="custom-checkbox">
                                                    <input type="checkbox" >
                                                    <span class="btn-checkbox"></span>
                                                </span> -->
                                              
                                                <?=$cat?>
                                             </a>                                               
                                            </label>
                                         <?php endforeach; ?>  
                                        </form>
                                    </div>
                                </div> 
                              
                                    </div>
                                </div>
                                 
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 ">
                            <div class="top-option">
                                <h2 class="heading"><?= strtoupper($categ) ?></h2>
                                
                                <!-- <div class="widget widget-search">
                                    <form action="#">
                                        <input type="text" placeholder="Search NFT" required="">
                                        <a class="btn-search"><i class="icon-fl-search-filled"></i></a>
                                    </form>
                                </div> -->
                                
                            </div>
                            <!-- <ul class="filter-content">
                                <li><a href="#">King <i class="fal fa-times"></i></a></li>
                                <li><a href="#">Mix <i class="fal fa-times"></i></a></li>
                                <li><a href="#">Skacura <i class="fal fa-times"></i></a></li>
                                <li><a href="#">Clear All</a></li>
                            </ul> -->
                            <div class="row">
                            <?php foreach ($productOn as $pro): ?>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 ">
                                    <div class="tf-product">
                                         <div class="image">
                                             <div class="image-container" style="background-image: url(<?= $pro['image']?>);"></div>
                                         </div>
                                         <h6 class="name"><a href="item-detail.php?id=<?=$pro['id'] ?>"><?=$pro['name'] ?></a></h6>
                                    </div>
                                </div>
                              <?php endforeach; ?>  
                            </div>
                             
                        </div>
                    </div>
                    
                </div>
            </section>

           <!-- Footer -->
           <footer class="footer">
                <div class="action-box">
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="action-box-inner">
                                    <h2 class="title">REJOINDRE NOTRE COMMUNAUTE</h2>
                                        <div class="group-btn">
                                        <a href="#" class="tf-button discord" data-toggle="modal" data-target="#popup_bid">
                                        <img width="30" height="30" src="https://img.icons8.com/fluency/48/telegram-app.png" alt="telegram-app"/>
                                        <span>TELEGRAM</span></a>
                                        <a href="collection.html" class="tf-button">NOS OUTILS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-inner">
                    <!-- <div class="tf-container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-3 col-md-12">
                                <div class="widget widget-infor">
                                    <div class="logo">
                                        <img id="logo_footer" src="assets/images/logo/logo-footer.png" alt="Image">
                                    </div>
                                    <p class="content">We are the best way to check the rarity of NFT collection.</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12">
                                <div class="widget widget-menu">
                                    <div class="menu menu-1">
                                        <h6 class="widget-title">SUBSCRIBE</h6>
                                        <ul >
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="about1.html">About</a></li>
                                            <li><a href="roadmap-1.html">Roadmap</a></li>
                                            <li><a href="team.html">Our Team</a></li>
                                            <li><a href="faq1.html">FAQs</a></li>
                                        </ul>
                                    </div>
                                    <div class="menu menu-2">
                                        <h6 class="widget-title">COMPANY</h6>
                                        <ul >
                                            <li><a href="about2.html">About Us 2</a></li>
                                            <li><a href="roadmap-2.html">Road Map 2</a></li>
                                            <li><a href="testimonial.html">Testimonial</a></li>
                                            <li><a href="item-detail.html">Item Details</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5 col-md-12">
                                <div class="widget widget-subcribe">
                                    <h6 class="widget-title">SUBSCRIBE</h6>
                                    <form action="#" id="subscribe-form">
                                        <input type="email" placeholder="Enter your email" required="" id="subscribe-email">
                                        <button class="tf-button" type="submit" id="subscribe-button">SUBSCRIBE</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="bottom-inner">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bottom">
                            
                               <div class="content-left">
                                    <img src="assets/images/logo/logo-bottom.png" alt="Image">
                                    <p class="copy-right">STREETSHOP 2022 - ALL rights reserved</p>
                               </div>

                                <!-- <ul class="menu-bottom">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about1.html">About</a></li>
                                    <li><a href="roadmap-1.html">Roadmap</a></li>
                                    <li><a href="team.html">Our Team</a></li>
                                    <li><a href="faq1.html">FAQs</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           </footer>

        <!-- Bottom -->

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
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/switchmode.js"></script>
    <script src="assets/js/count-down.js"></script>
    <script src="assets/js/plugin.js"></script>
    <script src="assets/js/shortcodes.js"></script>
    <script src="assets/js/main.js"></script>
    

</body>

</html>