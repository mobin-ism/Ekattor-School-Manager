<script type="text/javascript">
    function showAjaxModal(url)
    {
    // SHOWING AJAX PRELOADER IMAGE
    //jQuery('#right-modal .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" style="height:25px;" /></div>');

    // LOADING THE AJAX MODAL
    jQuery('#right-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
      url: url,
      success: function(response)
      {
        jQuery('#right-modal .modal-body').html(response);
      }
    });
    }
    </script>

    <!-- (Ajax Modal)-->
    <div class="modal fade customized-modal" id="modal_ajax">
        <div class="modal-dialog" >
            <div class="modal-content" style="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>

                <div class="modal-body" style="height:500px; overflow:auto;">


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Right modal content -->
    <div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-right">
            <div class="modal-content">

                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




    <script type="text/javascript">
    function confirm_modal(delete_url)
    {
        console.log(delete_url);
        //jQuery('#modal-4').modal('show', {backdrop: 'static'});
        jQuery('#alert-modal').modal('show', {backdrop: 'static'});
        document.getElementById('delete_form').setAttribute('action' , delete_url);
    }
    </script>

    {{-- <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link">delete</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
                </div>
            </div>
        </div>
    </div> --}}

     <!-- Info Alert Modal -->
     <div id="alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="dripicons-information h1 text-info"></i>
                            <h4 class="mt-2">Heads up!</h4>
                            <p class="mt-3">Are you sure?</p>
                            <form method="POST" action="" id = "delete_form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-info my-2">Continue</button>
                            </form>
                            {{-- <a href = "" class="btn btn-danger my-2" id = "delete_link_2" data-dismiss="modal">Continue</a> --}}
                            <button type="button" class="btn btn-info my-2" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
