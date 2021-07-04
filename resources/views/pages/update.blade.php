@extends('main')
@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
    @include('_partials/errors')
        <form action="storeupdate/{{$post->id}}" method="post">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group">
                <label for="title">Straipasnio pavadinimas</label>
                <input type="text" name="title" class="form-control" id="exampleInputPassword1" placeholder="" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="content">Straipsnio turinys</label>
                <textarea name="content" class="form-control" id="content" rows="3">{{$post->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Pasirinkite failą</label>
                <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button type="submit" class="btn btn-primary">Saugoti</button>
        </form>        
    </div>
</div>
@endsection