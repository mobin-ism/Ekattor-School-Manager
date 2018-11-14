
    <script src="{{asset('backend/js/app.min.js')}}"></script>
    <script src="{{asset('backend/js/vendor/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('backend/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('backend/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('backend/js/pages/demo.dashboard.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    {{-- @if(\Session::has('success_message'))
        <script type="text/javascript">
        	toastr.success('{{ \Session::get('success_message') }}');
        </script>
    @endif

    @if(\Session::has('error_message'))
        <script type="text/javascript">
        	toastr.error('{{ \Session::get('error_message') }}');
        </script>
    @endif --}}

    @foreach (session('flash_notification', collect())->toArray() as $message)
        @if($message['level'] == 'success')
            <script type="text/javascript">
                toastr.success('{{ $message['message'] }}');
            </script>
        @else
            <script type="text/javascript">
                toastr.error('{{ $message['message'] }}');
            </script>
        @endif
    @endforeach
