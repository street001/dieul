<?php
require_once __DIR__.'/database/database.php';
$authDB = require_once __DIR__.'/database/security.php';
$productDB = require_once __DIR__.'/database/models/productDB.php';
$product = $productDB->fetchAll();
$isCurrentCustomer = $authDB->isLoggedin();




require_once __DIR__.'/utils/functions.php';

const ERREUR_REQUIRED = "Veuillez remplire ce champs";
const ERREUR_INVALIDE_EMAIL = "email Invalide";
const ERREUR_UNKNOW_EMAIL = "Email non enrigistrer";
const ERREUR_PASSWORD_INCORRECT = "Mot de pass Incorrect";

$error = [
    'email'=>'',
    'password'=>'',
];

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $recup = filter_input_array(INPUT_POST,FILTER_SANITIZE_EMAIL);
    $email = $recup['email'] ?? '';
    $password = $_POST['password'] ?? '';
     

    if (!$email) {
        $error['email'] = ERREUR_REQUIRED;
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error['email'] = ERREUR_INVALIDE_EMAIL;
    }

    if (!$password) {
        $error['password'] = ERREUR_REQUIRED;
    }
    
    if (empty(array_filter($error,fn($e)=>$e !== ''))) {
        $customer = $authDB->ReadCustomerByEmail($email);

         if (!$customer) {
             $error['email'] = ERREUR_UNKNOW_EMAIL;
         }
         if (!password_verify($password,$customer['motdepass'])) {
              $error['password'] = ERREUR_PASSWORD_INCORRECT;
         }else{
             $authDB->Login($customer['id']);
             header('Location: /index.php');
          }
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
         <?= require_once __DIR__.'/include/header.php' ?>
           

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
                            <div class="sign-in-form">
                                <h2>Connexion</h2>
                                <p>Pret pour vous procurez les meilleurs outils ?</p>
                                <form action="/sign-in.php" method="POST">
                                    <fieldset><input id="name" name="email" tabindex="1" aria-required="true" required="" type="email" placeholder="Email"></fieldset>
                                    <h5><?=$error['email']?></h5>
                                    <fieldset> <input id="showpassword" name="password" tabindex="2" aria-required="true"  type="password" placeholder="Password" required=""></fieldset>
                                    <h5><?=$error['password']?></h5>
                                    
                                    <!-- <div class="forgot-pass-wrap">
                                        <label>
                                        <input type="checkbox">
                                        <span class="btn-checkbox"></span>
                                        Remember me
                                        </label>
                                        <a href="#">Forgot your password?</a>
                                    </div> -->
                                    <!-- <button class="tf-button submit" type="submit">SIGN IN</button> -->
                                    <button type="submit">Envoyer</button>
                                </form>
                                <div class="choose-sign">
                                    Vous n'avez pas de Compte? <a href="#">Inscrivez Vous Gratuitement</a> 
                                </div>

                                <div class="or"><span>--</span></div>

                                <!-- <div class="box-sign-social">
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
<!-- 
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
    </div> -->

    <!-- Javascript -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-validate.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/switchmode.js"></script>
    <script src="assets/js/plugin.js"></script>
    <script src="assets/js/shortcodes.js"></script>
    <script src="assets/js/main.js"></script>
    

</body>

</html>