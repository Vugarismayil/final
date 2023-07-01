@if (session()->has('success'))
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.options.timeOut = 3000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.info("{{session()->get('success')}}");
        });
    </script>
@endif

@if (session()->has('alert'))
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.options.timeOut = 3000;
            toastr.options.positionClass = 'toast-top-center';
            toastr.error("{{session()->get('alert')}}");
        });
    </script>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif