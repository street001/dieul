<?php
    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
   
   
    require __DIR__.'/database/database.php';
    $authDB = require __DIR__.'/database/security.php';
    $productDB = require_once __DIR__.'/database/models/productDB.php';
    $commande = require_once __DIR__.'/database/models/commandeDB.php';
    $transaction = require_once __DIR__.'/database/models/transaction_Crypto.php';
   
   
      $idsession = $_COOKIE['session'];
   
    if($idsession){
     $session = $authDB->ReadSession($idsession);
     $customer;
   
          foreach ($session as $ses) {
           
            $customer = $authDB->GetCustomerBySession(($ses['idcustomer'])); 
   
          }    }
   
    $email = $_POST['email'];
    $id = $_POST['id'];
    

   
    $emailnak = filter_var($email,FILTER_VALIDATE_EMAIL);
    $product = $productDB->fetchById($id);
    $productName = $product['name'];
    $productid = $product['id'];
    $amount = $product['prix'];
    $currency = 'usd';
   
   
       $idsession = $_COOKIE['session'];
       $customer;
       global $_EMO;
     
       if($idsession){
          $session = $authDB->ReadSession($idsession);
      
     
               foreach ($session as $ses) {
                
                 $customer = $authDB->GetCustomerBySession(($ses['idcustomer'])); 
     
               }
              }
               $emo = $customer['email'];
               $name =  $customer['name'];
               $idcustomer = $customer['id'];
     
        $last = $transaction->SelectLastTranst();
       
        foreach($last as $lastTransaction){
            $idLastTransaction = $lastTransaction['id'];
            $statutLastTransaction = $lastTransaction['status'];
            $cryptoLastTransaction = $lastTransaction['cryptocurrency'];
            $currencyLastTransaction = $lastTransaction['amount_fiat'];
            $dateLastTransaction = $lastTransaction['creation_time'];
            break;
        }
   
      
    //   echo '<pre>';
    //     print_r($productid);
    //   echo '</pre>';
    //   exit;

   
    $commande->addCommande($emo,$productid,$dateLastTransaction,1,$statutLastTransaction,$cryptoLastTransaction,$amount,$name,$emailnak,$idcustomer,$productName);


/*
 * ==========================================================
 * PAY.PHP
 * ==========================================================
 *
 * Payment page
 *
 */

if (!file_exists(__DIR__ . '/config.php')) die();
require(__DIR__ . '/functions.php');
if (BXC_CLOUD) bxc_cloud_load();
$logo = bxc_settings_get('logo-pay');
$minify = isset($_GET['debug']) ? false : (BXC_CLOUD || bxc_settings_get('minify'));
if (isset($_GET['invoice'])) {
    $invoice = bxc_transactions_invoice($_GET['invoice']);
    die($invoice ? '<script>document.location = "' . $invoice . '"</script>' : 'Transaction not found or not completed.');
}
$code_transaction = '';
if (isset($_GET['id']) && !isset($_GET['demo'])) {
    $transaction = bxc_transactions_get(bxc_encryption($_GET['id'], false));
    if (!$transaction) die('Transaction not found.');
    if ($transaction['status'] != 'P') die('Transaction not in pending status.');
    $_GET['checkout_id'] = 'custom-pay-page';
    $code_transaction = '<script>BOXCoin.checkout.storageTransaction("custom-pay-page", "delete"); BOXCoin.checkout.storageTransaction("custom-pay-page", { id: ' . $transaction['id'] . ', amount: "' . $transaction['amount'] . '", to: "' . $transaction['to'] . '", cryptocurrency: "' . $transaction['cryptocurrency'] . '", external_reference: "' . $transaction['external_reference'] . '", vat: "' . $transaction['vat'] . '", encrypted: "' . bxc_encryption($transaction) . '", min_confirmations: ' . bxc_settings_get_confirmations($transaction['cryptocurrency'], $transaction['amount']) . ', prevent_cancel: true });</script>';
}
if (bxc_settings_get('css-pay')) $code_transaction .= PHP_EOL . '<link rel="stylesheet" href="' . bxc_settings_get('css-pay') . '" media="all" />';
$favicon = BXC_CLOUD ? CLOUD_ICON : ($logo ? bxc_settings_get('logo-icon-url', BXC_URL . 'media/icon.svg') : BXC_URL . 'media/icon.svg');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>
        <?php bxc_e(bxc_settings_get('form-title', 'Payment method')) ?>
    </title>
    <?php if (isset($_GET['lang'])) echo '<script>var BXC_LANGUAGE = "' . substr($_GET['lang'], 0, 2) . '";</script>' ?>
    <link rel="shortcut icon" type="image/<?php strpos($favicon, '.png') ? 'png' : 'svg' ?>" href="<?php echo $favicon ?>" />
    <script id="boxcoin" src="<?php echo BXC_URL . 'js/client' . ($minify ? '.min' : '') ?>.js"></script>
    <?php if (BXC_CLOUD) bxc_cloud_front() ?>
    <?php echo $code_transaction ?>
    <style>
        body {
            text-align: center;
            padding: 100px 0;
        }

        .bxc-main {
            text-align: left;
            margin: auto;
        }

        .bxc-pay-logo {
            text-align: center;
        }

        .bxc-pay-logo img {
            margin: 0 auto 30px auto;
            max-width: 200px;
        }
    </style>
</head>
<body style="display: none">
    <script>(function () { setTimeout(() => { document.body.style.removeProperty('display') }, 500) }())</script>
    <?php
    if ($logo) echo '<div class="bxc-pay-logo"><img src="' . bxc_settings_get('logo-url') . '" alt="" /></div>';
    bxc_checkout_direct();
    echo bxc_settings_get('pay-text');
    ?>
</body>
</html>