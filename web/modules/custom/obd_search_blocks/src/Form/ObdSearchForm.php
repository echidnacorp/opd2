<?php
/**
 * @file
 * Contains \Drupal\obd_search_blocks\Form\ObdSearchForm.
 */
namespace Drupal\obd_search_blocks\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ObdSearchForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'obd_search_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['keywords'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Search'),
      '#size' => 60,
      '#maxlength' => 60,
      '#attributes' => array('placeholder' => $this->t('Search Open Portal')),
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type'   => 'submit',
      '#value'  => $this->t('Search'),
      '#name'   => 'Search',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $values = $form_state->getValues();
    if ($language == 'en') {
      $path = 'view.search_view_english.search';
    }
    else {
      $path = 'view.search_view_french.french_page';
    }
    if (isset($values['keywords']) && !empty(trim($values['keywords']))) {
      $url = $this->url($path, array(), array('query' => array('search_api_fulltext' => $values['keywords'])));
      $response = new RedirectResponse($url);
    }
    else {
      $url = $this->url($path);
      $response = new RedirectResponse($url);
    }
    $response->send();
  }

}
