<?php
namespace Grav\Theme;

use Grav\Common\Page\Page;
use Grav\Common\Theme;

class Commerce extends Theme
{

  public static function getSubscribedEvents()
  {
    return [
      'onThemeInitialized' => ['onThemeInitialized', 0]
    ];
  }

  public function onThemeInitialized()
  {
    if ($this->isAdmin()) {
      $this->active = false;
      return;
    }

    $this->enable([
      'onPageInitialized' => ['onPageInitialized', 0]
    ]);
  }

  /**
   * Add content after page content was read into the system.
   *
   */
  public function onPageInitialized()
  {
    /** @var \Grav\Common\Page\Page $page */
    $page = $this->grav['page'];
    $config = $this->mergeConfig($page);
    $metadata = $page->metadata();
    $summary = trim(strip_tags($page->summary(null, true)));

    $metadata_values = [
      'description' => $summary,
      'og:sitename' => $config->get('site.title'),
      'og:title' => $page->title(),
      'og:description' => $summary,
      'twitter:card' => 'summary',
      'twitter:title' => $page->title(),
      'twitter:description' => $summary,
      'twitter:site' => '@drupalcommerce',
      'twitter:label1' => 'Filed under',
      'twitter:data1' => $page->parent()->title(),
    ];
    foreach ($metadata_values as $property => $value) {
      $metadata[$property]['name'] = $property;
      $metadata[$property]['property'] = $property;
      $metadata[$property]['content'] = $value;
    }

    $page->metadata($metadata);
  }
}
