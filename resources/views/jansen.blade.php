@extends('layouts.master')

@section('title' , 'Jansen')

@section('content')
    <h1>Jansen</h1>

    <form onchange="myfun()">
        <input type="radio" id="shape" name="shape" value="square" checked> square<br>
        <input type="radio" id="shape" name="shape" value="rectangle"> rectangle<br>
    </form>

    <div class="card">
        <div class="col-md-3">
            @for($i = 0; $i < 150; $i++)
                <span class="col-md-6" checked>
        <input type="radio" id = "{{$i}}">
    </span>
            @endfor
        </div>
    </div>
@endsection

@section('js-add')
    <script>
        function myfun()   {
            var x = document.getElementById('shape');
            var y = [1,2,3,13,23,33,32,31,21,11];
            y.forEach((radioId) => {
                document.getElementById(radioId).setAttribute("checked" , true)

            });
            
        }
    </script>
@endsection