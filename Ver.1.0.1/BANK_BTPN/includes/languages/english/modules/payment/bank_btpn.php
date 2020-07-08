<?php
/**
 * Bank BTPN Payment Module
 *
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: 1.0.1 iHangat2000 2020 July 08 Modified in v1.5.7 $ 
 */

$id=$_SESSION['customer_id'];
$ln=$_SESSION['customer_last_name'];

define('MODULE_PAYMENT_BANK_BTPN_ACCNUM', '');
define('MODULE_PAYMENT_BANK_BTPN_BSB', '');
define('MODULE_PAYMENT_BANK_BTPN_ACCNAM', '');
define('MODULE_PAYMENT_BANK_BTPN_BANKNAM', '');
define('MODULE_PAYMENT_BANK_BTPN_SWIFT', '');
define('MODULE_PAYMENT_BANK_BTPN_ADDRESS', '');
define('MODULE_PAYMENT_BANK_BTPN_PAYABLE', '');
define('MODULE_PAYMENT_BANK_BTPN_SORT_ORDER', '');
define('MODULE_PAYMENT_BANK_BTPN_STATUS', '');
define('MODULE_PAYMENT_BANK_BTPN_ORDER_STATUS_ID', '');

define('EMAIL_TEXT_NO_DELIVERY',
  '<p>No Delivery, see below:');
define('MODULE_PAYMENT_BANK_BTPN_TEXT_EMAIL_FOOTER', 
  'Please use the following details to transfer your total order value:\n\n' .
  '\nAccount No.:  ' . MODULE_PAYMENT_BANK_BTPN_ACCNUM .
  '\nBSB Number:   ' . MODULE_PAYMENT_BANK_BTPN_BSB . 
  '\nAccount Name: ' . MODULE_PAYMENT_BANK_BTPN_ACCNAM . 
  '\nBank Name:    ' . MODULE_PAYMENT_BANK_BTPN_BANKNAM .
  '\nSwift Code:   ' . MODULE_PAYMENT_BANK_BTPN_SWIFT . 
  '\nReference:    '  . $ln .'-' . $id . '-%s' .
  '\n\nSend Money Orders To:    ' . MODULE_PAYMENT_BANK_BTPN_ADDRESS . 
  '\nMoney Orders Payable To:   ' . MODULE_PAYMENT_BANK_BTPN_PAYABLE .
  '\n\nThanks for your order which will ship immediately once we receive payment in the above account.\n');

define('MODULE_PAYMENT_BANK_BTPN_HTML_EMAIL_FOOTER', 
  '<br>Please use the following details to transfer your total order value:<br><pre>' .
  '\nAccount No.:  ' . MODULE_PAYMENT_BANK_BTPN_ACCNUM .
  '\nBSB Number:   ' . MODULE_PAYMENT_BANK_BTPN_BSB . 
  '\nAccount Name: ' . MODULE_PAYMENT_BANK_BTPN_ACCNAM . 
  '\nBank Name:    ' . MODULE_PAYMENT_BANK_BTPN_BANKNAM .
  '\nSwift Code:   ' . MODULE_PAYMENT_BANK_BTPN_SWIFT . 
  '\nReference:    '  . $ln .'-' . $id . '-%s' .
  '\n\nSend Money Orders To:    ' . MODULE_PAYMENT_BANK_BTPN_ADDRESS . 
  '\nMoney Orders Payable To:   ' . MODULE_PAYMENT_BANK_BTPN_PAYABLE .
  '</pre><p>Thanks for your order which will ship immediately once we receive payment in the above account.');

define('MODULE_PAYMENT_BANK_BTPN_TEXT_TITLE', 'Transfer Bank BTPN - Indonesia');
define('MODULE_PAYMENT_BANK_BTPN_TEXT_DESCRIPTION', 
  '<br>Banking and Address details will be sent to your email once the order is confirmed.<br><pre>' . 
  '</pre><img src="images/bank_indonesia/bank-btpn.jpg">' .
  '<br>Account No.:  ' . MODULE_PAYMENT_BANK_BTPN_ACCNUM .
  '<br>Account Name: ' . MODULE_PAYMENT_BANK_BTPN_ACCNAM . 
  '<p>Thanks for your order which will ship immediately once we receive payment.');