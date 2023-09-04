<?php
    require_once __DIR__.'/database/database.php';
   
    $productDB = require_once __DIR__.'/database/models/productDB.php';
    $authDB = require_once __DIR__.'/database/security.php';
    $tscCrypto = require_once __DIR__.'/database/models/transaction_Crypto.php';
    //  require_once __DIR__.'/utils/functions.php';
     $productall = $productDB->fetchAll();
     
     
     $isCurrentCustomer = $authDB->isLoggedin();
    
      
     if (!$isCurrentCustomer) {
        header('Location: /sign-in.php');
     }
  
      //User en Cours
      $idsession = $_COOKIE['session'];

      if($idsession){
         $session = $authDB->ReadSession($idsession);
         $customer;
     
              foreach ($session as $ses) {
                
                $customer = $authDB->GetCustomerBySession(($ses['idcustomer'])); 
     
              }
        }
      //fin User
     
     


  
  
  $_GET = filter_input_array(INPUT_GET,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $id = $_GET['id'] ?? '';
    
  $product = $productDB->fetchById($id);
   
 
 

 

  ?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
   <?= require_once __DIR__.'/include/head.php' ?>
    <link rel="stylesheet" href="./assets/css/item-detail.css">
    
    <script id="boxcoin" src="http://localhost:3000/js/client.js"></script>
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
                            <h2 class="page-title-heading">ITEM DETAIL</h2>
                            <ul class="breadcrumbs">
                                <li><a href="index.html">HOME</a></li>
                                <li>ITEM DETAIL</li>
                            </ul> 
                        </div>
                    </div>
                </div>                    
            </section>

            <section class=" tf-item-detail ">
                <div class="tf-container">
                   <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="tf-item-detail-image">
                                <div class="image-container" style="background-image: url(<?= $product['image']?>);"></div>
                                 <div class="countdown-inner">
                                    <h4 class="heading"><?= $product['name']?></h4>
                                    <!-- <div class="countdown style-2">
                                        <span class="js-countdown" data-timer="1655555" data-labels=" DAYS,  HOURS  , MINUTES  , SECONDS "></span>
                                    </div> -->
                                </div>   
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="tf-item-detail-inner">
                                <h2 class="title"><?=$product['name'] ?></h2>
                                <p class="des"><?=$product['description'] ?>
                                </p>
                                <div class="infor-item-wrap">
                                    <div class="infor-item-box">
                                        <h4 class="name">PAYMENT CRYPTO</h4>
                                    </div>
                                    
                                    <!-- <div class="infor-item-box">
                                        <div class="category">Background</div>
                                        <h4 class="name">GREEN LIGHT</h4>
                                    </div>
                                    <div class="infor-item-box">
                                        <div class="category">Special</div>
                                        <h4 class="name">CAT</h4>
                                    </div> -->
                                </div> 
                                <div class="price">
                                    <span class="heading">PRIX:</span>
                                    <span><?=$product['prix'] ?> €</span>
                                </div>
                                <div class="group-btn">
                                    <a data-toggle="modal" class="tf-button connect" data-toggle="modal" data-target="#popup_bid"  ><i class="icon-fl-bag"></i> Acheter</a>
                                   
                                    
                                   <!-- <div class="group-2">
                                        <a href="#" class="tf-button style-2 "><i class="icon-fl-vt"></i> JOIN DISCORD</a>
                                        <a href="#" class="tf-button style-2 twitter"><i class="fab fa-twitter"></i> JOIN TWITTER</a>
                                        
 
                                   </div> -->

   

                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </section>

            <section class=" tf-collection ">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tf-heading mb40">
                                <h2 class="heading">EXPLORE COLECTIONS</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="swiper-container collection visible">
                                
                                    <div class="swiper-wrapper ">
                                      <?php foreach($productall as $prod) :?>
                                        <div class="swiper-slide">
                                            <div class="slider-item">
                                                <div class="tf-product">
                                                    <div class="image">
                                                        <div class="image-containere" style="background-image: url(<?= $prod['image']?>);"></div>
                                                    </div>
                                                    <h6  class="name"><a href="item-detail.php?id=<?=$prod['id']?>"><?= $prod['name']?></a></h6>
                                                </div>
                                            </div>
                                        </div>
                                      <?php endforeach; ?> 
                                    </div> 
                               

                                <div class="group-btn-nav">
                                    <div class="swiper-button-prev button-collection-prev"></div>
                                    <div class="swiper-button-next button-collection-next"></div>
                                </div>
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

    <!-- popopup -->
       
    <div class="modal fade popup" id="popup_bid" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                
                <div class="modal-body ">
                    <a href="#" class="btn-close" data-dismiss="modal"><i class="fal fa-times"></i></a>
                    <h3>Finaliser Votre Achat</h3>  
                    <p class="sub-heading">Ecrivez Votre Email de Reception  de votre Produit</p>
                    
                    <div class="tf-wallet">
                        <div class="image">
                            <!-- <img src="assets/images/svg/icon-wallet-1.svg" alt="Image"> -->
                        <div class="image-pop" style="background-image: url(<?= $product['image']?>);"></div>

                        </div>

                        <div class="content">
                            <div class="title"><?=$product['name'] ?></div>
                            <div class="sub"><?=$product['prix'] ?> Euro</div>
                          
                        </div>

                       
                    </div>

                     <form action="/pay.php?checkout_id=custom-1690426141&price=<?= $product['prix']?>&currency=usd" method="POST">
                     
                                    <fieldset><input id="name" name="email" tabindex="1" aria-required="true" required="" type="email" placeholder="Email" value="<?= $customer['email']?>"></fieldset>
                                    <h5></h5>
                                    <fieldset><input id="id" hidden name="id" tabindex="1" aria-required="true" required="" type="text" placeholder="Email" value="<?= $product['id']?>"></fieldset>
                                    <fieldset><input id="namep" hidden name="name" tabindex="1" aria-required="true" required="" type="text" placeholder="Email" value="<?= $product['name']?>"></fieldset>
                                    <fieldset><input id="prix" hidden name="prix" tabindex="1" aria-required="true" required="" type="text" placeholder="Email" value="<?= $product['prix']?>"></fieldset>


                                    <button  type="submit">envoyer</button>

                                    
                                    
                                    
                  </form> 
                   
                    <div class="bottom">Pour des raison de sécurité vos produits sont envoyés <a href="#">Sur Votre Email De Reception</a> <a href="#">.</a></div>
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