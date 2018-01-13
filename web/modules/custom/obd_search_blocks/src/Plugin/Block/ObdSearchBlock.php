<?php
/**
 * @file
 * Contains \Drupal\obd_search\Plugin\Block\SearchFormBlock.
 */
namespace Drupal\obd_search_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormInterface;

/**
 * Provides a 'Search Block Form' block.
 *
 * @Block(
 *   id = "obd_search_form_block",
 *   admin_label = @Translation("Search Form Block"),
 * )
 */
class ObdSearchBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\obd_search_blocks\Form\ObdSearchForm');
    return $form;
  }
}
