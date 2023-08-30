<?php
    
      $cate = category($product);
      $isCurrentCustomer = $isCurrentCustomer ?? false;
    
?>
<header class="header">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-md-12">                              
                            <div id="site-header-inner">                                 
                                <div id="site-logo" class="clearfix">
                                    <div id="site-logo-inner">
                                        <a href="/" rel="home" class="main-logo">
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