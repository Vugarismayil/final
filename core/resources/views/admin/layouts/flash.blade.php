@if (session()->has('success'))
    <script type="text/javascript">
        $(document).ready(function(){
            $.notify({
                title: "Başarılı!",
                message: "{{ session()->get('success') }}"
            },{
                type: 'info'
            });
        });
    </script>
@endif

@if (session()->has('alert'))
    <script type="text/javascript">
        $(document).ready(function(){
            $.notify({
                title: "Üzgünüm!",
                message: "{{ session()->get('alert') }}"
            },{
                type: 'danger'
            });
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