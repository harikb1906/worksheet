@if($errors->any())
    <div class="alert alert-danger">
        <uL>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </uL>
    </div><br>
@endif