;
(function($) {
    elementor.hooks.addAction("panel/open_editor/widget/plugspriceone", function(panel, model, view) {
        $("input:hidden[value='pl_select_hidden']").parents('.elementor-control').prev().find('select').on('change', function() {
            if ('solid' == $(this).val()) {
                $("input:hidden[value='pl_hidden_icon']").parents(".elementor-control").prev().show();
            } else {
                $("input:hidden[value='pl_hidden_icon']").parents(".elementor-control").prev().hide();
            }
        })
    });
})(jQuery);