<?php

namespace Drupal\my_image_resizer_module\Plugin\ImageEffect;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Image\EffectBase;
use Drupal\Core\Image\ImageInterface;

/**
 * Defines a custom image effect plugin for resizing images.
 *
 * @ImageEffect(
 *   id = "my_image_resizer",
 *   label = @Translation("My Image Resizer"),
 *   description = @Translation("Resizes images based on configured width and height."),
 * )
 */
class MyImageResizer extends EffectBase {

  /**
   * {@inheritdoc}
   */
  public function applyEffect(ImageInterface $image) {
    $config = $this->getConfiguration();
    $width = $config['width'];
    $height = $config['height'];

    // Replace with your logic to resize the image using Drupal's image manipulation API
    if ($width && $height) {
      $image->resize($width, $height);
    }

    return $image;
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultConfiguration() {
    return [
      'width' => null,
      'height' => null,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getSummary() {
    $config = $this->getConfiguration();
    $width = $config['width'];
    $height = $config['height'];

    $summary = [];
    if ($width) {
      $summary[] = $this->t('Width: @width pixels', ['@width' => $width]);
    }
    if ($height) {
      $summary[] = $this->t('Height: @height pixels', ['@height' => $height]);
    }

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSupportedEntityTypes() {
    return [EntityTypeInterface::ID]; // Replace with specific entity type if needed
  }
}
