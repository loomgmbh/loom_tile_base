<?php

namespace Drupal\loom_tile_base\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Tile entities.
 */
class TileViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.

    return $data;
  }

}
