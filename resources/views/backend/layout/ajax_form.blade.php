<script>
    function ajaxSubmit(e, form, idToLoad) {

        if(form.valid()) {
            e.preventDefault();
            var action = form.attr('action');
            (form.attr('class') === 'ajaxDeleteForm') ? $('#alert-modal').modal('toggle') : $('#right-modal').modal('toggle');

            $.ajax({
                type: "POST",
                url: action,
                data: form.serializeArray(), // serializes the form's elements.
                success: function(response)
                {
                    (response.status === true) ? toastr.success(response.notification) : toastr.error(response.notification);
                    $("#"+idToLoad).html(response.view);
                }
            });
        }else {
            toastr.error('Please make sure to fill all the necessary fields');
        }
    }
</script>
