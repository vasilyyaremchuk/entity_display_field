<?php

/**
 * @file
 * Contains Drupal\entity_display_field\Plugin\Field\FieldType\DisplayItem.
 */

namespace Drupal\entity_display_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'entity_display_field_display' field type.
 *
 * @FieldType(
 *   id = "entity_display_field_display",
 *   label = @Translation("Entity Display Field Display"),
 *   module = "entity_display_field",
 *   description = @Translation("Provide an ability to set display type for each separate entity."),
 *   default_widget = "entity_display_field_select",
 *   default_formatter = "entity_display_field_formatter",
 * )
 */
class DisplayItem extends FieldItemBase {
  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return array(
      'columns' => array(
        'value' => array(
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ),
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('View Mode'));

    return $properties;
  }
}
