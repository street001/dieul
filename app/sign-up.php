<?php
    $pdo = require_once __DIR__.'/database/database.php';

    $authDB = require_once __DIR__.'/database/security.php';
    $productDB = require_once __DIR__.'/database/models/productDB.php';
    //require_once __DIR__.'/utils/functions.php';

    $product = $productDB->fetchAll();
    $isCurrentCustomer = $authDB->isLoggedin();

 
    const ERROR_REQUIRED = "Veuillez Remplire Ce le Champs";
    const ERROR_PASSWORD_SHORT = "le mot de pass est trop court";


 $error = [
    "name"=>"",
    "email"=>"",
    "password"=>"",
 ];


 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $recup = filter_input_array(INPUT_POST,[
            "name"=>FILTER_SANITIZE_SPECIAL_CHARS,
            "email"=>FILTER_SANITIZE_EMAIL
        ]);

        $name = $recup['name'] ?? '';
        $email = $recup['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $ibtelegram = $_POST['ibtelegram'] ?? '';

        if(!$name){
            $error['name'] = ERROR_REQUIRED;
        }

        if(!$email){
            $error['email'] = ERROR_REQUIRED;
        }

        if(!$password){
            $error['password'] = ERROR_REQUIRED;
        }elseif(strlen($password)<5){
            $error['password'] = ERROR_PASSWORD_SHORT;
        }
    if ( empty(array_filter($error,fn($e)=>$e !== ''))) {
        $authDB->Inscription(
            [
                'name' => $name,
                'ibtelegram' => $ibtelegram,
                'email' => $email ,
                'password' => $password,

            ]
        );
       
    }
    
 }
 

?>


<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
  <?= require_once __DIR__.'/include/head.php' ?>
   <link rel="stylesheet" href="./assets/css/singup.css">


</head>

