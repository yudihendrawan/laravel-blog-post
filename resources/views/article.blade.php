@extends('layouts/main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $article->title }}</h1>

                <p>By. <a href="/articles?author={{ $article->author->username }}"
                        class="text-decoration-none">{{ $article->author->name }}</a> in <a
                        href="/articles?category={{ $article->category->slug }}"
                        class="text-decoration-none">{{ $article->category->name }}</a></p>

                <img src="https://source.unsplash.com/1200x400?{{ $article->category->name }}"
                    alt="{{ $article->category->name }}" class="img-fluid">

                <article class="my-3 fs-5">
                    {!! $article->body !!}
                </article>

                <a href="/articles" class="d-block mt-3">Back to articles</a>
            </div>
        </div>
    </div>
@endsection
