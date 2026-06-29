(function($) {
  'use strict';
  if ($("#begin_ofert").length) {
    $('#begin_ofert').datetimepicker({
      format: 'DD.MM.YYYY H:m:s'
    });
  }

  if ($("#delivery").length) {
    $('#delivery').datetimepicker({
      format: 'DD.MM.YYYY H:m:s'
    });
  }

  if ($("#end_date").length) {
    $('#end_date').datetimepicker({
      format: 'DD.MM.YYYY H:m:s'
    });
  }

})(jQuery);