<?php
/**
 * @file
 * Contains \Drupal\myconfig_form\Controller\myconfig_formController
 */

namespace Drupal\myconfig_form\Controller;

use Drupal\Core\Controller\ControllerBase;

Class MyModuleController extends ControllerBase {
  /**
   * Returns a  simple page
   *
   * @return array
   */
  public function myConfig() {
    $config = \Drupal::config('myconfig_form.settings');
    $message = $config->get('message');
    $element = array(
      '#markup' => "<h1>$message</h1>",
    );
    return $element;
  }

}

