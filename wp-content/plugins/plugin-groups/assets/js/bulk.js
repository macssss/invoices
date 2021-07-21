jQuery(function ($) {

    var name_input = $('<input type="text" name="new_group">');
    $(document).on('change init', '#bulk-action-selector-top,#bulk-action-selector-bottom', function () {
        var select = $(this),
            action = select.val();

        if (action === '_add_to_new_group') {
            name_input.insertAfter(select).focus();
        } else {
            name_input.detach();
        }
        if (action === '_remove_group') {
            $('#cb-select-all-1,#cb-select-all-2, input[name="checked[]"]').prop('checked', true ).trigger('change click');
        }

    });

    $(document).ready(function () {
        $('#bulk-action-selector-top,#bulk-action-selector-bottom').trigger('init');
        //$('.subsubsub').after('<div class="plugin-group-settings">wooo</div>');
        //$('.subsubsub a.current').addClass('edit');

    });

});