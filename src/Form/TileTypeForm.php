<?php

namespace Drupal\loom_tile_base\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class TileTypeForm.
 */
class TileTypeForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $tile_type = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $tile_type->label(),
      '#description' => $this->t("Label for the Tile type."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $tile_type->id(),
      '#machine_name' => [
        'exists' => '\Drupal\loom_tile_base\Entity\TileType::load',
      ],
      '#disabled' => !$tile_type->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $tile_type = $this->entity;
    $status = $tile_type->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Tile type.', [
          '%label' => $tile_type->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Tile type.', [
          '%label' => $tile_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($tile_type->toUrl('collection'));
  }

}
