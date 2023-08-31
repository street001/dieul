<?php

   require_once __DIR__.'/database/database.php';
   $productDB = require_once __DIR__.'/database/models/productDB.php';
   
   const ERROR_REQUIRED = "Ce Hamps est requis";
   const ERROR_SHORT = "Contenue Trop petit";
   const ERROR_URL_INVALIDE = "Url invalide";
   const ERROR_URL_INT = "Prix Invalide";


   $product = [];
   $category = '';
   $error = [
    'name'=>'',
    'category'=>'',
    'image'=>'',
    'description'=>'',
    'prix'=>''
   ];

   if($_SERVER['REQUEST_METHOD'] === 'POST')
   {
     $_POST = filter_input_array(INPUT_POST,[
        'name'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'category'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'image'=>FILTER_SANITIZE_URL,
        'description'=>FILTER_SANITIZE_SPECIAL_CHARS,
        'prix'=>FILTER_SANITIZE_NUMBER_INT
     ]);

     $nom = $_POST['name'] ?? '';
     $category = $_POST['category'] ?? '';
     $image = $_POST['image'] ?? '';
     $description = $_POST['description'] ?? '';
     $prix = $_POST['prix'] ?? '';
     
     if (!$nom) {
        $error['nom'] = ERROR_REQUIRED;
     }
     
     if (!$category) {
        $error['category'] = ERROR_REQUIRED;
     }

     if (!$image) {
        $error['image'] = ERROR_REQUIRED;
     }elseif(!filter_var($image,FILTER_VALIDATE_URL)){
        $error['image'] = ERROR_URL_INVALIDE;
     }

     if (!$prix) {
        $error['prix'] = ERROR_REQUIRED;
     }elseif(!filter_var($prix,FILTER_VALIDATE_INT)){
        $error['prix'] = ERROR_URL_INT;
     }

     if (!$description) {
        $error['description'] = ERROR_REQUIRED;
     }elseif(mb_strlen($description) < 5){
        $error['description'] = ERROR_SHORT;
     }
     

     if (empty(array_filter($error,fn($e)=>$e !== ''))) {
      $productDB->createOne([
        'nom'=>$nom,
        'category'=>$category,
        'image'=>$image,
        'description'=>$description,
        'prix'=>$prix
      ]);
     }else{
        print_r($error);
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
</head>

<body class="body header-fixed">

    <!-- preloade -->
    <div class="preload preload-container">
        <div class="preload-logo"></div>
    </div>
    <!-- /preload -->

    <div id="wrapper" class="wrapper-style">
        <div id="page" class="clearfix">
            

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
                                                <div class="swiper-slide" data-swiper-autoplay="1000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product1.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
                                                <div class="swiper-slide" data-swiper-autoplay="1000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product2.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
                                                <div class="swiper-slide" data-swiper-autoplay="1000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product3.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
                                                <div class="swiper-slide" data-swiper-autoplay="1000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product4.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
                                                <div class="swiper-slide" data-swiper-autoplay="1000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product5.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
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
                                                <div class="swiper-slide" data-swiper-autoplay="3000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product6.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
                                                <div class="swiper-slide" data-swiper-autoplay="3000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product7.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
                                                <div class="swiper-slide" data-swiper-autoplay="3000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product8.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
                                                <div class="swiper-slide" data-swiper-autoplay="3000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product9.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
                                                <div class="swiper-slide" data-swiper-autoplay="3000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product10.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
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
                                                <div class="swiper-slide" data-swiper-autoplay="5000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product4.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
                                                <div class="swiper-slide" data-swiper-autoplay="5000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product5.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
                                                <div class="swiper-slide" data-swiper-autoplay="5000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product6.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
                                                <div class="swiper-slide" data-swiper-autoplay="5000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product8.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
                                                <div class="swiper-slide" data-swiper-autoplay="5000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="assets/images/product/product1.jpg" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.html">SKELATON #01</a></h6>
                                                   </div>
                                                </div>
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
                                <h2>Gestion Des Outils</h2>
                                <p>Quoi de neuf pour le shop</p>
                                <form action="/form-add.php"  method="POST">
                                    <fieldset><input id="name" name="name" tabindex="1" aria-required="true" required="" type="text" placeholder="Nom du Produit"></fieldset>
                                    <fieldset>  <select id="category" tabindex="2"  name="category">
                                       <option value="scama">Scama</option>
                                        <option value="letter">Letter</option>
                                        <option value="sender">Sender</option>
                                        <option value="checker">Checker</option>
                                        <option value="nl">NL</option>
                                        <option value="ml">ML</option>
                                        <option value="compte verifier">Compte Verifier</option>
                                    </select>  </fieldset>
                                    <fieldset><input id="image" name="image" tabindex="3" aria-required="true" required="" type="text" placeholder="Image du Produit"></fieldset>
                                    <fieldset><input id="prix" name="prix" tabindex="4" aria-required="true" required="" type="number" placeholder="Prix du Produits"></fieldset>
                                    <fieldset> <textarea name="description" tabindex="5" id="description" cols="30" rows="10"></textarea> </fieldset>



                                    <button class="tf-button submit" type="submit">VALIDER</button>
                                </form>
                                <div class="or"><span>Espace Admin</span></div>


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