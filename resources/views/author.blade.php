{{-- resources/views/author.blade.php --}}

@extends('layouts.main')

@section('container')
    <div class="container text-center">
        <h1>Detail Author</h1>

        <div class="card mb-3">
            <div class="card-body text-center">
                <h3 class="card-title">{{ $user->name }}</h3>
                <p class="card-text"><b>{{ $user->email }}</b></p>
                @if ($articles->count() > 0)
                <h3>List Articles</h3>
                        @foreach ($articles as $article)
                            <p>{{ $article->title }}</p>
                       @endforeach
                @else
                    <p>{{ $user->name }} Don't have an article yet.</p>
                @endif
                <!-- Tambahkan atribut pengguna lainnya sesuai kebutuhan -->
            </div>
        </div>
    </div>
@endsection
