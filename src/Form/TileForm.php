<?php

namespace Drupal\loom_tile_base\Form;

use Drupal;
use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Tile edit forms.
 *
 * @ingroup loom_tile_base
 */
class TileForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\loom_tile_base\Entity\Tile */
    $form = parent::buildForm($form, $form_state);

    $form['revision_log_message']['#group'] = 'revision';

    if (!$this->entity->isNew()) {
      $form['new_revision'] = [
        '#type' => 'checkbox',
        '#title' => $this->t('Create new revision'),
        '#default_value' => FALSE,
        '#weight' => 10,
        '#group' => 'revision',
      ];
    }

    $form['sidebar'] = [
      '#type' => 'vertical_tabs',
      '#weight' => 99,
      '#attributes' => ['class' => ['entity-meta']],
    ];

    $form['authors'] = [
      '#type' => 'details',
      '#title' => t('Authoring information'),
      '#group' => 'sidebar',
      '#weight' => 90,
      '#optional' => TRUE,
    ];

    $form['status']['#group'] = 'authors';

    $form['revision'] = [
      '#type' => 'details',
      '#title' => t('Revision'),
      '#group' => 'sidebar',
      '#weight' => 90,
      '#optional' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    // Save as a new revision if requested to do so.
    if (!$form_state->isValueEmpty('new_revision') && $form_state->getValue('new_revision') != FALSE) {
      $this->entity->setNewRevision();

      // If a new revision is created, save the current user as revision author.
      $this->entity->setRevisionCreationTime(Drupal::time()->getRequestTime());
      $this->entity->setRevisionUserId(Drupal::currentUser()->id());
    } else {
      $this->entity->setNewRevision(FALSE);
    }

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        Drupal::messenger()->addStatus($this->t('Created the %label Tile.', [
          '%label' => $this->entity->label(),
        ]));
        break;

      default:
        Drupal::messenger()->addStatus($this->t('Saved the %label Tile.', [
          '%label' => $this->entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.tile.canonical', ['tile' => $this->entity->id()]);
  }

}
