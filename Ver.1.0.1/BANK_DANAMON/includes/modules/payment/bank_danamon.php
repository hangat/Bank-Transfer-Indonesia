<?php
/**
 * Bank Danamon Payment Module
 *
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: 1.0.1 iHangat2000 2020 July 08 Modified in v1.5.7 $ 
 */

class bank_danamon 
{
    var $code, $title, $description, $enabled;

  // class constructor
  function __construct() {
    global $order;

    $this->code = 'bank_danamon';
    $this->title = MODULE_PAYMENT_BANK_DANAMON_TEXT_TITLE;
    $this->description = MODULE_PAYMENT_BANK_DANAMON_TEXT_DESCRIPTION;
    $this->email_footer = MODULE_PAYMENT_BANK_DANAMON_TEXT_EMAIL_FOOTER;
    $this->sort_order = MODULE_PAYMENT_BANK_DANAMON_SORT_ORDER;
    $this->enabled = ((MODULE_PAYMENT_BANK_DANAMON_STATUS == 'True') ? true : false);

    if ((int)MODULE_PAYMENT_BANK_DANAMON_ORDER_STATUS_ID > 0) {
      $this->order_status = MODULE_PAYMENT_BANK_DANAMON_ORDER_STATUS_ID;
    }

    if (is_object($order)) $this->update_status();
  }

  // class methods
  function update_status() {
    global $order, $db;

    if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_BANK_DANAMON_ZONE > 0) ) {
      $check_flag = false;
      $check = $db->Execute("SELECT zone_id 
	                         FROM " . TABLE_ZONES_TO_GEO_ZONES . " 
							 WHERE geo_zone_id = '" . MODULE_PAYMENT_BANK_DANAMON_ZONE . "' 
							 AND zone_country_id = '" . $order->delivery['country']['id'] . "' 
							 ORDER BY zone_id");
      while (!$check->EOF) {
        if ($check->fields['zone_id'] < 1) {
          $check_flag = true;
          break;
        } elseif ($check->fields['zone_id'] == $order->delivery['zone_id']) {
          $check_flag = true;
          break;
        }
        $check->MoveNext();
      }

      if ($check_flag == false) {
        $this->enabled = false;
      }
    }
    // disable the module if the order only contains virtual products
    if ($this->enabled == true) {
      if ($order->content_type == 'virtual') {
        $this->enabled = false;
      }
    }
  }

  function javascript_validation() {
    return false;
  }

  function selection() {
    return array('id' => $this->code,
                 'module' => $this->title);
  }

  function pre_confirmation_check() {
    return false;
  }

  function confirmation() {
    return array('title' => MODULE_PAYMENT_BANK_DANAMON_TEXT_DESCRIPTION);
  }

  function process_button() {
    return false;
  }

  function before_process() {
    return false;
  }

  function after_order_create($order_id) {
    $this->email_footer = sprintf(MODULE_PAYMENT_BANK_DANAMON_TEXT_EMAIL_FOOTER, $order_id);
  }

  function after_process() {
    return false;
  }

  function get_error() {
    return false;
  }

  function check() {
    global $db;
    if (!isset($this->_check)) {
      $check_query = $db->Execute("SELECT configuration_value 
	                               FROM " . TABLE_CONFIGURATION . " 
								   WHERE configuration_key = 'MODULE_PAYMENT_BANK_DANAMON_STATUS'");
      $this->_check = $check_query->RecordCount();
    }
    return $this->_check;
  }

  function install() {
    global $db;
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) 
	              VALUES ('Enable Transfer Bank Danamon Module', 'MODULE_PAYMENT_BANK_DANAMON_STATUS', 'True', 'Do you want to accept Transfer Bank Danamon payments?', '6', '1', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
	$db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) 
	              VALUES ('Payment Zone', 'MODULE_PAYMENT_BANK_DANAMON_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '2', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) 
	              VALUES ('Sort order of display.', 'MODULE_PAYMENT_BANK_DANAMON_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) 
	              VALUES ('BSB Number', 'MODULE_PAYMENT_BANK_DANAMON_BSB', '000-000', 'BSB Number in the format 000-000', '6', '1', now());");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) 
	              VALUES ('Bank Account No.', 'MODULE_PAYMENT_BANK_DANAMON_ACCNUM', '12345678', 'Bank Account No.', '6', '1', now());");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) 
	              VALUES ('Swift Code.', 'MODULE_PAYMENT_BANK_DANAMON_SWIFT', '12345678', 'Swift Code.', '6', '1', now());");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) 
	              VALUES ('Bank Account Name', 'MODULE_PAYMENT_BANK_DANAMON_ACCNAM', 'Hangat', 'Bank Account Name', '6', '1', now());");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) 
	              VALUES ('Bank Name', 'MODULE_PAYMENT_BANK_DANAMON_BANKNAM', 'Bank Danamon', 'Bank Danamon', '6', '1', now());");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) 
	              VALUES ('Set Order Status', 'MODULE_PAYMENT_BANK_DANAMON_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', '6', '0', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) 
	              VALUES ('Address', 'MODULE_PAYMENT_BANK_DANAMON_ADDRESS', 'Jl. Jambon, Tegalrejo - Yogyakarta - 55241','Address to send money orders.','6','1',now());");
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) 
	              VALUES ('Payable', 'MODULE_PAYMENT_BANK_DANAMON_PAYABLE', 'Hangat Shop','Money Orders Payable to:','6','1',now());");
  }

  function remove() {
    global $db;
    $db->Execute("DELETE FROM " . TABLE_CONFIGURATION . " 
	              WHERE configuration_key in ('" . implode("', '", $this->keys()) . "')");
  }

  function keys() {
	return array('MODULE_PAYMENT_BANK_DANAMON_STATUS', 'MODULE_PAYMENT_BANK_DANAMON_ZONE', 'MODULE_PAYMENT_BANK_DANAMON_SORT_ORDER', 'MODULE_PAYMENT_BANK_DANAMON_BSB', 'MODULE_PAYMENT_BANK_DANAMON_ACCNUM', 'MODULE_PAYMENT_BANK_DANAMON_ACCNAM', 'MODULE_PAYMENT_BANK_DANAMON_SWIFT', 'MODULE_PAYMENT_BANK_DANAMON_BANKNAM', 'MODULE_PAYMENT_BANK_DANAMON_ORDER_STATUS_ID' , 'MODULE_PAYMENT_BANK_DANAMON_ADDRESS', 'MODULE_PAYMENT_BANK_DANAMON_PAYABLE');
  }
}