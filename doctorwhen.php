<?php

require_once 'doctorwhen.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function doctorwhen_civicrm_config(&$config) {
  _doctorwhen_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function doctorwhen_civicrm_install() {
  _doctorwhen_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function doctorwhen_civicrm_enable() {
  _doctorwhen_civix_civicrm_enable();
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *

 // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 */
function doctorwhen_civicrm_navigationMenu(&$menu) {
  _doctorwhen_civix_insert_navigation_menu($menu, 'Administer', array(
    'label' => ts('Doctor When', array('domain' => 'org.civicrm.doctorwhen')),
    'name' => 'doctor_when',
    'url' => 'civicrm/doctorwhen?reset=1',
    'permission' => 'administer CiviCRM',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _doctorwhen_civix_navigationMenu($menu);
} // */
