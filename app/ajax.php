<?php




/*
 * ==========================================================
 * AJAX.PHP
 * ==========================================================
 *
 * AJAX functions. This file must be executed only via AJAX. � 2022 Boxcoin. All rights reserved.
 *
 */

if (!isset($_POST['function'])) {
    if (!isset($_POST['data']))
        die();
    $_POST = json_decode($_POST['data'], true);
    if (!isset($_POST['function']))
        die();
}
require_once('functions.php');
bxc_cloud_load();
if (bxc_security_error())
    die(bxc_json_response('Security error', false));

switch ($_POST['function']) {
    case 'installation':
        die(bxc_json_response(bxc_installation($_POST['installation_data'])));
    case 'login':
        die(bxc_json_response(bxc_login($_POST['username'], $_POST['password'])));
    case 'get-balances':
        die(bxc_json_response(bxc_crypto_balances()));
    case 'get-settings':
        die(bxc_json_response(bxc_settings_get_all()));
    case 'save-settings':
        die(bxc_json_response(bxc_settings_save($_POST['settings'])));
    case 'get-transactions':
        die(bxc_json_response(bxc_transactions_get_all(bxc_post('pagination', 0), bxc_post('search'), bxc_post('status'), bxc_post('cryptocurrency'), bxc_post('date_range'))));
    case 'get-transaction':
        die(bxc_json_response(bxc_transactions_get($_POST['transaction_id'])));
    case 'download-transactions':
        die(bxc_json_response(bxc_transactions_download(bxc_post('search'), bxc_post('status'), bxc_post('cryptocurrency'), bxc_post('date_range'))));
    case 'check-transaction':
        die(bxc_json_response(bxc_transactions_check_single($_POST['transaction'])));
    case 'check-transactions':
        die(bxc_json_response(bxc_transactions_check($_POST['transaction_id'])));
    case 'update-transaction':
        die(bxc_json_response(bxc_transactions_update($_POST['transaction_id'], $_POST['values'])));
    case 'create-transaction':
        die(bxc_json_response(bxc_transactions_create($_POST['amount'], $_POST['cryptocurrency_code'], bxc_post('currency_code'), bxc_post('external_reference'), bxc_post('title'), bxc_post('note', bxc_post('description')), bxc_post('url'), bxc_post('billing', ''), bxc_post('vat')))); // temp rimuovo bxc_post('description')
    case 'cancel-transaction':
        die(bxc_json_response(bxc_transactions_cancel($_POST['transaction'])));
    case 'get-checkouts':
        die(bxc_json_response(bxc_checkout_get(bxc_post('checkout_id', 0))));
    case 'save-checkout':
        die(bxc_json_response(bxc_checkout_save($_POST['checkout'])));
    case 'delete-checkout':
        die(bxc_json_response(bxc_checkout_delete($_POST['checkout_id'])));
    case 'get-fiat-value':
        die(bxc_json_response(bxc_crypto_get_fiat_value($_POST['amount'], $_POST['cryptocurrency_code'], $_POST['currency_code'])));
    case 'cron':
        die(bxc_json_response(bxc_cron()));
    case 'invoice':
        die(bxc_json_response(bxc_transactions_invoice($_POST['transaction_id'])));
    case 'update':
        die(bxc_json_response(bxc_update($_POST['domain'])));
    case 'evc':
        die(bxc_json_response(bxc_ve($_POST['code'], $_POST['domain'], bxc_post('a'))));
    case 'vat':
        die(bxc_json_response(bxc_vat($_POST['amount'], bxc_post('country_code'), bxc_post('currency'))));
    case 'vat-validation':
        die(bxc_json_response(bxc_vat_validation($_POST['vat_number'])));
    case 'email-test':
        die(bxc_json_response(bxc_email_notification('This is a test', 'Lorem ipsum dolor sit amet tempor.')));
    case 'get-tokens':
        require_once(__DIR__ . '/web3.php');
        die(bxc_json_response(bxc_eth_get_contract()));
    case 'payment-link':
        die(bxc_json_response(bxc_payment_link($_POST['transaction_id'])));
    case 'refund':
        die(bxc_json_response(bxc_transactions_refund($_POST['transaction_id'])));
    case 'get-exchange-rates':
        die(bxc_json_response(bxc_exchange_rates($_POST['currency_code'], $_POST['cryptocurrency_code'])));
    case 'get-usd-rates':
        die(bxc_json_response(bxc_usd_rates(bxc_post('currency_code'))));
    case 'exchange-quotation':
        die(bxc_json_response(bxc_exchange_quotation($_POST['send_amount'], $_POST['send_code'], $_POST['get_code'])));
    case 'exchange-is-payment-completed':
        die(bxc_json_response(bxc_exchange_is_payment_completed($_POST['external_reference_base64'])));
    case 'exchange-finalize':
        die(bxc_json_response(bxc_exchange_finalize($_POST['external_reference_base64'], bxc_post('identity'))));
    case 'email-verification':
        die(bxc_json_response(bxc_exchange_email_verification($_POST['email'], bxc_post('saved_email'), bxc_post('verification_code'))));
    case 'validate-address':
        die(bxc_json_response(bxc_crypto_validate_address($_POST['address'], $_POST['cryptocurrency_code'])));
    case 'complycube':
        die(bxc_json_response(bxc_complycube($_POST['first_name'], $_POST['last_name'], $_POST['email'])));
    case 'complycube-create-check':
        die(bxc_json_response(bxc_complycube_create_check($_POST['client_id'], $_POST['live_photo_id'], $_POST['document_id'])));
    case 'complycube-check':
        die(bxc_json_response(bxc_complycube_check($_POST['check_id'], $_POST['email'])));
    case 'cloud':
        require_once(__DIR__ . '/cloud/functions.php');
        die(bxc_json_response(bxc_cloud_ajax($_POST['action'], bxc_post('arguments'))));
    case 'get-explorer-link':
        die(bxc_json_response(bxc_crypto_get_explorer_link($_POST['hash'], $_POST['cryptocurrency_code'])));
    case 'get-network-fee':
        die(bxc_json_response(bxc_crypto_get_network_fee($_POST['cryptocurrency_code'], bxc_post('returned_currency_code'))));
    default:
        die(bxc_json_response('No function with name: ' . $_POST['function'], false));
}

function bxc_json_response($response, $success = true) {
    return json_encode(['success' => $success, 'response' => $response]);
}

function bxc_post($key, $default = false) {
    return isset($_POST[$key]) ? ($_POST[$key] == 'false' ? false : ($_POST[$key] == 'true' ? true : $_POST[$key])) : $default;
}

function bxc_security_error() {
    $admin_functions = ['refund', 'get-transaction', 'payment-link', 'email-test', 'update-transaction', 'invoice', 'download-transactions', 'get-settings', 'save-settings', 'update', 'get-balances', 'get-transactions', 'get-checkouts', 'save-checkout', 'delete-checkout'];
    return in_array($_POST['function'], $admin_functions) && !bxc_verify_admin();
}


 

?>