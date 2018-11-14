<script>
    function ajaxSubmit(e, form, idToLoad) {
        e.preventDefault();
        var action = form.attr('action');
        console.log(form.serializeArray());
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
    }
</script>
