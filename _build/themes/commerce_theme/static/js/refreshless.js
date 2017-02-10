(function ($) {
  var $rstContent, $docNav;
  $(document).ready(function () {
    $rstContent = $(document).find('.rst-content');
    $docNav = $(document).find('.wy-menu.wy-menu-vertical');
    $(document)
      .on('click', ".wy-menu-vertical .current ul li a", function (e) {
        e.preventDefault();
        var target = $(this);
        console.log(target.prop('href'));
        $.get(target.prop('href'), function (d) {
          history.pushState({ path: target.attr('href') }, '', target.prop('href'))
          var html = $.parseHTML(d);
          var newRstContent = $(html).find('.rst-content');
          var newDocNav = $(html).find('.wy-menu.wy-menu-vertical');
          $rstContent.html(newRstContent);
          $docNav.html(newDocNav);
        });

        return true;
      });
    $(window).bind('popstate', function () {
      $.get(location.href, function (d) {
        var html = $.parseHTML(d);
        var newRstContent = $(html).find('.rst-content');
        var newDocNav = $(html).find('.wy-menu.wy-menu-vertical');
        $rstContent.html(newRstContent);
        $docNav.html(newDocNav);
      });
    });
  });
})(jQuery);
