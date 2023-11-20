
@extends('layouts.main')

@section('container')
    <div class="container text-center">
        <h1>List of our Authors</h1>
        {{-- @dd($articles); --}}
        @if ($users->count() > 0)
            @foreach ($users as $user)

                <div class="card mb-3">
                    <div class="card-body text-center">
                        <a class="text-black-50 text-decoration-none" href="/author/{{ $user->id }}">
                        <h3 class="card-title">{{ $user->name }}</h3></a>
                        <p class="card-text"><b>{{ $user->email }}</b></p>
                        <p>Total Articles: {{ $user->articles_count }}</p>
                        {{-- <p class="card-text">{{ $users->other_attribute }}</p> --}}
                        <!-- Tambahkan atribut pengguna lainnya sesuai kebutuhan -->
                    </div>
                </div>
            @endforeach
        @else
            <p>Tidak ada pengguna yang ditemukan.</p>
        @endif

    </div>
@endsection
