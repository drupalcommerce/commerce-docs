(function ($) {
  $(document).ready(function () {
    // Set up javascript UX bits
    $(document)
        // Shift nav in mobile when clicking the menu.
        .on('click', "[data-toggle='wy-nav-top']", function() {
            $("[data-toggle='wy-nav-shift']").toggleClass("shift");
            $("[data-toggle='rst-versions']").toggleClass("shift");
        })
        .on('click', "[data-toggle='rst-current-version']", function() {
            $("[data-toggle='rst-versions']").toggleClass("shift-up");
        });
        // Make tables responsive
        $("table.docutils:not(.field-list)")
            .wrap("<div class='wy-table-responsive'></div>");
  });
})(jQuery);
