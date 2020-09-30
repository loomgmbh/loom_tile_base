<?php

namespace Drupal\loom_tile_base\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Tile type entity.
 *
 * @ConfigEntityType(
 *   id = "tile_type",
 *   label = @Translation("Tile type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\loom_tile_base\TileTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\loom_tile_base\Form\TileTypeForm",
 *       "edit" = "Drupal\loom_tile_base\Form\TileTypeForm",
 *       "delete" = "Drupal\loom_tile_base\Form\TileTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\loom_tile_base\TileTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "tile_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "tile",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/tile_type/{tile_type}",
 *     "add-form" = "/admin/structure/tile_type/add",
 *     "edit-form" = "/admin/structure/tile_type/{tile_type}/edit",
 *     "delete-form" = "/admin/structure/tile_type/{tile_type}/delete",
 *     "collection" = "/admin/structure/tile_type"
 *   }
 * )
 */
class TileType extends ConfigEntityBundleBase implements TileTypeInterface {

  /**
   * The Tile type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Tile type label.
   *
   * @var string
   */
  protected $label;

}
