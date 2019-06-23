@if (session('success'))
    <div class="alert alert-success">
        <p style="text-align:center"><strong>{{session('success')}}</strong></p>
    </div>   
@endif

@if (session('fail'))
    <div class="alert alert-danger">
        <p style="text-align:center"><strong>{{session('fail')}}</strong></p>
    </div>   
@endif
