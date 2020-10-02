@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>{{ $article->title }}</h2>
                    <span class="byline">{{ $article->excerpt }}</span>
                </div>
                <p><img src="/images/banner.jpg" alt="banner" class="image image-full"/></p>
                <p>{{ $article->body }}</p>
            </div>
        </div>
    </div>
@endsection