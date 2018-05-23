<?php
namespace Grav\Plugin;

use Grav\Common\Page\Page;
use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class SimpleResponsiveTablesPlugin
 * @package Grav\Plugin
 */
class SimpleResponsiveTablesPlugin extends Plugin
{

  /**
   * @return array
   *
   * The getSubscribedEvents() gives the core a list of events
   *     that the plugin wants to listen to. The key of each
   *     array section is the event that the plugin listens to
   *     and the value (in the form of an array) contains the
   *     callable (or function) as well as the priority. The
   *     higher the number the higher the priority.
   */
  public static function getSubscribedEvents()
  {
    return [
      'onPluginsInitialized' => ['onPluginsInitialized', 0]
    ];
  }

  /**
   * Initialize the plugin
   */
  public function onPluginsInitialized()
  {
    // Don't proceed if we are in the admin plugin
    if ($this->isAdmin()) {
        return;
    }

    // Enable the main event we are interested in
    $this->enable([
        'onPageContentProcessed' => ['onPageContentProcessed', 0],
        'onTwigSiteVariables' => ['onTwigSiteVariables', 0]
    ]);
  }

  /**
   * Process shortcodes after Grav's processing, but before caching
   * Find tables in page content and wrap it with two divs
   * @param Event $event
   * @return void
   */
  public function onPageContentProcessed(Event $event)
  {
    /** @var Page $page */
    $page = $event['page'];
    $config = $this->mergeConfig($page);

    $this->active = $config->get('active', $config->get('process'));

    // if the plugin is not active (either global or on page) exit
    if (!$this->active) {
        return;
    }

    $raw_content = $page->content();

    // add opening div tag with corresponding class for styling
    $raw_content = preg_replace("/<table[^>]*>/", "<div class='simple-responsive-table'><div>$0", $raw_content);
    // add closing div tag after table
    $raw_content = preg_replace("/<\/table>/", "$0</div></div>", $raw_content);

    $page->setRawContent($raw_content);
  }


  /**
  * Set needed variables to make the responsive tables work.
  */
  public function onTwigSiteVariables()
  {
    if($this->active) {
      $this->grav['assets']->add('plugin://simple-responsive-tables/assets/css/simple-responsive-tables.css');
      $this->grav['assets']->add('plugin://simple-responsive-tables/assets/js/simple-responsive-tables.js');
    }
  }
}
