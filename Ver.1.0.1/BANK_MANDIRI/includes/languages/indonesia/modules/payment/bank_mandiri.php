<?php
/**
 * Bank Mandiri Payment Module
 *
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: 1.0.1 iHangat2000 2020 July 08 Modified in v1.5.7 $ 
 */

$id=$_SESSION['customer_id'];
$ln=$_SESSION['customer_last_name'];

define('MODULE_PAYMENT_BANK_MANDIRI_ACCNUM', '');
define('MODULE_PAYMENT_BANK_MANDIRI_BSB', '');
define('MODULE_PAYMENT_BANK_MANDIRI_ACCNAM', '');
define('MODULE_PAYMENT_BANK_MANDIRI_BANKNAM', '');
define('MODULE_PAYMENT_BANK_MANDIRI_SWIFT', '');
define('MODULE_PAYMENT_BANK_MANDIRI_ADDRESS', '');
define('MODULE_PAYMENT_BANK_MANDIRI_PAYABLE', '');
define('MODULE_PAYMENT_BANK_MANDIRI_SORT_ORDER', '');
define('MODULE_PAYMENT_BANK_MANDIRI_STATUS', '');
define('MODULE_PAYMENT_BANK_MANDIRI_ORDER_STATUS_ID', '');

define('EMAIL_TEXT_NO_DELIVERY',
  '<p>Tidak ada Pengiriman, lihat dibawah:');
define('MODULE_PAYMENT_BANK_MANDIRI_TEXT_EMAIL_FOOTER', 
  'Silakan ikuti detail untuk transfer nilai total pesanan anda:\n\n' .
  '\nNo. Rekening:  ' . MODULE_PAYMENT_BANK_MANDIRI_ACCNUM .
  '\nBSB Number:   ' . MODULE_PAYMENT_BANK_MANDIRI_BSB . 
  '\nNama Akun Bank: ' . MODULE_PAYMENT_BANK_MANDIRI_ACCNAM . 
  '\nNama Bank:    ' . MODULE_PAYMENT_BANK_MANDIRI_BANKNAM .
  '\nKode Bank:   ' . MODULE_PAYMENT_BANK_MANDIRI_SWIFT . 
  '\nReferensi:    '  . $ln .'-' . $id . '-%s' .
  '\n\nKirim Uang untuk Pesanan:    ' . MODULE_PAYMENT_BANK_MANDIRI_ADDRESS . 
  '\nPembayaran untuk pesanan:   ' . MODULE_PAYMENT_BANK_MANDIRI_PAYABLE .
  '\n\nTerima kasih untuk pesanan anda yang akan dikirim segera begitu kami menerima pembayaran di akun tersebut.\n');

define('MODULE_PAYMENT_BANK_MANDIRI_HTML_EMAIL_FOOTER', 
  '<br>Silakan ikuti detail transfer untuk nilai total pesanan anda:<br><pre>' .
  '\nNo. Rekening:  ' . MODULE_PAYMENT_BANK_MANDIRI_ACCNUM .
  '\nBSB Number:   ' . MODULE_PAYMENT_BANK_MANDIRI_BSB . 
  '\nNama Akun Bank: ' . MODULE_PAYMENT_BANK_MANDIRI_ACCNAM . 
  '\nNama Bank:    ' . MODULE_PAYMENT_BANK_MANDIRI_BANKNAM .
  '\nKode Bank:   ' . MODULE_PAYMENT_BANK_MANDIRI_SWIFT . 
  '\nReferensi:    '  . $ln .'-' . $id . '-%s' .
  '\n\nKirim Uang untuk Pesanan:    ' . MODULE_PAYMENT_BANK_MANDIRI_ADDRESS . 
  '\nPembayaran untuk pesanan:   ' . MODULE_PAYMENT_BANK_MANDIRI_PAYABLE .
  '</pre><p>Terima kasih untuk pesanan anda yang akan dikirim segera begitu kami menerima pembayaran di akun tersebut.');

define('MODULE_PAYMENT_BANK_MANDIRI_TEXT_TITLE', 'Transfer Bank Mandiri - Indonesia');
define('MODULE_PAYMENT_BANK_MANDIRI_TEXT_DESCRIPTION', 
  '<br>Bank dan Alamat detail akan dikirim ke email anda segera setelah pesanan di konfirmasi.<br><pre>' . 
  '</pre><img src="images/bank_indonesia/bank-mandiri.jpg">' .
  '<br>No. Rekening:  ' . MODULE_PAYMENT_BANK_MANDIRI_ACCNUM .
  '<br>Nama Akun Bank: ' . MODULE_PAYMENT_BANK_MANDIRI_ACCNAM . 
  '<p>Terima kasih untuk pesanan anda yang akan dikirim segera begitu kami menerima pembayaran.');