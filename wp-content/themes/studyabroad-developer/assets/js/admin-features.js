/**
 * About Features Admin JavaScript
 */

(function ($) {
  "use strict";

  $(document).ready(function () {
    var $featuresList = $("#features-list");
    var featureTemplate = $("#feature-template").html();

    // Initialize sortable
    $featuresList.sortable({
      handle: ".feature-handle",
      placeholder: "feature-item ui-sortable-placeholder",
      opacity: 0.8,
      cursor: "move",
      axis: "y",
      containment: "parent",
    });

    // Add new feature
    $("#add-feature").on("click", function () {
      var $newItem = $(featureTemplate);
      $newItem.addClass("new-item");
      $featuresList.append($newItem);

      // Focus on the new input
      $newItem.find(".feature-input").focus();

      // Remove animation class after animation completes
      setTimeout(function () {
        $newItem.removeClass("new-item");
      }, 300);

      // Refresh sortable
      $featuresList.sortable("refresh");
    });

    // Remove feature
    $featuresList.on("click", ".remove-feature", function () {
      var $item = $(this).closest(".feature-item");

      // Confirm if there's content
      var featureText = $item.find(".feature-input").val();
      if (
        featureText &&
        !confirm("Are you sure you want to remove this feature?")
      ) {
        return;
      }

      // Animate and remove
      $item.fadeOut(200, function () {
        $(this).remove();
      });
    });

    // Prevent form submission on Enter key (add new feature instead)
    $featuresList.on("keypress", ".feature-input", function (e) {
      if (e.which === 13) {
        e.preventDefault();
        $("#add-feature").click();
      }
    });
  });
})(jQuery);
