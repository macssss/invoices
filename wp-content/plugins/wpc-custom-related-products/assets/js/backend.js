'use strict';

var woocr_timeout = null;

(function($) {
  $(document).ready(function() {
    // hide search result box by default
    $('#woocr_results').hide();
    $('#woocr_loading').hide();

    // arrange
    woocr_arrange();
  });

  // search input
  $(document).on('keyup', '#woocr_keyword', function() {
    if ($('#woocr_keyword').val() != '') {
      $('#woocr_loading').show();

      if (woocr_timeout != null) {
        clearTimeout(woocr_timeout);
      }

      woocr_timeout = setTimeout(woocr_ajax_get_data, 300);
      return false;
    }
  });

  // actions on search result items
  $(document).on('click', '#woocr_results li', function() {
    $(this).find('input').attr('name', 'woocr_ids[]');
    $('#woocr_selected ul').append($(this));
    $('#woocr_results').hide();
    $('#woocr_keyword').val('');
    woocr_arrange();
    return false;
  });

  // actions on selected items
  $(document).on('click', '#woocr_selected span.remove', function() {
    $(this).parent().remove();
    return false;
  });

  // hide search result box if click outside
  $(document).on('click', function(e) {
    if ($(e.target).closest($('#woocr_results')).length == 0) {
      $('#woocr_results').hide();
    }
  });

  function woocr_arrange() {
    $('#woocr_selected li').arrangeable({
      dragSelector: '.move',
    });
  }

  function woocr_ajax_get_data() {
    // ajax search product
    var ids = [];

    $('input[name="woocr_ids[]"]').each(function() {
      ids.push($(this).val());
    });

    woocr_timeout = null;

    var data = {
      action: 'woocr_get_search_results',
      keyword: $('#woocr_keyword').val(),
      ids: ids,
    };

    $.post(ajaxurl, data, function(response) {
      $('#woocr_results').show();
      $('#woocr_results').html(response);
      $('#woocr_loading').hide();
    });
  }
})(jQuery);