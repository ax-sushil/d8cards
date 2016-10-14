<?php
/**
 * @file
 * Contains \Drupal\myconfig_form\Form\myconfig_formConfigForm.
 */

namespace Drupal\myconfig_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
//use Drupal\Component\Utility\UrlHelper;

/**
 * myconfig_form Config form.
 */
class MyModuleConfigForm extends FormBase  {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'myconfig_form_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = \Drupal::config('myconfig_form.configs');
    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Text field'),
      '#required' => TRUE,
      '#default_value' => !empty($config->get('title')) ? $config->get('title'): '',
    );
    $form['checkboxes'] = array(
      '#type' => 'checkboxes',
      '#title' => t('Checkboxes'),
      '#options' => array(
        '1' => $this->t('Option 1'),
        '2' => $this->t('Option 2')
      ),
      '#default_value' => $config->get('checkboxes'),
    );
    $form['radios'] = array(
      '#type' => 'radios',
      '#title' => t('Radio Buttons'),
      '#options' => array(
        'a' => $this->t('Option a'),
        'b' => $this->t('Option b'),
      ),
      '#default_value' => $config->get('radios'),
    );
    $form['textarea'] = array(
      '#type' => 'textarea',
      '#title' => t('Textarea'),
      '#default_value' => $config->get('textarea'),
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
//  public function validateForm (array &$form, FormStateInterface $form_state) {
//  }


  /**
   * {@inheritdoc}
   */
  public function submitForm (array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      $config = \Drupal::service('config.factory');
      $config->getEditable('myconfig_form.configs')
        ->set($key, $value)
        ->save();
    }
  }
}