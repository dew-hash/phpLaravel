@extends('main')
@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        @foreach($posts as $post)        {{--šitas ateina iš kontrolerio funkcijos index kintamojo $posts --}}
        <div class="post-preview">
            <a href="post/{{$post->id}}">     {{--ar posts ar post prieš slešą? Kodėl? --}}
                <h2 class="post-title">{{$post->title}}</h2>
            </a>
            <img src = "{{$post->img}}" class="img-thumbnail" alt = "{{$post->title}}">
            <p class="post-subtitle">{{Str::limit($post->content, 50)}}</p>
            <a href="post/{{$post->id}}">Skaityti daugiau...></a>
            <p class="post-meta">
                Posted by
                <a href="#!">Rasa</a>
                on September 24, 2021
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
        @endforeach
        <!-- Pager-->
        <div class="d-flex justify-content-end mb-4">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection