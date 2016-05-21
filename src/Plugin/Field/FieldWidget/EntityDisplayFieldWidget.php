<?php /**
 * @file
 * Contains \Drupal\entity_display_field\Plugin\Field\FieldWidget\EntityDisplayFieldWidget.
 */

namespace Drupal\entity_display_field\Plugin\Field\FieldWidget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\Component\Utility\String;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'entity_display_field' widget.
 *
 * @FieldWidget(
 *   id = "entity_display_field_select",
 *   module = "entity_display_field",
 *   label = @Translation("Entity Display Select"),
 *   field_types = {"entity_display_field_display"}
 * )
 */
class EntityDisplayFieldWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';

    $view_modes = \Drupal::entityManager()->getViewModeOptionsByBundle($items->getFieldDefinition()->getTargetEntityTypeId(), $items->getFieldDefinition()->getTargetBundle());

    $element = array(
      '#type' => 'select',
      '#options' => $view_modes,
      '#default_value' => $value,
      '#multiple' => FALSE,
    );

    return array('value' => $element);
  }

  public function validate($element, FormStateInterface $form_state) {
    $value = $element['#value'];
    $form_state->setValueForElement($element, $value);
  }
}