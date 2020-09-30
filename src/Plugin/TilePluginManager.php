<?php

namespace Drupal\loom_tile_base\Plugin;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Tile plugin plugin manager.
 */
class TilePluginManager extends DefaultPluginManager {

  /**
   * Constructs a new TilePluginManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/TilePlugin', $namespaces, $module_handler, 'Drupal\loom_tile_base\Plugin\TilePluginInterface', 'Drupal\loom_tile_base\Annotation\TilePlugin');

    $this->alterInfo('loom_tile_base_tile_plugin_info');
    $this->setCacheBackend($cache_backend, 'loom_tile_base_tile_plugin_plugins');
  }

}
