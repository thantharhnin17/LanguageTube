
  // Pricing add
  $('#item-add tr.list-item').first().find('.delete').prop('disabled', true);
    function newMenuItem() {
      var newElem = $('#item-add tr.list-item').first().clone();
      newElem.find('input').val('');
      newElem.appendTo('table#item-add');
    }
    if ($("table#item-add").is('*')) {
      $('.add-item').on('click', function (e) {
        e.preventDefault();
        newMenuItem();
      });
      $(document).on("click", "#item-add .delete", function (e) {
        e.preventDefault();
        $(this).parent().parent().parent().parent().remove();
      });
    }