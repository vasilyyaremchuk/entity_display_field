<?php /**
 * @file
 * Contains \Drupal\entity_display_field\Plugin\Field\FieldFormatter\EntityDisplayFieldFormatter.
 */

namespace Drupal\entity_display_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\AllowedTagsXssTrait;
use Drupal\Core\Field\FieldFilteredMarkup;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * @FieldFormatter(
 *  id = "entity_display_field_default",
 *  label = @Translation("Default"),
 *  field_types = {"entity_display_field"}
 * )
 */
/**
 * Plugin implementation of the entity_display_field formatter.
 *
 * @FieldFormatter(
 *   id = "entity_display_field_formatter",
 *   module = "entity_display_field",
 *   label = @Translation("Entity Display Field formatter"),
 *   field_types = {"entity_display_field"}
 * )
 */
class EntityDisplayFieldFormatter extends FormatterBase {

  use AllowedTagsXssTrait;

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();

    foreach ($items as $delta => $item) {
      $elements[$delta] = array(
        '#markup' => $item->value,
        '#allowed_tags' => FieldFilteredMarkup::allowedTags(),
      );
    }

    return $elements;
  }

}