<body class="body header-fixed">

    <!-- preloade -->
    <div class="preload preload-container">
        <div class="preload-logo"></div>
    </div>
    <!-- /preload -->

    <div id="wrapper" class="wrapper-style">
        <div id="page" class="clearfix">
        <header class="header">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-md-12">                              
                            <div id="site-header-inner">                                 
                                <div id="site-logo" class="clearfix">
                                    <div id="site-logo-inner">
                                        <a href="index.php" rel="home" class="main-logo">
                                            <img id="logo_header" src="assets/images/logo/logo_dark.png" alt="Image">
                                        </a>
                                    </div>
                                </div>
                                
                               <div class="header-center">
                                <nav id="main-nav" class="main-nav">
                                    <ul id="menu-primary-menu" class="menu">
                                        <?php foreach ($cate as $cat => $catValue) : ?>
                                            <li class="menu-item menu-item-has-children current-menu-item">
                                                <a href="collection.php?cat=<?=$cat?>"><?=$cat?></a>
                                            
                                            </li>
                                       <?php endforeach; ?>
                                        
                                        
                                    </ul>
                                </nav><!-- /#main-nav -->
                               </div>

                                <div class="header-right">
                                    <a href="#" onclick="switchTheme()" class="mode-switch">
                                        <img id="img-mode" src="assets/images/icon/sun.png" alt="Image">
                                    </a>
                                    <a href="#" class="tf-button discord">
                                        <img width="30" height="30" src="https://img.icons8.com/fluency/48/telegram-app.png" alt="telegram-app"/>
                                        <span>TELEGRAM</span>
                                     </a>
                                    <?php if($isCurrentCustomer): ?>
                                       <a href="/logout.php" class="tf-button connect" > <i class="icon-fl-wallet"></i><span>Deconnection</span></a>
                                    <?php else: ?>
                                        <a href="/sign-in.php" class="tf-button connect" ><img width="30" height="30" src="https://img.icons8.com/fluency/48/login-rounded-right.png" alt="login-rounded-right"/><span>Connexion</span></a>
                                        <a href="/sign-up.php" class="tf-button connect" > <i class="icon-fl-wallet"></i><span>Inscription</span></a>
                                    <?php endif;?>    
                                </div>   

                                <div class="mobile-button"><span></span></div><!-- /.mobile-button -->
                            </div>
                        </div>
                    </div>
                </div>
                
            </header>
            

            <section class="bg-sign-in">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="content-left vertical-carousel">
                                <div class="content-slide">
                                    <div class="swiper-container swiper mySwiper swiper-h">
                                        <div class="swiper-wrapper">
                                          <div class="swiper-slide">
                                            <div class="swiper mySwiper1 swiper-v">
                                              <div class="swiper-wrapper sl-h" >
                                                    <?php foreach($product as $prod) : ?>
                                                        <div class="swiper-slide" data-swiper-autoplay="1000">
                                                            <div class="tf-product">
                                                                <div class="image">
                                                                    <div class="image-container" style="background-image: url(<?= $prod['image']?>);"></div>
                                                                </div>
                                                                <h6 class="name"><a href="item-detail.html"><?= $prod['name']?></a></h6>
                                                             </div>
                                                         </div>    
                                                     <?php endforeach; ?>
                                            
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="swiper-container swiper mySwiper swiper-h">
                                        <div class="swiper-wrapper">
                                          <div class="swiper-slide">
                                            <div class="swiper mySwiper1 swiper-v">
                                              <div class="swiper-wrapper sl-h" >
                                              <?php foreach($product as $prod) : ?>
                                             
                                                <div class="swiper-slide" data-swiper-autoplay="3000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <div class="image-container" style="background-image: url(<?= $prod['image']?>);"></div>
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html"><?= $prod['name']?></a></h6>

                                                   </div>
                                                </div>

                                                <?php endforeach; ?>
                                                
                                                
                                              </div>
                                              <div class="swiper-pagination"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="swiper-container swiper mySwiper swiper-h">
                                        <div class="swiper-wrapper">
                                          <div class="swiper-slide">
                                            <div class="swiper mySwiper1 swiper-v">
                                              <div class="swiper-wrapper sl-h" >
                                              <?php foreach($product as $prod) : ?>
                                                <div class="swiper-slide" data-swiper-autoplay="5000">
                                                

                                                        <div class="tf-product">
                                                            <div class="image">
                                                                    <div class="image-container" style="background-image: url(<?= $prod['image']?>);"></div>
                                                            </div>
                                                            <h6 class="name"><a href="item-detail.html"><?= $prod['name']?></a></h6>

                                                    </div>


                                                </div>
                                                
                                                
                                            <?php endforeach; ?>
                                                
                                            
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="sign-in-form style2">
                            <h2>Inscription</h2>
                                <p>Bienvenue Sur la Street! </p>
                                <form action="/sign-up.php" method="POST">
                                    <fieldset><input id="name" name="name" tabindex="1" aria-required="true" required="" type="text" placeholder="Votre User"></fieldset>
                                    <fieldset> <input  name="email" tabindex="2" aria-required="true"  type="email" placeholder="Votre email" required=""></fieldset>
                                    <fieldset> <input id="showpassword" name="password" tabindex="2" aria-required="true"  type="password" placeholder="Mot de Pass" required=""></fieldset>
                                    <fieldset><input id="telegram" name="ibtelegram" tabindex="1"  type="text" placeholder="Ib Telegram (Facultif)"></fieldset>
                                    <!-- <button class="tf-button submit" type="submit">S'inscrire</button> -->
                                    <button type="submit">envoyer</button>
                                </form>
                                <div class="or"><span>--</span></div>
<!-- 
                                <div class="box-sign-social">
                                    <a class="tf-button" href="#"><i class="fab fa-google"></i>Google</a>
                                    <a class="tf-button" href="#"><i class="fab fa-facebook-f"></i>Facebook</a>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
    <script src="assets/js/jquery-validate.js"></script>
    <script src="assets/js/plugin.js"></script>
    <script src="assets/js/shortcodes.js"></script>
    <script src="assets/js/main.js"></script>
    


</body>

</html>