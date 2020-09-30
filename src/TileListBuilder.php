<?php

namespace Drupal\loom_tile_base;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;
use Drupal\loom_tile_base\Entity\Tile;

/**
 * Defines a class to build a listing of Tile entities.
 *
 * @ingroup loom_tile_base
 */
class TileListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('ID');
    $header['name'] = $this->t('Name');
    $header['bundle'] = $this->t('Bundle');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var Tile $entity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.tile.edit_form',
      ['tile' => $entity->id()]
    );
    $row['bundle'] = $entity->getBundleType()->toLink($entity->bundleName(), 'edit-form');
    return $row + parent::buildRow($entity);
  }

}
