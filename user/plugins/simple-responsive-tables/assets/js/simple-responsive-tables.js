(function() {
  // initial preparing of all tables on page load
  window.addEventListener("load", prepareTables, false);

  // preparing all tables if window is resized, using a "throttler", to
  // minimize function calls
  // https://developer.mozilla.org/en-US/docs/Web/Events/resize#Example)
  window.addEventListener("resize", resizeThrottler, false);

  var resizeTimeout;
  function resizeThrottler() {
    // ignore resize events as long as an actualResizeHandler execution is in the queue
    if (!resizeTimeout) {
      resizeTimeout = setTimeout(function() {
        resizeTimeout = null;
        resizeHandler();
      }, 66);
    }
  }

  var scrollTimeout;
  function scrollThrottler(table, wrapper) {
    // ignore resize events as long as an actualResizeHandler execution is in the queue
    if (!scrollTimeout) {
      scrollTimeout = setTimeout(function() {
        scrollTimeout = null;
        scrollHandler(table, wrapper);
      }, 66);
    }
  }

  function prepareTables() {
    [].forEach.call(
      document.querySelectorAll("table"),
      function(table) {
        var wrapper = table.parentNode.parentNode;
        var innerWrapper = table.parentNode;

        // If table is wider than viewport, show the scroll indicator
        if (table.offsetWidth > wrapper.offsetWidth) {
          if (!hasClass(wrapper, "is-scrollable-right"))
            addClass(wrapper, "is-scrollable-right");
        }

        // add scroll handler to check which scroll indicators need to be displayed
        table.parentNode.addEventListener(
          "scroll",
          function() {
            scrollThrottler(table, wrapper);
          },
          false
        );
      },
      false
    );
  }

  function resizeHandler(table, wrapper) {
    [].forEach.call(
      document.querySelectorAll("table"),
      function(table) {
        var wrapper = table.parentNode.parentNode;

        // If table is wider than viewport, show the scroll indicator
        if (table.offsetWidth > wrapper.offsetWidth) {
          if (!hasClass(wrapper, "is-scrollable-right"))
            addClass(wrapper, "is-scrollable-right");
        } else {
          if (hasClass(wrapper, "is-scrollable-right"))
            removeClass(wrapper, "is-scrollable-right");
        }
      },
      false
    );
  }

  function scrollHandler(table, wrapper) {
    last_scroll_position = table.parentNode.scrollLeft;
    var max_scroll_position = table.offsetWidth - wrapper.offsetWidth;

    if (last_scroll_position > 0) {
      if (!hasClass(wrapper, "is-scrollable-left"))
        addClass(wrapper, "is-scrollable-left");
    } else {
      if (hasClass(wrapper, "is-scrollable-left"))
        removeClass(wrapper, "is-scrollable-left");
    }

    if (last_scroll_position >= max_scroll_position) {
      if (hasClass(wrapper, "is-scrollable-right"))
        removeClass(wrapper, "is-scrollable-right");
    } else {
      if (!hasClass(wrapper, "is-scrollable-right"))
        addClass(wrapper, "is-scrollable-right");
    }
  }

  // Helper functions for class manipulation, as found on plainjs.com
  function hasClass(el, className) {
    return el.classList
      ? el.classList.contains(className)
      : new RegExp("\\b" + className + "\\b").test(el.className);
  }

  function addClass(el, className) {
    if (el.classList) el.classList.add(className);
    else if (!hasClass(el, className)) el.className += " " + className;
  }

  function removeClass(el, className) {
    if (el.classList) el.classList.remove(className);
    else
      el.className = el.className.replace(
        new RegExp("\\b" + className + "\\b", "g"),
        ""
      );
  }
})();
