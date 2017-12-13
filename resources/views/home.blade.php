@extends('layouts.app')
@section('head')
<style> 
input[type=text] {
    width: 430px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
}

</style>
</head>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class='input-append'>
                    <input type="text" id='search' name="search" placeholder="Search SSID or ID ... EJ: CoWifi-XXXX">
                   <button type="button" class="btn btn-primary" onclick="ssid()">Search</button> 

                    </div>
<div id='output'>

</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
function ssid(){
    search = $('#search').val();
    data = { 'ssid':search, '_token':'{{ csrf_token() }}'}
        $.post('/search', data, function(response){
            $('#output').empty();
            response.forEach(function(d){
             $('#output').append("<h2> <strong>SSID: </strong> "+d.ssid+"</h2>");
            $('#output').append("<h2> <strong>Pass: </strong>"+ d.password+"</h2>");

            });
               });
}
</script>
@endsection
