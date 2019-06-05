<?php

/**
 * @file Copyright iATS Payments (c) 2014
 * Author: Alan Dixon.
 *
 * This file is a part of CiviCRM published extension.
 *
 * This extension is free software; you can copy, modify, and distribute it
 * under the terms of the GNU Affero General Public License
 * Version 3, 19 November 2007.
 *
 * It is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License with this program; if not, see http://www.gnu.org/licenses/
 */
// opcache_reset();
require_once 'iats.civix.php';
use CRM_Iats_ExtensionUtil as E;

/* First American requires a "category" for ACH transaction requests */

define('FAPS_DEFAULT_ACH_CATEGORY_TEXT', 'CiviCRM ACH');

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function iats_civicrm_config(&$config) {
  _iats_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function iats_civicrm_xmlMenu(&$files) {
  _iats_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 * TODO: don't require iATS if we're not installing the old processors.
 */
function iats_civicrm_install() {
  if (!class_exists('SoapClient')) {
    $session = CRM_Core_Session::singleton();
    $session->setStatus(ts('The PHP SOAP extension is not installed on this server, but is required for this extension'), ts('iATS Payments Installation'), 'error');
  }
  _iats_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function iats_civicrm_postInstall() {
  _iats_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function iats_civicrm_uninstall() {
  _iats_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function iats_civicrm_enable() {
  if (!class_exists('SoapClient')) {
    $session = CRM_Core_Session::singleton();
    $session->setStatus(ts('The PHP SOAP extension is not installed on this server, but is required for this extension'), ts('iATS Payments Installation'), 'error');
  }
  _iats_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function iats_civicrm_disable() {
  _iats_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function iats_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _iats_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function iats_civicrm_managed(&$entities) {
  _iats_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function iats_civicrm_caseTypes(&$caseTypes) {
  _iats_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function iats_civicrm_angularModules(&$angularModules) {
  _iats_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function iats_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _iats_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function iats_civicrm_entityTypes(&$entityTypes) {
  _iats_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function iats_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function iats_civicrm_navigationMenu(&$menu) {
  _iats_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _iats_civix_navigationMenu($menu);
} // */

/**
 * Implements hook_civicrm_check().
 */
function iats_civicrm_check(&$messages) {
  if (!class_exists('SoapClient')) {
    $messages[] = new CRM_Utils_Check_Message(
      'iats_soap',
      ts('The SOAP extension for PHP %1 is not installed on this server, but is required for this extension.', array(1 => phpversion())),
      ts('iATS Payments Installation'),
      \Psr\Log\LogLevel::CRITICAL,
      'fa-flag'
    );
  }
}

/**
 * Utility function to get domain info.
 *
 * Get values from the civicrm_domain table, or a domain setting.
 * May be called multiple times, so be efficient.
 */
function _iats_civicrm_domain_info($key) {
  static $domain, $settings;
  if (empty($domain)) {
    $domain = civicrm_api3('Domain', 'getsingle', array('current_domain' => TRUE));
  }
  if (!isset($settings)) {
    $settings = array();
  }
  switch ($key) {
    case 'version':
      return explode('.', $domain['version']);

    default:
      if (isset($domain[$key])) {
        return $domain[$key];
      }
      elseif (isset($settings[$key])) {
        return $settings[$key];
      }
      else {
        try{
          $setting = civicrm_api3('Setting', 'getvalue', array('name' => $key));
          if (is_string($setting)) {
            $settings[$key] = $setting;
            return $setting;
          }
        }
        catch (CiviCRM_API3_Exception $e) {
          // ignore errors
        }
        // This remaining code is now very legacy, from earlier Civi versions and should soon be retired.
        if (!empty($domain['config_backend'])) {
          $config_backend = unserialize($domain['config_backend']);
          if (!empty($config_backend[$key])) {
            $settings[$key] = $config_backend[$key];
            return $config_backend[$key];
          }
        }
      }
      // Uncomment one or more of these lines to find out what it was we were looking for and didn't find.
      // CRM_Core_Error::debug_var('domain', $domain);
      // CRM_Core_Error::debug_var($key, $settings);
      // CRM_Core_Error::debug_var($key, $setting);
  }
}

/* START utility functions to allow this extension to work with different civicrm version */

// removed, 1.7 release

/* END functions to allow this extension to work with different civicrm version */

/**
 * Utility to get the next available menu key.
 */
function _iats_getMenuKeyMax($menuArray) {
  $max = array(max(array_keys($menuArray)));
  foreach ($menuArray as $v) {
    if (!empty($v['child'])) {
      $max[] = _iats_getMenuKeyMax($v['child']);
    }
  }
  return max($max);
}

/**
 *
 */
function iats_civicrm_navigationMenu(&$navMenu) {
  $pages = array(
    'admin_page' => array(
      'label'      => 'iATS Payments Admin',
      'name'       => 'iATS Payments Admin',
      'url'        => 'civicrm/iATSAdmin',
      'parent' => array('Contributions'),
      'permission' => 'access CiviContribute,administer CiviCRM',
      'operator'   => 'AND',
      'separator'  => NULL,
      'active'     => 1,
    ),
    'settings_page' => array(
      'label'      => 'iATS Payments Settings',
      'name'       => 'iATS Payments Settings',
      'url'        => 'civicrm/admin/contribute/iatssettings',
      'parent'    => array('Administer', 'CiviContribute'),
      'permission' => 'access CiviContribute,administer CiviCRM',
      'operator'   => 'AND',
      'separator'  => NULL,
      'active'     => 1,
    ),
  );
  foreach ($pages as $item) {
    // Check that our item doesn't already exist.
    $menu_item_search = array('url' => $item['url']);
    $menu_items = array();
    CRM_Core_BAO_Navigation::retrieve($menu_item_search, $menu_items);
    if (empty($menu_items)) {
      $path = implode('/', $item['parent']);
      unset($item['parent']);
      _iats_civix_insert_navigation_menu($navMenu, $path, $item);
    }
  }
}

/**
 * Hook_civicrm_buildForm.
 * Do a Drupal 7 style thing so we can write smaller functions.
 */
function iats_civicrm_buildForm($formName, &$form) {
  // But start by grouping a few forms together for nicer code.
  switch ($formName) {
    case 'CRM_Event_Form_Participant':
    case 'CRM_Member_Form_Membership':
    case 'CRM_Contribute_Form_Contribution':
      // Override normal convention, deal with all these backend credit card contribution forms the same way.
      $fname = 'iats_civicrm_buildForm_CreditCard_Backend';
      break;

    case 'CRM_Contribute_Form_Contribution_Main':
    case 'CRM_Event_Form_Registration_Register':
    case 'CRM_Financial_Form_Payment':
      // Override normal convention, deal with all these front-end contribution forms the same way.
      $fname = 'iats_civicrm_buildForm_Contribution_Frontend';
      break;

    default:
      $fname = 'iats_civicrm_buildForm_' . $formName;
      break;
  }
  if (function_exists($fname)) {
    $fname($form);
  }
  // Else echo $fname;.
}

/**
 *
 */
function iats_civicrm_pageRun(&$page) {
  $fname = 'iats_civicrm_pageRun_' . $page->getVar('_name');
  if (function_exists($fname)) {
    $fname($page);
  }
}

/**
 *
 */
function iats_civicrm_pageRun_CRM_Contact_Page_View_Summary(&$page) {
  // Because of AJAX loading, I need to load my backend swipe js here.
  $swipe = _iats_filter_payment_processors('iATSServiceSWIPE', array(), array('is_default' => 1));
  if (count($swipe) > 0) {
    CRM_Core_Resources::singleton()->addScriptFile('com.iatspayments.civicrm', 'js/swipe.js', 10);
  }
}

/**
 * Modify the recurring contribution (subscription) page.
 * Display extra information about recurring contributions using iATS, and
 * link to iATS CustomerLink display and editing pages.
 */
function iats_civicrm_pageRun_CRM_Contribute_Page_ContributionRecur($page) {
  // Get the corresponding (most recently created) iATS customer code record referenced from the customer_codes table via the recur_id ('crid')
  // we'll also get the expiry date and last four digits (at least, our best information about that).
  $extra = array();
  $crid = CRM_Utils_Request::retrieve('id', 'Integer', $page, FALSE);
  try {
    $recur = civicrm_api3('ContributionRecur', 'getsingle', array('id' => $crid));
  }
  catch (CiviCRM_API3_Exception $e) {
    return;
  }
  $type = _iats_civicrm_is_iats($recur['payment_processor_id']);
  if (!$type) {
    return;
  }
  try {
    $params = array(1 => array($crid, 'Integer'));
    $dao = CRM_Core_DAO::executeQuery("SELECT customer_code,expiry FROM civicrm_iats_customer_codes WHERE recur_id = %1 ORDER BY id DESC LIMIT 1", $params);
    if ($dao->fetch()) {
      $customer_code = $dao->customer_code;
      $extra['iATS Customer Code'] = $customer_code;
      $customerLinkView = CRM_Utils_System::url('civicrm/contact/view/iatscustomerlink',
        'reset=1&cid=' . $recur['contact_id'] . '&customerCode=' . $customer_code . '&paymentProcessorId=' . $recur['payment_processor_id'] . '&is_test=' . $recur['is_test']);
      $extra['customerLink'] = "<a href='$customerLinkView'>View</a>";
      if ($type == 'iATSService' || $type == 'iATSServiceSWIPE') {
        $customerLinkEdit = CRM_Utils_System::url('civicrm/contact/edit/iatscustomerlink',
          'reset=1&cid=' . $recur['contact_id'] . '&customerCode=' . $customer_code . '&paymentProcessorId=' . $recur['payment_processor_id'] . '&is_test=' . $recur['is_test']);
        $extra['customerLink'] .= " | <a href='$customerLinkEdit'>Edit</a>";
        $processLink = CRM_Utils_System::url('civicrm/contact/iatsprocesslink',
          'reset=1&cid=' . $recur['contact_id'] . '&customerCode=' . $customer_code . '&paymentProcessorId=' . $recur['payment_processor_id'] . '&crid=' . $crid . '&is_test=' . $recur['is_test']);
        $extra['customerLink'] .= " | <a href='$processLink'>Process</a>";
        $expiry = str_split($dao->expiry, 2);
        $extra['expiry'] = '20' . implode('-', $expiry);
      }
    }
    if (!empty($recur['invoice_id'])) {
      // We may have the last 4 digits via the original request log, though they may no longer be accurate, but let's get it anyway if we can.
      $params = array(1 => array($recur['invoice_id'], 'String'));
      $dao = CRM_Core_DAO::executeQuery("SELECT cc FROM civicrm_iats_request_log WHERE invoice_num = %1", $params);
      if ($dao->fetch()) {
        $extra['cc'] = $dao->cc;
      }
    }
  }
  catch (CiviCRM_API3_Exception $e) {
    return;
  }
  if (!count($extra)) {
    return;
  }
  $template = CRM_Core_Smarty::singleton();
  foreach ($extra as $key => $value) {
    $template->assign($key, $value);
  }
  CRM_Core_Region::instance('page-body')->add(array(
    'template' => 'CRM/Iats/ContributionRecur.tpl',
  ));
  CRM_Core_Resources::singleton()->addScriptFile('com.iatspayments.civicrm', 'js/subscription_view.js');
}

/**
 * Hook_civicrm_merge
 * Deal with contact merges - our custom iats customer code table contains contact id's as a check, it might need to be updated.
 */
function iats_civicrm_merge($type, &$data, $mainId = NULL, $otherId = NULL, $tables = NULL) {
  if ('cidRefs' == $type) {
    $data['civicrm_iats_customer_codes'] = array('cid');
    $data['civicrm_iats_verify'] = array('cid');
  }
}

/**
 * Hook_civicrm_pre.
 *
 * Handle special cases of creating contribution (regular and recurring) records when using IATS Payments.
 *
 * 1. CiviCRM assumes all recurring contributions need to be confirmed using the IPN mechanism. This is not true for iATS recurring contributions.
 * So when creating a contribution that is part of a recurring series, test for status = 2, and set to status = 1 instead, unless we're using the fixed day feature
 * Do this only for the initial contribution record.
 * The (subsequent) recurring contributions' status id is set explicitly in the job that creates it, this modification breaks that process.
 *
 * 2. For ACH/EFT, we also have the opposite problem - all contributions will need to verified by iATS and only later set to status success or
 * failed via the acheft verify job. We also want to modify the payment instrument from CC to ACH/EFT
 *
 * TODO: update this code with constants for the various id values of 1 and 2.
 * TODO: CiviCRM should have nicer ways to handle this.
 */
function iats_civicrm_pre($op, $objectName, $objectId, &$params) {
  // Since this function gets called a lot, quickly determine if I care about the record being created.
  if (('create' == $op) && ('Contribution' == $objectName) && !empty($params['contribution_status_id'])) {
    // watchdog('iats_civicrm','hook_civicrm_pre for Contribution <pre>@params</pre>',array('@params' => print_r($params));
    // figure out the payment processor id, not nice.
    $version = CRM_Utils_System::version();
    $payment_processor_id = !empty($params['payment_processor']) ? $params['payment_processor'] :
                                (!empty($params['contribution_recur_id']) ? _iats_civicrm_get_payment_processor_id($params['contribution_recur_id']) :
                                 0);
    if ($type = _iats_civicrm_is_iats($payment_processor_id)) {
      $settings = CRM_Core_BAO_Setting::getItem('iATS Payments Extension', 'iats_settings');
      $allow_days = empty($settings['days']) ? array('-1') : $settings['days'];
      switch ($type . $objectName) {
        // Cc contribution, test if it's been set to status 2 on a recurring contribution.
        case 'iATSServiceContribution':
        case 'iATSServiceSWIPEContribution':
          // For civi version before 4.6.6, we had to force the status to 1.
          if ((2 == $params['contribution_status_id'])
            && !empty($params['contribution_recur_id'])
            && (max($allow_days) <= 0)
            && (version_compare($version, '4.6.6') < 0)
          ) {
            // But only for the first one.
            $count = civicrm_api3('Contribution', 'getcount', array('contribution_recur_id' => $params['contribution_recur_id']));
            if (
              (is_array($count) && empty($count['result']))
              || empty($count)
            ) {
              // watchdog('iats_civicrm','hook_civicrm_pre updating status_id for objectName @id, count <pre>!count</pre>, params <pre>!params</pre>, ',array('@id' => $objectName, '!count' => print_r($count,TRUE),'!params' => print_r($params,TRUE)));.
              $params['contribution_status_id'] = 1;
            }
          }
          break;

        case 'iATSServiceACHEFTContribution':
          // ach/eft contribution: update the payment instrument if it's still showing cc or empty
          if ($params['payment_instrument_id'] <= 1) {
            $params['payment_instrument_id'] = 2;
          }
          // And push the status to 2 if civicrm thinks it's 1, i.e. for one-time contributions
          // in other words, never create ach/eft contributions as complete, always push back to pending and verify.
          if ($params['contribution_status_id'] == 1) {
            $params['contribution_status_id'] = 2;
          }
          break;

      }
    }
    // watchdog('iats_civicrm','ignoring hook_civicrm_pre for objectName @id',array('@id' => $objectName));.
  }
  // If I've set fixed monthly recurring dates, force any iats (non uk dd) recurring contribution schedule records to comply.
  if (('ContributionRecur' == $objectName) && ('create' == $op || 'edit' == $op) && !empty($params['payment_processor_id'])) {
    if ($type = _iats_civicrm_is_iats($params['payment_processor_id'])) {
      if (!empty($params['next_sched_contribution_date'])) {
        $settings = CRM_Core_BAO_Setting::getItem('iATS Payments Extension', 'iats_settings');
        $allow_days = empty($settings['days']) ? array('-1') : $settings['days'];
        // Force one of the fixed days, and set the cycle_day at the same time.
        if (0 < max($allow_days)) {
          $init_time = ('create' == $op) ? time() : strtotime($params['next_sched_contribution_date']);
          $from_time = _iats_contributionrecur_next($init_time, $allow_days);
          $params['next_sched_contribution_date'] = date('YmdHis', $from_time);
          // Day of month without leading 0.
          $params['cycle_day'] = date('j', $from_time);
        }
      }
      // Fix a civi bug while I'm here.
      if (empty($params['installments'])) {
        $params['installments'] = '0';
      }
    }
  }
}

function iats_get_setting($key = NULL) {
  static $settings;
  if (empty($settings)) { 
    $settings = CRM_Core_BAO_Setting::getItem('iATS FAPS Payments Extension', 'iats_settings');
  }
  return empty($key) ?  $settings : (isset($settings[$key]) ? $settings[$key] : '');
}

/**
 * The contribution itself doesn't tell you which payment processor it came from
 * So we have to dig back via the contribution_recur_id that it is associated with.
 */
function _iats_civicrm_get_payment_processor_id($contribution_recur_id) {
  $params = array(
    'id' => $contribution_recur_id,
  );
  try {
    $result = civicrm_api3('ContributionRecur', 'getsingle', $params);
  }
  catch (CiviCRM_API3_Exception $e) {
    return FALSE;
  }
  if (empty($result['payment_processor_id'])) {
    return FALSE;
    // TODO: log error.
  }
  return $result['payment_processor_id'];
}

/**
 * Utility function to see if a payment processor id is using one of the iATS payment processors.
 *
 * This function relies on our naming convention for the iats payment processor classes, staring with the string Payment_iATSService.
 */
function _iats_civicrm_is_iats($payment_processor_id) {
  if (empty($payment_processor_id)) {
    return FALSE;
  }
  $params = array(
    'id' => $payment_processor_id,
  );
  try {
    $result = civicrm_api3('PaymentProcessor', 'getsingle', $params);
  }
  catch (CiviCRM_API3_Exception $e) {
    return FALSE;
  }
  if (empty($result['class_name'])) {
    return FALSE;
    // TODO: log error.
  }
  $type = substr($result['class_name'], 0, 19);
  $subtype = substr($result['class_name'], 19);
  return ('Payment_iATSService' == $type) ? 'iATSService' . $subtype : FALSE;
}

/**
 * Internal utility function: return the id's of any iATS processors matching various conditions.
 *
 * class: the payment object class name to match (prefixed w/ 'Payment_')
 * processors: an array of payment processors indexed by id to filter by
 * params: an array of additional params to pass to the api call.
 */
function _iats_filter_payment_processors($class, $processors = array(), $params = array()) {
  $list = array();
  $params['class_name'] = ['LIKE' => 'Payment_' . $class];

  // Set the domain id if not passed in.
  if (!array_key_exists('domain_id', $params)) {
    $params['domain_id']    = CRM_Core_Config::domainID();
  }
  $params['sequential'] = FALSE; // return list indexed by processor id
  $result = civicrm_api3('PaymentProcessor', 'get', $params);
  if (0 == $result['is_error'] && count($result['values']) > 0) {
    $list = (0 < count($processors)) ? array_intersect_key($result['values'], $processors) : $result['values'];
  }
  return $list;
}


/**
 * Internal utility function: return a list of the payment processors attached
 * to a contribution form of variable class
 * */
function _iats_get_form_payment_processors($form) {
  $form_class = get_class($form);

  if ($form_class == 'CRM_Financial_Form_Payment') {
    // We're on CRM_Financial_Form_Payment, we've got just one payment processor
    $id = $form->_paymentProcessor['id'];
    return array($id => $form->_paymentProcessor);
  }
  else { 
    // Handle the legacy: event and contribution page forms
    if (empty($form->_paymentProcessors)) {
      if (empty($form->_paymentProcessorIDs)) {
        return;
      }
      else {
        return array_fill_keys($form->_paymentProcessorIDs, 1);
      }
    }
    else {
      return $form->_paymentProcessors;
    }
  }
}



/**
 * Customize direct debit billing blocks, per currency.
 *
 * Each country has different rules about direct debit, so only currencies that we explicitly handle will be
 * customized, others will get a warning.
 *
 * The currency-specific functions will do things like modify labels, add exta fields,
 * add legal requirement notice and perhaps checkbox acceptance for electronic acceptance of ACH/EFT, and
 * make this form nicer by include a sample check with instructions for getting the various numbers
 *
 * Each one also includes some javascript to move the new fields around on the DOM
 */
function iats_acheft_form_customize($form) {
  $currency = iats_getCurrency($form);
  $fname = 'iats_acheft_form_customize_' . $currency;
  /* we always want these three fields to be required, in all currencies. As of 4.6.?, this is in core */
  if (empty($form->billingFieldSets['direct_debit']['fields']['account_holder']['is_required'])) {
    $form->addRule('account_holder', ts('%1 is a required field.', array(1 => ts('Name of Account Holder'))), 'required');
  }
  if (empty($form->billingFieldSets['direct_debit']['fields']['bank_account_number']['is_required'])) {
    $form->addRule('bank_account_number', ts('%1 is a required field.', array(1 => ts('Account Number'))), 'required');
  }
  if (empty($form->billingFieldSets['direct_debit']['fields']['bank_name']['is_required'])) {
    $form->addRule('bank_name', ts('%1 is a required field.', array(1 => ts('Bank Name'))), 'required');
  }
  if ($currency && function_exists($fname)) {
    $fname($form);
  }
  // I'm handling an unexpected currency.
  elseif ($currency) {
    CRM_Core_Region::instance('billing-block')->add(array(
      'template' => 'CRM/Iats/BillingBlockDirectDebitExtra_Other.tpl',
    ));
  }
}

/**
 *
 */
function iats_getCurrency($form) {
  // getting the currency depends on the form class
  $form_class = get_class($form);
  $currency = '';
  switch($form_class) {
    case 'CRM_Contribute_Form_Contribution':
    case 'CRM_Contribute_Form_Contribution_Main':
    case 'CRM_Member_Form_Membership':
      $currency = $form->_values['currency'];
      break;
    case 'CRM_Financial_Form_Payment':
      // This is the new ajax-loaded payment form.
      $currency = $form->getCurrency();
      break;
    case 'CRM_Event_Form_Participant':
    case 'CRM_Event_Form_Registration_Register':
      $currency = $form->_values['event']['currency'];
      break;
  }
  if (empty($currency)) {
    // This may occur in edge cases, so don't break, though the form won't be rendered correctly.
    // See comment on civicrm core commit f61437d
    CRM_Core_Error::debug_var($form_class, $form);
  }
  return $currency;
}

/**
 * Customization for USD ACH-EFT billing block.
 */
function iats_acheft_form_customize_USD($form) {
  $form->addElement('select', 'bank_account_type', ts('Account type'), array('CHECKING' => 'Checking', 'SAVING' => 'Saving'));
  $form->addRule('bank_account_type', ts('%1 is a required field.', array(1 => ts('Account type'))), 'required');
  $element = $form->getElement('account_holder');
  $element->setLabel(ts('Name of Account Holder'));
  $element = $form->getElement('bank_account_number');
  $element->setLabel(ts('Bank Account Number'));
  $element = $form->getElement('bank_identification_number');
  $element->setLabel(ts('Bank Routing Number'));
  if (empty($form->billingFieldSets['direct_debit']['fields']['bank_identification_number']['is_required'])) {
    $form->addRule('bank_identification_number', ts('%1 is a required field.', array(1 => ts('Bank Routing Number'))), 'required');
  }
  CRM_Core_Region::instance('billing-block')->add(array(
    'template' => 'CRM/Iats/BillingBlockDirectDebitExtra_USD.tpl',
  ));
}

/**
 * Customization for CAD ACH-EFT billing block.
 */
function iats_acheft_form_customize_CAD($form) {
  $form->addElement('text', 'cad_bank_number', ts('Bank Number (3 digits)'));
  $form->addRule('cad_bank_number', ts('%1 is a required field.', array(1 => ts('Bank Number'))), 'required');
  $form->addRule('cad_bank_number', ts('%1 must contain only digits.', array(1 => ts('Bank Number'))), 'numeric');
  $form->addRule('cad_bank_number', ts('%1 must be of length 3.', array(1 => ts('Bank Number'))), 'rangelength', array(3, 3));
  $form->addElement('text', 'cad_transit_number', ts('Transit Number (5 digits)'));
  $form->addRule('cad_transit_number', ts('%1 is a required field.', array(1 => ts('Transit Number'))), 'required');
  $form->addRule('cad_transit_number', ts('%1 must contain only digits.', array(1 => ts('Transit Number'))), 'numeric');
  $form->addRule('cad_transit_number', ts('%1 must be of length 5.', array(1 => ts('Transit Number'))), 'rangelength', array(5, 5));
  $form->addElement('select', 'bank_account_type', ts('Account type'), array('CHECKING' => 'Chequing', 'SAVING' => 'Savings'));
  $form->addRule('bank_account_type', ts('%1 is a required field.', array(1 => ts('Account type'))), 'required');
  /* minor customization of labels + make them required */
  $element = $form->getElement('account_holder');
  $element->setLabel(ts('Name of Account Holder'));
  $element = $form->getElement('bank_account_number');
  $element->setLabel(ts('Account Number'));
  $form->addRule('bank_account_number', ts('%1 must contain only digits.', array(1 => ts('Bank Account Number'))), 'numeric');
  /* the bank_identification_number is hidden and then populated using jquery, in the custom template */
  $element = $form->getElement('bank_identification_number');
  $element->setLabel(ts('Bank Number + Transit Number'));
  CRM_Core_Region::instance('billing-block')->add(array(
    'template' => 'CRM/Iats/BillingBlockDirectDebitExtra_CAD.tpl',
  ));
}

/**
 * Contribution form customization for iATS secure swipe.
 */
function iats_swipe_form_customize($form) {
  // Remove two fields that are replaced by the swipe code data
  // we need to remove them from the _paymentFields as well or they'll sneak back in!
  $form->removeElement('credit_card_type', TRUE);
  $form->removeElement('cvv2', TRUE);
  unset($form->_paymentFields['credit_card_type']);
  unset($form->_paymentFields['cvv2']);
  // Add a single text area to store/display the encrypted cc number that the swipe device will fill.
  $form->addElement('textarea', 'encrypted_credit_card_number', ts('Encrypted'), array('cols' => '80', 'rows' => '8'));
  $form->addRule('encrypted_credit_card_number', ts('%1 is a required field.', array(1 => ts('Encrypted'))), 'required');
  CRM_Core_Region::instance('billing-block')->add(array(
    'template' => 'CRM/Iats/BillingBlockSwipe.tpl',
  ));
}

/**
 * Modifications to a (public/frontend) contribution forms.
 * 1. set recurring to be the default, if enabled (ACH/EFT) [previously forced recurring, removed in 1.2.4]
 * 2. add extra fields/modify labels.
 * 3. enable public selection of future recurring contribution start date.
 * 
 * We're handling event, contribution, and financial payment class forms here. 
 * The new 4.7 financial payment class form is used when switching payment processors (sometimes).
 */
function iats_civicrm_buildForm_Contribution_Frontend(&$form) {

  $processors = _iats_get_form_payment_processors($form);
  $acheft = _iats_filter_payment_processors('iATSServiceACHEFT', $processors);
  // If a form allows ACH/EFT and enables recurring, set recurring to the default.
  if (0 < count($acheft)) {
    if (isset($form->_elementIndex['is_recur'])) {
      // Make recurring contrib default to true.
      $form->setDefaults(array('is_recur' => 1));
    }
  }
  // Include extra javascript for SWIPE
  $swipe = _iats_filter_payment_processors('iATSServiceSWIPE', $processors);
  if (0 < count($swipe)) {
    CRM_Core_Resources::singleton()->addScriptFile('com.iatspayments.civicrm', 'js/swipe.js', 10);
  }
  /* Mangle the ajax bit of the form for swipe and ach */
  if (!empty($form->_paymentProcessor['id'])) {
    $id = $form->_paymentProcessor['id'];
    /* Note that Ach/Eft is currency dependent */
    if (!empty($acheft[$id])) {
      iats_acheft_form_customize($form);
      // watchdog('iats_acheft',kprint_r($form,TRUE));.
    }
    elseif (!empty($swipe[$id])) {
      iats_swipe_form_customize($form);
    }
  }
  // now get all iATS (+ FAPS) processors for this page
  $iats = _iats_filter_payment_processors('iATSService', $processors);
  $faps = _iats_filter_payment_processors('Faps', $processors);
  // If any of them is enabled on a page with monthly recurring contributions enabled, provide a way to set future contribution dates. 
  // Uses javascript to hide/reset unless they have recurring contributions checked.
  if ((count($iats) || count($faps)) && isset($form->_elementIndex['is_recur'])) {
    $settings = CRM_Core_BAO_Setting::getItem('iATS Payments Extension', 'iats_settings');
    if (!empty($settings['enable_public_future_recurring_start'])) {
      $allow_days = empty($settings['days']) ? array('-1') : $settings['days'];
      $start_dates = _iats_get_future_monthly_start_dates(time(), $allow_days);
      $form->addElement('select', 'receive_date', ts('Date of first contribution'), $start_dates);
      CRM_Core_Region::instance('billing-block')->add(array(
        'template' => 'CRM/Iats/BillingBlockRecurringExtra.tpl',
      ));
      CRM_Core_Resources::singleton()->addScriptFile('com.iatspayments.civicrm', 'js/recur_start.js', 10);
    }
  }

  // check if I'm using any faps processors w/ cryptogram
  if (count($faps) && !iats_get_setting('disable_cryptogram')) {
    iats_faps_form_customize($form, $faps);
  }

}

/**
 * Add the FAPS iframe
 * This is still a placeholder - need to invoke with more argument at the right
 * place.
 */
function iats_faps_form_customize($form, $faps_processors) {

  // die('test');
  if (empty($form->_submitValues['payment_processor_id'])) {
    if (empty($form->_defaults['payment_processor_id'])) {
      $payment_processor_ids = array_keys($iats_processors);
      $payment_processor_id = reset($payment_processor_ids);
    }
    else {
      $payment_processor_id = $form->_defaults['payment_processor_id'];
    }
  }
  else {
    $payment_processor_id = $form->_submitValues['payment_processor_id'];
  }
  // I need to add an iframe for each available processor id on the form
  // My js needs to be smarter to hide it when the corresponding processor is
  // not selected.
  foreach ($faps_processors as $this_processor) {

    /* if (empty($faps_processors[$payment_processor_id])) {
      // continue;
      return;
    } */
    // $this_processor = $faps_processors[$payment_processor_id];

    $is_cc = ($this_processor['payment_instrument_id'] == 1);
    $is_test = ($this_processor['is_test'] == 1);
    $has_is_recur = $form->elementExists('is_recur');
    /* by default, use the cryptogram, but allow it to be disabled */
    // CRM_Core_Error::debug_var('generate cryptogram html', $faps_processors);
    // CRM_Core_Error::debug_var('form class', $form_class);
    // CRM_Core_Error::debug_var('form', $form);
    $credentials = array(
      'transcenterId' => $this_processor['password'],
      'processorId' => $this_processor['user_name'],
    );
    // print_r($this_processor); die();
    $iats_domain = parse_url($this_processor['url_site'], PHP_URL_HOST);
    $cryptojs = 'https://' . $iats_domain . '/secure/PaymentHostedForm/Scripts/firstpay/firstpay.cryptogram.js';
    $transaction_type = $has_is_recur ? ($is_cc ? 'Auth' : 'Vault') : ($is_cc ? 'Sale' : 'AchDebit');
    $iframe_src = 'https://' . $iats_domain . '/secure/PaymentHostedForm/v3/' . ($is_cc ? 'CreditCard' : 'Ach');
    $iframe_style = 'width: 100%;'; // height: 100%;';
    $markup = sprintf("<iframe id=\"firstpay-iframe\" src=\"%s\" style=\"%s\" data-transcenter-id=\"%s\" data-processor-id=\"%s\" data-transaction-type=\"%s\" data-manual-submit=\"false\"></iframe>\n", $iframe_src, $iframe_style,$credentials['transcenterId'], $credentials['processorId'], $transaction_type);
    // $markup = "<iframe id=\"firstpay-iframe\" src=\"%s\" style=\"width: 100%;
    // height: 100%\" data-transcenter-id=\"%s\" data-processor-id=\"%s\"
    // data-transaction-type=\"%s\" data-manual-submit=\"false\"></iframe>\n";
    // print_r('<pre>'.$markup.'</pre>'); die();
    CRM_Core_Resources::singleton()->addScriptUrl($cryptojs);
    // $markup = print_r($faps_processors, TRUE);
    CRM_Core_Resources::singleton()->addScriptFile('com.iatspayments.civicrm', 'js/crypto.js', 10);
    CRM_Core_Resources::singleton()->addStyleFile('com.iatspayments.civicrm', 'css/crypto.css', 10);
    CRM_Core_Region::instance('page-body')->add(array(
            'name' => 'firstpay-iframe',
            'type' => 'markup',
            'markup' => $markup,
            'weight' => 11,
            'region' => 'page-body',
          )); 
  }
}

/**
 * Fix the backend credit card contribution forms
 * Includes CRM_Contribute_Form_Contribution, CRM_Event_Form_Participant, CRM_Member_Form_Membership
 * 1. Remove my ACH/EFT processors
 * Now fixed in core for contribution forms: https://issues.civicrm.org/jira/browse/CRM-14442
 * 2. Force SWIPE (i.e. remove all others) if it's the default, and mangle the form accordingly.
 * For now, this form doesn't refresh when you change payment processors, so I can't use swipe if it's not the default, so i have to remove it.
 */
function iats_civicrm_buildForm_CreditCard_Backend(&$form) {
  // Skip if i don't have any processors.
  if (empty($form->_processors)) {
    return;
  }
  // Get all my swipe processors.
  $swipe = _iats_filter_payment_processors('iATSServiceSWIPE', $form->_processors);
  // Get all my ACH/EFT processors (should be 0, but I'm fixing old core bugs)
  $acheft = _iats_filter_payment_processors('iATSServiceACHEFT', $form->_processors);
  // If an iATS SWIPE payment processor is enabled and default remove all other payment processors.
  $swipe_id_default = 0;
  if (0 < count($swipe)) {
    foreach ($swipe as $id => $pp) {
      if ($pp['is_default']) {
        $swipe_id_default = $id;
        break;
      }
    }
  }
  // Find the available pp options form element (update this if we ever switch from quickform, uses a quickform internals)
  // not all invocations of the form include this, so check for non-empty value first.
  if (!empty($form->_elementIndex['payment_processor_id'])) {
    $pp_form_id = $form->_elementIndex['payment_processor_id'];
    // Now cycle through them, either removing everything except the default swipe or just removing the ach/eft.
    $element = $form->_elements[$pp_form_id]->_options;
    foreach ($element as $option_id => $option) {
      // Key is set to payment processor id.
      $pp_id = $option['attr']['value'];
      if ($swipe_id_default) {
        // Remove any that are not my swipe default pp.
        if ($pp_id != $swipe_id_default) {
          $form->_elements[$pp_form_id]->_options[$option_id]['attr']['disabled'] = 'disabled';
        }
      }
      elseif (!empty($acheft[$pp_id]) || !empty($swipe[$pp_id])) {
        // Disable my ach/eft and swipe, which both require form changes.
        $form->_elements[$pp_form_id]->_options[$option_id]['attr']['disabled'] = 'disabled';
      }
    }
  }

  // If i'm using swipe as default and I've got a billing section, then customize it.
  if ($swipe_id_default) {
    CRM_Core_Resources::singleton()->addScriptFile('com.iatspayments.civicrm', 'js/swipe.js', 10);
    if (!empty($form->_elementIndex['credit_card_exp_date'])) {
      iats_swipe_form_customize($form);
    }
  }

  // check if I'm using any faps processors
  $faps = _iats_filter_payment_processors('Faps', $form->_processors);
  if ($faps) {
    iats_faps_form_customize($form, $faps);
  }
}

/**
 * Provide helpful links to backend-ish payment pages for ACH/EFT, since the backend credit card pages don't work/apply
 * Could do the same for swipe?
 */
function iats_civicrm_buildForm_CRM_Contribute_Form_Search(&$form) {
  // Ignore invocations that aren't for a specific contact, e.g. the civicontribute dashboard.
  if (empty($form->_defaultValues['contact_id'])) {
    return;
  }
  $contactID = $form->_defaultValues['contact_id'];
  $acheft = _iats_filter_payment_processors('iATSServiceACHEFT', array(), array('is_active' => 1, 'is_test' => 0));
  $acheft_backoffice_links = array();
  // For each ACH/EFT payment processor, try to provide a different mechanism for 'backoffice' type contributions
  // note: only offer payment pages that provide iATS ACH/EFT exclusively.
  foreach (array_keys($acheft) as $pp_id) {
    $params = array('is_active' => 1, 'payment_processor' => $pp_id);
    $result = civicrm_api3('ContributionPage', 'get', $params);
    if (0 == $result['is_error'] && count($result['values']) > 0) {
      foreach ($result['values'] as $page) {
        $url = CRM_Utils_System::url('civicrm/contribute/transact', 'reset=1&cid=' . $contactID . '&id=' . $page['id']);
        $acheft_backoffice_links[] = array('url' => $url, 'title' => $page['title']);
      }
    }
  }
  if (count($acheft_backoffice_links)) {
    CRM_Core_Resources::singleton()->addVars('iatspayments', array('backofficeLinks' => $acheft_backoffice_links));
    CRM_Core_Resources::singleton()->addScriptFile('com.iatspayments.civicrm', 'js/contribute_form_search.js');
  }
}

/**
 * If this recurring contribution sequence is using an iATS payment processor,
 * modify the recurring contribution cancelation form to exclude the confusing message about sending the request to the backend.
 */
function iats_civicrm_buildForm_CRM_Contribute_Form_CancelSubscription(&$form) {
  $crid = CRM_Utils_Request::retrieve('crid', 'Integer', $form, FALSE);
  try {
    $recur = civicrm_api3('ContributionRecur', 'getsingle', array('id' => $crid));
  }
  catch (CiviCRM_API3_Exception $e) {
    return;
  }
  if (_iats_civicrm_is_iats($recur['payment_processor_id'])) {
    if ($form->elementExists('send_cancel_request')) {
      $form->removeElement('send_cancel_request');
    }
  }
}

/**
 * Add some functionality to the update subscription form for recurring contributions.
 */
function iats_civicrm_buildForm_CRM_Contribute_Form_UpdateSubscription(&$form) {

  /* For 4.7, we implement getEditableRecurringScheduleFields but still need this for additional niceness */

  // Only do this if the user is allowed to edit contributions. A more stringent permission might be smart.
  if (!CRM_Core_Permission::check('edit contributions')) {
    return;
  }
  // Only mangle this form for recurring contributions using iATS
  $payment_processor_type = empty($form->_paymentProcessor) ? substr(get_class($form->_paymentProcessorObj),9) : $form->_paymentProcessor['class_name'];
  if (  (0 !== strpos($payment_processor_type, 'Payment_iATSService'))
     && (0 !== strpos($payment_processor_type, 'Payment_Faps')) ){
    return;
  }
  $settings = civicrm_api3('Setting', 'getvalue', array('name' => 'iats_settings'));
  // don't do this if the site administrator has disabled it.
  if (!empty($settings['no_edit_extra'])) {
    return;
  }
  $allow_days = empty($settings['days']) ? array('-1') : $settings['days'];
  if (0 < max($allow_days)) {
    $userAlert = ts('Your next scheduled contribution date will automatically be updated to the next allowable day of the month: %1', 
      array(1 => implode(', ', $allow_days)));
    CRM_Core_Session::setStatus($userAlert, ts('Warning'), 'alert');
  }
  $crid = CRM_Utils_Request::retrieve('crid', 'Integer', $form, FALSE);
  /* get the recurring contribution record and the contact record, or quit */
  try {
    $recur = civicrm_api3('ContributionRecur', 'getsingle', array('id' => $crid));
  }
  catch (CiviCRM_API3_Exception $e) {
    return;
  }
  try {
    $contact = civicrm_api3('Contact', 'getsingle', array('id' => $recur['contact_id']));
  }
  catch (CiviCRM_API3_Exception $e) {
    return;
  }
  try {
    $pp = civicrm_api3('PaymentProcessor', 'getsingle', array('id' => $recur['payment_processor_id']));
  }
  catch (CiviCRM_API3_Exception $e) {
    $pp = array();
  }
  // Turn off default notification checkbox, because that's a better default.
  $defaults = array('is_notify' => 0);
  $edit_fields = array(
    'contribution_status_id' => 'Status',
    'next_sched_contribution_date' => 'Next Scheduled Contribution',
    'start_date' => 'Start Date',
    'is_email_receipt' => 'Email receipt for each Contribution in this Recurring Series',
  );
  $dupe_fields = array();
  // To be a good citizen, I check if core or another extension hasn't already added these fields 
  // and don't add them again if they have.
  foreach (array_keys($edit_fields) as $fid) {
    if ($form->elementExists($fid)) {
      unset($edit_fields[$fid]);
      $dupe_fields[] = str_replace('_','-',$fid);
    }
    elseif (isset($recur[$fid])) {
      $defaults[$fid] = $recur[$fid];
    }
  }
  // Use this in my js to identify which fields need to be removed from the tpl I inject below
  CRM_Core_Resources::singleton()->addVars('iatspayments', array('dupeSubscriptionFields' => $dupe_fields));
  foreach ($edit_fields as $fid => $label) {
    switch($fid) {
      case 'contribution_status_id':
        $contributionStatus = CRM_Contribute_PseudoConstant::contributionStatus(NULL, 'name');
        $form->addElement('select', 'contribution_status_id', ts('Status'), $contributionStatus);
        break;
      case 'is_email_receipt':
        $receiptStatus = array('0' => 'No', '1' => 'Yes');
        $form->addElement('select', $fid, ts($label), $receiptStatus);
        break;
      default:
        $form->addDateTime($fid, ts($label));
        break;
    }
  }
  $form->setDefaults($defaults);
  // Now add some more fields for display only
  /* Add in the contact's name */
  $form->addElement('static', 'contact', $contact['display_name']);
  // get my pp, if available.
  $pp_label = empty($pp['name']) ? $form->_paymentProcessor['name'] : $pp['name'];
  $form->addElement('static', 'payment_processor', $pp_label);
  $label = CRM_Contribute_Pseudoconstant::financialType($recur['financial_type_id']);
  $form->addElement('static', 'financial_type', $label);
  $labels = CRM_Contribute_Pseudoconstant::paymentInstrument();
  $label = $labels[$recur['payment_instrument_id']];
  $form->addElement('static', 'payment_instrument', $label);
  $form->addElement('static', 'failure_count', $recur['failure_count']);
  CRM_Core_Region::instance('page-body')->add(array(
    'template' => 'CRM/Iats/Subscription.tpl',
  ));
  CRM_Core_Resources::singleton()->addScriptFile('com.iatspayments.civicrm', 'js/subscription.js');
}

function iats_civicrm_buildForm_CRM_Contribute_Form_UpdateBilling(&$form) {
  // add hidden form field for the contribution recur ID taken from URL
  // if not specified directly, look it up via a membership ID
  $crid = CRM_Utils_Array::value('crid', $_GET);
  if (!$crid) {
    $mid = CRM_Utils_Array::value('mid', $_GET);
    if ($mid) {
      try {
        $crid = civicrm_api3('Membership', 'getvalue', array(
          'id' => $mid,
          'return' => 'contribution_recur_id',
        ));
      }
      catch (CiviCRM_API3_Exception $e) {
        $crid = 0;
      }
    }
  }
  if ($crid) {
    $form->addElement('hidden', 'crid', $crid);
  }
}

/**
 * For a recurring contribution, find a reasonable candidate for a template, where possible.
 */
function _iats_civicrm_getContributionTemplate($contribution) {
  // Get the first contribution in this series that matches the same total_amount, if present.
  $template = array();
  $get = array('contribution_recur_id' => $contribution['contribution_recur_id'], 'options' => array('sort' => ' id', 'limit' => 1));
  if (!empty($contribution['total_amount'])) {
    $get['total_amount'] = $contribution['total_amount'];
  }
  $result = civicrm_api3('contribution', 'get', $get);
  if (!empty($result['values'])) {
    $contribution_ids = array_keys($result['values']);
    $template = $result['values'][$contribution_ids[0]];
    $template['original_contribution_id'] = $contribution_ids[0];
    $template['line_items'] = array();
    $get = array('entity_table' => 'civicrm_contribution', 'entity_id' => $contribution_ids[0]);
    $result = civicrm_api3('LineItem', 'get', $get);
    if (!empty($result['values'])) {
      foreach ($result['values'] as $initial_line_item) {
        $line_item = array();
        foreach (array('price_field_id', 'qty', 'line_total', 'unit_price', 'label', 'price_field_value_id', 'financial_type_id') as $key) {
          $line_item[$key] = $initial_line_item[$key];
        }
        $template['line_items'][] = $line_item;
      }
    }
  }
  return $template;
}

/**
 * Function _iats_contributionrecur_next.
 *
 * @param $from_time: a unix time stamp, the function returns values greater than this
 * @param $days: an array of allowable days of the month
 *
 *   A utility function to calculate the next available allowable day, starting from $from_time.
 *   Strategy: increment the from_time by one day until the day of the month matches one of my available days of the month.
 */
function _iats_contributionrecur_next($from_time, $allow_mdays) {
  $dp = getdate($from_time);
  // So I don't get into an infinite loop somehow.
  $i = 0;
  while (($i++ < 60) && !in_array($dp['mday'], $allow_mdays)) {
    $from_time += (24 * 60 * 60);
    $dp = getdate($from_time);
  }
  return $from_time;
}

/**
 * Function _iats_contribution_payment
 *
 * @param $contribution an array of a contribution to be created (or in case of future start date,
          possibly an existing pending contribution to recycle, if it already has a contribution id).
 * @param $options must include customer code, subtype and iats_domain, may include a membership id
 * @param $original_contribution_id if included, use as a template for a recurring contribution.
 *
 *   A high-level utility function for making a contribution payment from an existing recurring schedule
 *   Used in the Iatsrecurringcontributions.php job and the one-time ('card on file') form.
 *   
 *   Since 4.7.12, we are using the new repeattransaction api.
 */
function _iats_process_contribution_payment(&$contribution, $options, $original_contribution_id) {
  // By default, don't use repeattransaction
  $use_repeattransaction = FALSE;
  $is_recurrence = !empty($original_contribution_id);
  // First try and get the money with iATS Payments, using my cover function.
  // TODO: convert this into an api job?
  $result =  _iats_process_transaction($contribution, $options);

  // Handle any case of a failure of some kind, either the card failed, or the system failed.
  if (empty($result['status'])) {
    /* set the failed transaction status, or pending if I had a server issue */
    $contribution['contribution_status_id'] = empty($result['auth_result']) ? 2 : 4;
    /* and include the reason in the source field */
    $contribution['source'] .= ' ' . $result['reasonMessage'];
    // Save my reject code here for processing by the calling function (a bit lame)
    $contribution['iats_reject_code'] = $result['auth_result'];
  }
  else {
    // I have a transaction id.
    $trxn_id = $contribution['trxn_id'] = trim($result['remote_id']) . ':' . time();
    // Initialize the status to pending
    $contribution['contribution_status_id'] = 2;
    // We'll use the repeattransaction api for successful transactions under three conditions:
    // 1. if we want it
    // 2. if we don't already have a contribution id
    // 3. if we trust it
    $use_repeattransaction = $is_recurrence && empty($contribution['id']);
  }
  if ($use_repeattransaction) {
    // We processed it successflly and I can try to use repeattransaction. 
    // Requires the original contribution id.
    // Issues with this api call:
    // 1. Always triggers an email and doesn't include trxn.
    // 2. Date is wrong.
    try {
      // $status = $result['contribution_status_id'] == 1 ? 'Completed' : 'Pending';
      $contributionResult = civicrm_api3('Contribution', 'repeattransaction', array(
        'original_contribution_id' => $original_contribution_id,
        'contribution_status_id' => 'Pending',
        'is_email_receipt' => 0,
        // 'invoice_id' => $contribution['invoice_id'],
        ///'receive_date' => $contribution['receive_date'],
        // 'campaign_id' => $contribution['campaign_id'],
        // 'financial_type_id' => $contribution['financial_type_id'],.
        // 'payment_processor_id' => $contribution['payment_processor'],
        'contribution_recur_id' => $contribution['contribution_recur_id'],
      ));

      // watchdog('iats_civicrm','repeat transaction result <pre>@params</pre>',array('@params' => print_r($pending,TRUE)));.
      $contribution['id'] = CRM_Utils_Array::value('id', $contributionResult);
    }
    catch (Exception $e) {
      // Ignore this, though perhaps I should log it.
    }
    if (empty($contribution['id'])) {
      // Assume I failed completely and I'll fall back to doing it the manual way.
      $use_repeattransaction = FALSE;
    }
    else {
      // If repeattransaction succeded.
      // First restore/add various fields that the repeattransaction api may overwrite or ignore.
      // TODO - fix this in core to allow these to be set above.
      civicrm_api3('contribution', 'create', array('id' => $contribution['id'], 
        'invoice_id' => $contribution['invoice_id'],
        'source' => $contribution['source'],
        'receive_date' => $contribution['receive_date'],
        'payment_instrument_id' => $contribution['payment_instrument_id'],
        // '' => $contribution['receive_date'],
      ));
      // Save my status in the contribution array that was passed in.
      $contribution['contribution_status_id'] = $result['contribution_status_id'];
      if ($result['contribution_status_id'] == 1) {
        // My transaction completed, so record that fact in CiviCRM, potentially sending an invoice.
        try {
          civicrm_api3('Contribution', 'completetransaction', array(
            'id' => $contribution['id'],
            'payment_processor_id' => $contribution['payment_processor'],
            'is_email_receipt' => (empty($options['is_email_receipt']) ? 0 : 1),
            'trxn_id' => $contribution['trxn_id'],
            'receive_date' => $contribution['receive_date'],
          ));
        }
        catch (Exception $e) {
          // log the error and continue
          CRM_Core_Error::debug_var('Unexpected Exception', $e);
        }
      }
      else {
        // just save my trxn_id for ACH/EFT verification later
        try {
          civicrm_api3('Contribution', 'create', array(
            'id' => $contribution['id'],
            'trxn_id' => $contribution['trxn_id'],
          ));
        }
        catch (Exception $e) {
          // log the error and continue
          CRM_Core_Error::debug_var('Unexpected Exception', $e);
        }
      }
    }
  }
  if (!$use_repeattransaction) {
    /* If I'm not using repeattransaction for any reason, I'll create the contribution manually */
    // This code assumes that the contribution_status_id has been set properly above, either pending or failed.
    $contributionResult = civicrm_api3('contribution', 'create', $contribution);
    // Pass back the created id indirectly since I'm calling by reference.
    $contribution['id'] = CRM_Utils_Array::value('id', $contributionResult);
    // Connect to a membership if requested.
    if (!empty($options['membership_id'])) {
      try {
        civicrm_api3('MembershipPayment', 'create', array('contribution_id' => $contribution['id'], 'membership_id' => $options['membership_id']));
      }
      catch (Exception $e) {
        // Ignore.
      }
    }
    /* And then I'm done unless it completed */
    if ($result['contribution_status_id'] == 1 && !empty($result['status'])) {
      /* success, and the transaction has completed */
      $complete = array('id' => $contribution['id'], 
        'payment_processor_id' => $contribution['payment_processor'],
        'trxn_id' => $trxn_id, 
        'receive_date' => $contribution['receive_date']
      );
      $complete['is_email_receipt'] = empty($options['is_email_receipt']) ? 0 : 1;
      try {
        $contributionResult = civicrm_api3('contribution', 'completetransaction', $complete);
      }
      catch (Exception $e) {
        // Don't throw an exception here, or else I won't have updated my next contribution date for example.
        $contribution['source'] .= ' [with unexpected api.completetransaction error: ' . $e->getMessage() . ']';
      }
      // Restore my source field that ipn code irritatingly overwrites, and make sure that the trxn_id is set also.
      civicrm_api3('contribution', 'setvalue', array('id' => $contribution['id'], 'value' => $contribution['source'], 'field' => 'source'));
      civicrm_api3('contribution', 'setvalue', array('id' => $contribution['id'], 'value' => $trxn_id, 'field' => 'trxn_id'));
      $message = $is_recurrence ? ts('Successfully processed contribution in recurring series id %1: ', array(1 => $contribution['contribution_recur_id'])) : ts('Successfully processed one-time contribution: ');
      return $message . $result['auth_result'];
    }
  }
  // Now return the appropriate message. 
  if (empty($result['status'])) {
    return ts('Failed to process recurring contribution id %1: ', array(1 => $contribution['contribution_recur_id'])) . $result['reasonMessage'];
  }
  elseif ($result['contribution_status_id'] == 1) {
    return ts('Successfully processed recurring contribution in series id %1: ', array(1 => $contribution['contribution_recur_id'])) . $result['auth_result'];
  }
  else {
    // I'm using ACH/EFT or a processor that doesn't complete.
    return ts('Successfully processed pending recurring contribution in series id %1: ', array(1 => $contribution['contribution_recur_id'])) . $result['auth_result'];
  }
}

/**
 * Function _iats_process_transaction.
 *
 * @param $contribution an array of properties of a contribution to be processed
 * @param $options must include customer code, subtype and iats_domain
 *
 *   A low-level utility function for triggering a transaction on iATS.
 */
function _iats_process_transaction($contribution, $options) {
  switch ($options['subtype']) {
    case 'ACHEFT':
      $method = 'acheft_with_customer_code';
      // Will not complete.
      $contribution_status_id = 2;
      break;

    default:
      $method = 'cc_with_customer_code';
      $contribution_status_id = 1;
      break;
  }
  $credentials = CRM_Iats_iATSServiceRequest::credentials($contribution['payment_processor'], $contribution['is_test']);
  $iats_service_params = array('method' => $method, 'type' => 'process', 'iats_domain' => $credentials['domain']);
  $iats = new CRM_Iats_iATSServiceRequest($iats_service_params);
  // Build the request array.
  $request = array(
    'customerCode' => $options['customer_code'],
    'invoiceNum' => $contribution['invoice_id'],
    'total' => $contribution['total_amount'],
  );
  $request['customerIPAddress'] = (function_exists('ip_address') ? ip_address() : $_SERVER['REMOTE_ADDR']);
  // remove the customerIPAddress if it's the internal loopback to prevent
  // being locked out due to velocity checks
  if ('127.0.0.1' == $request['customerIPAddress']) {
     $request['customerIPAddress'] = '';
  }

  // Make the soap request.
  $response = $iats->request($credentials, $request);
  // Process the soap response into a readable result.
  $result = $iats->result($response);
  // pass back the anticipated status_id based on the method (i.e. 1 for CC, 2 for ACH/EFT)
  $result['contribution_status_id'] = $contribution_status_id;
  return $result;
}

/**
 * Function _iats_get_future_start_dates
 *
 * @param $start_date a timestamp, only return dates after this.
 * @param $allow_days an array of allowable days of the month.
 *
 *   A low-level utility function for triggering a transaction on iATS.
 */
function _iats_get_future_monthly_start_dates($start_date, $allow_days) {
  // Future date options.
  $start_dates = array();
  // special handling for today - it means immediately or now.
  $today = date('Ymd').'030000';
  // If not set, only allow for the first 28 days of the month.
  if (max($allow_days) <= 0) {
    $allow_days = range(1,28);
  }
  for ($j = 0; $j < count($allow_days); $j++) {
    // So I don't get into an infinite loop somehow ..
    $i = 0;
    $dp = getdate($start_date);
    while (($i++ < 60) && !in_array($dp['mday'], $allow_days)) {
      $start_date += (24 * 60 * 60);
      $dp = getdate($start_date);
    }
    $key = date('Ymd', $start_date).'030000';
    if ($key == $today) { // special handling
      $display = ts('Now');
      $key = ''; // date('YmdHis');
    }
    else {
      $display = strftime('%B %e, %Y', $start_date);
    }
    $start_dates[$key] = $display;
    $start_date += (24 * 60 * 60);
  }
  return $start_dates;
}
