<script>
    function ajaxSubmit(e, form, idToLoad) {

        if(form.valid()) {
            e.preventDefault();

            console.log(form.serializeArray());
            var action = form.attr('action');
            (form.attr('class') === 'ajaxDeleteForm') ? $('#alert-modal').modal('toggle') : $('#right-modal').modal('hide');

            $.ajax({
                type: "POST",
                url: action,
                data: form.serializeArray(), // serializes the form's elements.
                success: function(response)
                {
                    (response.status === true) ? toastr.success(response.notification) : toastr.error(response.notification);
                    if(response.view !== ""){
                        $("#"+idToLoad).html(response.view);
                    }
                    form.trigger("reset");
                }
            });
        }else {
            toastr.error('Please make sure to fill all the necessary fields');
        }
    }
</script>
