@extends('layouts/main')

@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-5">
        <div class="col-md-4">
            <form action="/articles">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                @if (request('created_at'))
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>

                </div>
            </div>
            </form>
            <div class="col-md-4">
                <form action="/articles" class="d-flex ">
                    <input type="date" name="created_at" class="form-control" value="{{ request('created_at') }}">

                    <button type="submit" class="btn btn-primary">Filter</button>
                    @if (request('created_at'))
                        <a href="/articles" class="btn btn-secondary">Reset</a>
                    @endif
                </form>
            </div>
      
    </div>


    @if (request('created_at'))
        {{-- Menampilkan data artikel berdasarkan tanggal --}}
        @if ($article_by_date->isNotEmpty())
            <div class="container mb-3 mt-5">
                <div class="row">
                    @foreach ($article_by_date as $article)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                                    <a href="/articles?category={{ $article->category->slug }}"
                                        class="text-white text-decoration-none">{{ $article->category->name }}</a>
                                </div>
                                @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}"
                                        alt="{{ $article->category->name }}" class="img-fluid">
                                @else
                                    <img src="https://source.unsplash.com/500x400?{{ $article->category->name }}"
                                        class="card-img-top" alt="{{ $article->category->name }}">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $article->title }}</h5>
                                    <p>
                                        <small class="text-muted">
                                            By. <a href="/articles?author={{ $article->author->username }}"
                                                class="text-decoration-none">{{ $article->author->name }}</a>
                                            {{ $article->created_at->diffForHumans() }}
                                        </small>
                                    </p>
                                    <p class="card-text">{{ $article->excerpt }}</p>
                                    <a href="/articles/{{ $article->slug }}" class="btn btn-primary">Read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-center fs-4">No articles found for the selected date.</p>
        @endif
    @else
        {{-- Menampilkan data artikel secara normal --}}
        @if ($articles->isNotEmpty())
            <div class="card mb-5 mt-5" >
                @if ($articles[0]->image)
                    <div style="max-height:400px;overflow:hidden;margin: auto">
                        <img src="{{ asset('storage/' . $articles[0]->image) }}" alt="{{ $articles[0]->category->name }}"
                            class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $articles[0]->category->name }}" class="card-img-top"
                        alt="{{ $articles[0]->category->name }}">
                @endif

                <div class="card-body text-center">
                    <h3 class="card-title"><a href="/articles/{{ $articles[0]->slug }}"
                            class="text-decoration-none text-dark">{{ $articles[0]->title }}</a></h3>
                    <p>
                        <small class="text-muted">
                            By. <a href="/articles?author={{ $articles[0]->author->username }}"
                                class="text-decoration-none">{{ $articles[0]->author->name }}</a> in <a
                                href="/articles?category={{ $articles[0]->category->slug }}"
                                class="text-decoration-none">{{ $articles[0]->category->name }}</a>
                            {{ $articles[0]->created_at->diffForHumans() }}
                        </small>
                    </p>

                    <p class="card-text">{{ $articles[0]->excerpt }}</p>

                    <a href="/articles/{{ $articles[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>

                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($articles->skip(1) as $article)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                                    <a href="/articles?category={{ $article->category->slug }}"
                                        class="text-white text-decoration-none">{{ $article->category->name }}</a>
                                </div>
                                @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}"
                                        alt="{{ $article->category->name }}" class="img-fluid">
                                @else
                                    <img src="https://source.unsplash.com/500x400?{{ $article->category->name }}"
                                        class="card-img-top" alt="{{ $article->category->name }}">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $article->title }}</h5>
                                    <p>
                                        <small class="text-muted">
                                            By. <a href="/articles?author={{ $article->author->username }}"
                                                class="text-decoration-none">{{ $article->author->name }}</a>
                                            {{ $article->created_at->diffForHumans() }}
                                        </small>
                                    </p>
                                    <p class="card-text">{{ $article->excerpt }}</p>
                                    <a href="/articles/{{ $article->slug }}" class="btn btn-primary">Read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-center fs-4">No articles found.</p>
        @endif
    @endif
@endsection
