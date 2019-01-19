@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-file-document-box title_icon"></i> Event Calendar</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-md-center" style="margin-bottom: 10px;">
                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <div id="calendar"></div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection


@section('scripts')
<script>
    // var showAllInvoices = function () {
    //     var url = '{{ route("invoice.list") }}';
    //     console.log($('#selectedValue').text());
    //     $.ajax({
    //         type : 'GET',
    //         url: url,
    //         data : {date : $('#selectedValue').text()},
    //         success : function(response) {
    //             $('#invoice_content').html(response);
    //             initDataTable("basic-datatable");
    //         }
    //     });
    // }

    $('#calendar').fullCalendar({
        eventClick: function(calEvent, jsEvent, view) {

            alert('Event: ' + calEvent.title);
            alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
            alert('View: ' + view.name);

            // change the border color just for fun
            $(this).css('border-color', 'red');

        }
    });

    $('#calendar').fullCalendar({
    disableDragging: true
});
</script>
@endsection
