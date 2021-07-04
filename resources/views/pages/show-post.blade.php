@extends('main')
@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="post-preview">
            <img class="img-thumbnail" src = "/{{$post->img}}" alt = "{{$post->title}}">
            <h2 class="post-title">{{$post->title}}</h2>
            <h3 class="post-subtitle">{{$post->content}}</h3>
                <li><a href="/delete/{{$post->id}}" onclick="return confirm('Ar tikrai norite ištrinti šį straipsnį?')">Šalinti</a></li>
                <li><a href="/update/{{$post->id}}">Redaguoti</a></li>
        </div>
        <!-- Divider-->
        <hr class="my-4" />

        <div class="card">
            <div class="card-block">
                <form action="/post/{{$post->id}}/comment" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="content">Komentaras</label>
                        <textarea name="content" class="form-control" id="body" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Komentuoti</button>
                </form>
            </div>
        </div>
        <div class="comment">
            <ul>
                @foreach($post->comments as $comment)
                    <li>{{$comment->comment}}</li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
@endsection