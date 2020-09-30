<?php

namespace Drupal\loom_tile_base\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Tile plugin item annotation object.
 *
 * @see \Drupal\loom_tile_base\Plugin\TilePluginManager
 * @see plugin_api
 *
 * @Annotation
 */
class TilePlugin extends Plugin {


  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
