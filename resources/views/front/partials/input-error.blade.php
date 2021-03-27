@if($errors->has($e_name))
    <div class="alert alert-danger">
        {{$errors->first($e_name)}}
    </div>
@endif