jQuery(document).on('submit', "#notes-form", function (event) {jQuery.pjax.submit(event, '#notes', {"push":true, "timeout":1000});});