<?php

namespace Drupal\loom_tile_base\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Tile entities.
 *
 * @ingroup loom_tile_base
 */
interface TileInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  /**
   * Gets the Tile name.
   *
   * @return string
   *   Name of the Tile.
   */
  public function getName();

  /**
   * Sets the Tile name.
   *
   * @param string $name
   *   The Tile name.
   *
   * @return TileInterface
   *   The called Tile entity.
   */
  public function setName($name);

  /**
   * Gets the Tile creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Tile.
   */
  public function getCreatedTime();

  /**
   * Sets the Tile creation timestamp.
   *
   * @param int $timestamp
   *   The Tile creation timestamp.
   *
   * @return TileInterface
   *   The called Tile entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Tile published status indicator.
   *
   * Unpublished Tile are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Tile is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Tile.
   *
   * @param bool $published
   *   TRUE to set this Tile to published, FALSE to set it to unpublished.
   *
   * @return TileInterface
   *   The called Tile entity.
   */
  public function setPublished($published);

  /**
   * Gets the Tile revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Tile revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return TileInterface
   *   The called Tile entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Tile revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Tile revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return TileInterface
   *   The called Tile entity.
   */
  public function setRevisionUserId($uid);

  // additional methods

  /**
   * @return TileTypeInterface
   */
  public function getBundleType();

  /**
   * @return string
   */
  public function bundleName();

}
