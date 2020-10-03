@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            @forelse($articles as $article)
                <div id="content">
                    <div class="title">
                        <h2>
                            <a href="{{ $article->path() }}">
                                {{ $article->title }}
                            </a>
                        </h2>
                    </div>
                    <p><img src="/images/banner.jpg" alt="banner" class="image image-full"/></p>
                    <p>{{ $article->excerpt }}</p>
                    @if(!$loop->last)
                        <hr style="opacity: 0.5; margin: 30px auto 50px; display: block;">
                    @endif
                </div>
            @empty
                <p>No relevant articles yet.</p>
            @endforelse
        </div>
        {{ $articles->links("pagination::bootstrap-4") }}
    </div>
@endsection